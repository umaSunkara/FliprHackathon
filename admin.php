<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Add Companies</h1>
    <div id="wrapper">
 <form method="post"  enctype="multipart/form-data">
 <!-- <label for="cid">Company ID</label>
    <input type="text" name="cid" id="cid"> -->
    <label for="c_name">Company Name</label>
    <input type="text" name="c_name" id="c_name">
    <label for="file">Company Data</label>
  <input type="file" name="file" id="file"/>
  <input type="submit" name="submit_file" id="submit_file" value="Submit"/>
 </form>
</div>
</body>
</html>
<?php
//Date	Open	High	Low	Close	Adj Close	Volume

include('connect.php');

@session_start();
if(isset($_POST["submit_file"]))
{

}
if(isset($_POST["submit_file"]))
{
    //$cid=$_POST['cid'];
    $name=$_POST['c_name'];
 $file = $_FILES["file"]["tmp_name"];
 $rfile = $_FILES["file"]["name"];
 $row = 0; 
$skip_row_number = array("1");
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
    $row++;	
	// count total filed of csv row 
    $num = count($csv);  
    // check row for skip row 	
	if (in_array($row, $skip_row_number))	
    {
		continue; 
		// skip row of csv
	}
    else{
        $date="12-Feb-2023";
   $open= $csv[1];
  $high = $csv[2];
  $low = $csv[3];
  $close=$csv[4];
  $adj_close = $csv[5];
  $vol=$csv[6];
 
  if($name=='ashok')
  {
    $insert="insert into ashok(date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
  $res=mysqli_query($con,$insert);
  }
  else if($name=='bse')
  {
    $insert="insert into bse (date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
  $res=mysqli_query($con,$insert);
  }
  else if($name=='nse')
  {
    $insert="insert into nse (date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
  $res=mysqli_query($con,$insert);
  }
  else if($name=='cipla')
  {
    $insert="insert into cipla (date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
  $res=mysqli_query($con,$insert);
  }
  else if($name=='reliance')
  {
    $insert="insert into reliance (date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
    $res=mysqli_query($con,$insert);
  }
  else if($name=='eichermot')
  {
    $insert="insert into eichermot (date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
    $res=mysqli_query($con,$insert);
  }
  else 
  {
    $insert="insert into tata (date,open,high,low,close,adj_close,volume) values ('$date',$open,$high,$low,$close,$adj_close,$vol)";
    $res=mysqli_query($con,$insert);
  }
  
  
    }
    
 }
 if($res)
  {
    echo "<script>alert('Added Successfully.')</script>";
  }
    
}
?>