<?php
//include pdf_mc_table.php, not fpdf17/fpdf.php
include('pdf_mc_table.php');
require '../db.php';
//make new object
$pdf = new PDF_MC_Table();

$pdf->Image('../images/logouq.png', 5, 5, 20 );


//add page, set font
$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )
$pdf->Image('watermark.png',10,10,189);

$pdf->SetFont('Arial','',12);

//set width for each column (6 columns)
$pdf->SetWidths(Array(80,40,80,30,20,40));

//set alignment
//$pdf->SetAligns(Array('','R','C','','',''));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(5);


$query = "SELECT aux.nombre,
count(implemento.codigo) AS numImplementos
FROM implemento 
INNER JOIN prestamo_implemento pi
	ON implemento.codigo=pi.implemento_codigo
INNER JOIN prestamo pr
	ON pi.prestamo_id=pr.id
INNER JOIN auxiliar aux
	ON pr.auxiliar_id=aux.id
GROUP BY aux.nombre

";
$data = $conn->query($query);

//add table heading using standard cells
//set font to bold
$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,5,"Auxiliar",1,0);
$pdf->Cell(40,5,"# Implementos",1,0);

$pdf->Ln();

//reset font
$pdf->SetFont('Arial','',12);
//loop the data
foreach($data as $item){
	//write data using Row() method containing array of values.
	$pdf->Row(Array(
		utf8_decode($item['nombre']),
		utf8_decode($item['numImplementos']),
	));
}

//output the pdf
$pdf->Output();






