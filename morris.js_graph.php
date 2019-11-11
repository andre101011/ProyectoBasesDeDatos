  <?php 
  //index.php
  $connect = mysqli_connect("localhost", "root", "root", "proyectobd");
  $query = "SELECT * FROM account";
  $result = mysqli_query($connect, $query);
  $chart_data = '';
  while($row = mysqli_fetch_array($result))
  {
  $chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
  }
  $chart_data = substr($chart_data, 0, -2);
  ?>


<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <div class="container"> 
   <div id="chart"></div>
  </div>
  <div class="row">
    <div class="container">
    
      <span class="badge badge-pill badge-secondary">Area chart</span>
      <div id="area-chart" ></div>
    </div>
    <div class="container">
    <span class="badge badge-pill badge-secondary">Line chart</span>
      <div id="line-chart"></div>
    </div>
    <div class="container">
    <span class="badge badge-pill badge-secondary">Bar chart</span>
      <div id="bar-chart" ></div>
    </div>
    <div class="container">
    <span class="badge badge-pill badge-secondary">Bar stacked</span>
      <div id="stacked" ></div>
    </div>
    <div class="container">
    <span class="badge badge-pill badge-secondary">Pie chart</span>
      <div id="pie-chart" ></div>
    </div>
    <a href="http://google.com">link</a>
  </div>
 </body>
</html>

<script>

var data = [<?php echo $chart_data; ?>],
    config = {
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'year',
        ykeys:['profit', 'purchase', 'sale'],
        labels:['Profit', 'Purchase', 'Sale'],
        behaveLikeLine: true,
        fillOpacity: 0.6,
        hideHover:'auto',
        stacked:false,
        pointFillColors:['#ffffff'],
        pointStrokeColors: ['black'],
        lineColors:['gray','red'],
        barColors: ['#5058AB', '#14A0C1','#01CB99']
  };
config.element = 'area-chart';
Morris.Area(config);
config.element = 'line-chart';
Morris.Line(config);
config.element = 'bar-chart';
Morris.Bar(config);
config.element = 'stacked';
config.stacked = true;
Morris.Bar(config);
Morris.Donut({
  element: 'pie-chart',
  data: [
    {label: "Friends", value: 30},
    {label: "Allies", value: 15},
    {label: "Enemies", value: 45},
    {label: "Neutral", value: 10}
  ],  
  colors: ['#3D449C','#268FB2','#74DE00'],
  resize: true

});




</script>