<html>
  <head>
    <title></title>
<style>
#chart{
  width:700px;
}
</style>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  </head>
  <body>
  <h3>water_level data(litel) obtained   from  water tank and fish pond</h3>

<div id="chart"></div>


<?php
$connect =new mysqli("localhost", "root", "", "ihaze");
$query = "SELECT * FROM water_level order by id limit 5 ";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{

 $chart_data .= "{ Time:'".$row[5]."', litelp:".$row[1].",litelt:".$row[2]."}, ";
}
$chart_data = substr($chart_data, 0, -1);
?>
<script>
Morris.Line({
 element : 'chart',
 data:[<?php  echo $chart_data; ?>],
 xkey:'Time',
 ykeys:['litelp','litelt'],
 labels:['pond','tank'],
 hideHover:'auto',
 stacked:true
});

</script>
</body>
</html>
