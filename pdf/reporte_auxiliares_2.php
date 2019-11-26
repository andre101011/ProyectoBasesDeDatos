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


$pdf->AddPage();

//			chart properties
//position
$chartX=10;
$chartY=40;

//dimension
$chartWidth=150;
$chartHeight=100;

//padding
$chartTopPadding=10;
$chartLeftPadding=20;
$chartBottomPadding=20;
$chartRightPadding=5;

//chart box
$chartBoxX=$chartX+$chartLeftPadding;
$chartBoxY=$chartY+$chartTopPadding;
$chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
$chartBoxHeight=$chartHeight-$chartBottomPadding-$chartTopPadding;

//bar width
$barWidth=20;


$query = "SELECT aux.iniciales,
count(implemento.codigo) AS numImplementos
FROM implemento 
INNER JOIN prestamo_implemento pi
	ON implemento.codigo=pi.implemento_codigo
INNER JOIN prestamo pr
	ON pi.prestamo_id=pr.id
INNER JOIN auxiliar aux
	ON pr.auxiliar_id=aux.id
GROUP BY aux.iniciales

";
$consulta = $conn->query($query);
	$data = array();
	while ($row = $consulta->fetch_assoc()) {
	  $data[] = $row;
}

//$dataMax
$dataMax=0;
foreach($data as $item){
	if($item['numImplementos']>$dataMax)$dataMax=$item['numImplementos'];
}

//data step
$dataStep=50;

//set font, line width and color
$pdf->SetFont('Arial','',9);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0);

//chart boundary
$pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);

//vertical axis line
$pdf->Line(
	$chartBoxX ,
	$chartBoxY , 
	$chartBoxX , 
	($chartBoxY+$chartBoxHeight)
	);
//horizontal axis line
$pdf->Line(
	$chartBoxX-2 , 
	($chartBoxY+$chartBoxHeight) , 
	$chartBoxX+($chartBoxWidth) , 
	($chartBoxY+$chartBoxHeight)
	);

///vertical axis
//calculate chart's y axis scale unit
$yAxisUnits=$chartBoxHeight/$dataMax;

//draw the vertical (y) axis labels
for($i=0 ; $i<=$dataMax ; $i+=$dataStep){
	//y position
	$yAxisPos=$chartBoxY+($yAxisUnits*$i);
	//draw y axis line
	$pdf->Line(
		$chartBoxX-2 ,
		$yAxisPos ,
		$chartBoxX ,
		$yAxisPos
	);
	//set cell position for y axis labels
	$pdf->SetXY($chartBoxX-$chartLeftPadding , $yAxisPos-2);
	//$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i , 1);---------------
	$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i, 0 , 0 , 'R');
}

///horizontal axis
//set cells position
$pdf->SetXY($chartBoxX , $chartBoxY+$chartBoxHeight);

//cell's width
$xLabelWidth= $chartBoxWidth / count($data);

//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
//loop horizontal axis and draw the bar
$barXPos=0;
foreach($data as $itemName=>$item){
	//print the label
	//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');--------------
	$pdf->Cell($xLabelWidth , 5 , utf8_decode($item['iniciales']) , 0 , 0 , 'C');
	
	///drawing the bar
	//bar color
	list($r,$g,$b) = getColor();
	$pdf->SetFillColor($r,$g,$b);

	//bar height
	$barHeight=$yAxisUnits*$item['numImplementos'];
	//bar x position
	$barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
	$barX=$barX-($barWidth/2);
	$barX=$barX+$chartBoxX;
	//bar y position
	$barY=$chartBoxHeight-$barHeight;
	$barY=$barY+$chartBoxY;
	//draw the bar
	$pdf->Rect($barX,$barY,$barWidth,$barHeight,'DF');
	//increase x position (next series)
	$barXPos++;
}

//axis labels
$pdf->SetFont('Arial','B',12);
$pdf->SetXY($chartX,$chartY);
$pdf->Cell(100,10,"#Implementos",0);
$pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY+$chartHeight-($chartBottomPadding/2));
$pdf->Cell(100,5,"Auxiliares",0,0,'C');

function getColor() {
	$hash = md5('color' . rand(0,255));
	return array(hexdec(substr($hash, 0, 2)), hexdec(substr($hash, 2, 2)), hexdec(substr($hash, 4, 2)));
}
//output the pdf
$pdf->Output();