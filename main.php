<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('connect.php');

    @session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Exchanges</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        
        header 
        {
            display: flex;
            position: fixed;
            width:100%;
            align-items:center;
        height:60px;
        justify-content:center;
        /* //top:0; */
        }
    footer{
        display:flex;
        position:fixed;
        bottom:0;
        width:100%;
        align-items:center;
        /* //height:30px; */
        justify-content:center;
    }</style>
    
</head>

<body>
<header class="bg-dark text-light">
    <div>Flipr-One stop solution for Stock Analysis.</div>
</header>
<br><br><br>

  <form action="" class="bg-info align-items-center justify-content-center d-flex height-50" method="post">
  <div class="tab">
  <input class="bg-dark text-light" type="submit" value="Tata" name="tata" id="tata">
  <input class="bg-dark text-light" type="submit" value="Cipla" name="cipla" id="cipla">
  <input class="bg-dark text-light" type="submit" value="BSE" name="bse" id="bse">
  <input class="bg-dark text-light" type="submit" value="ASHOK" name="ashok" id="ashok">
  <input class="bg-dark text-light" type="submit" value="NSE" name="nse" id="nse">

</div>
  </form>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>
  <?php 
if(isset($_POST['tata']))
{
  echo "tata pressed";
  $myquery="select * from tata";
  $query = mysqli_query($con,$myquery);
  
  if($query)
  {
    $n= mysqli_num_rows($query);
    $data_array = Array(); // create PHP array
    $i=-1;
    $row=mysqli_fetch_array($query);
    //echo $row;
    while($i<$n/2)
    {
      if($i==-1)
      {
        $i+=1;
        continue;
      }
      $data_array[$i]=$row;
      $i+=1;
    }
    echo "array created";
    
  }
}
if(isset($_POST['cipla']))
{
echo "cipla pressed";
  $myquery="select * from cipla";
  $query = mysqli_query($con,$myquery);
  
  if($query)
  {
    $n= mysqli_num_rows($query);
    $data_array = Array(); // create PHP array
    $i=-1;
    $row=mysqli_fetch_array($query);
    //echo $row;
    while($i<$n/2)
    {
      if($i==-1)
      {
        $i+=1;
        continue;
      }
      $data_array[$i]=$row;
      $i+=1;
    }
    echo "array created";
}
}
if(isset($_POST['bse']))
{
  echo "bse pressed";
  $myquery="select * from bse";
  $query = mysqli_query($con,$myquery);
  
  if($query)
  {
    $n= mysqli_num_rows($query);
    $data_array = Array(); // create PHP array
    $i=-1;
    $row=mysqli_fetch_array($query);
    //echo $row;
    while($i<$n/2)
    {
      if($i==-1)
      {
        $i+=1;
        continue;
      }
      $data_array[$i]=$row;
      $i+=1;
    }
    echo "array created";
  } 
}
if(isset($_POST['nse']))
{
  echo "bse pressed";
  $myquery="select * from nse";
  $query = mysqli_query($con,$myquery);
  
  if($query)
  {
    $n= mysqli_num_rows($query);
    $data_array = Array(); // create PHP array
    $i=-1;
    $row=mysqli_fetch_array($query);
    //echo $row;
    while($i<$n/2)
    {
      if($i==-1)
      {
        $i+=1;
        continue;
      }
      $data_array[$i]=$row;
      $i+=1;
    }
    echo "array created";}
}

if(isset($_POST['ashok']))
{
  echo "bse pressed";
  $myquery="select * from ashok";
  $query = mysqli_query($con,$myquery);
  
  if($query)
  {
    $n= mysqli_num_rows($query);
    $data_array = Array(); // create PHP array
    $i=-1;
    $row=mysqli_fetch_array($query);
    //echo $row;
    while($i<$n/2)
    {
      if($i==-1)
      {
        $i+=1;
        continue;
      }
      $data_array[$i]=$row;
      $i+=1;
    }
    echo "array created";}
}

?>
<div id="chart_div"></div>
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-column-database.php>Column Chart from MySQL database</a> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        // Create the data table.
        <?php echo json_encode($data_array);
        
        ?>
        var my_2d=<?php echo json_encode($data_array);
        
        ?>
        
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'id');
  data.addColumn('number', 'open');
data.addColumn('number', 'high');
data.addColumn('number', 'low');
data.addColumn('number', 'close');
data.addColumn('number', 'adj_close');
data.addColumn('number', 'volume');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([parseInt(my_2d[i][0]) ,parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),parseInt(my_2d[i][3]),parseInt(my_2d[i][4]),parseInt(my_2d[i][5]), parseInt(my_2d[i][6])]);
       var options = {
          title: 'plus2net.com Sale Profit',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
		  height:400,
		  width:900,
		  
        };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);		
       }

</script>

   
<footer class="bg-dark text-light"><div>&copy; All Rights Reserved.</div></footer>
</body>
</html>
<?php


?>