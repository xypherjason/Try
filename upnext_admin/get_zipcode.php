<?php
$host = "localhost"; 
$user = "root";
$password = ""; 
$dbname = "db_connext";

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if(isset($_POST["action"]))
{
	
 $output = '';
 if($_POST["action"] == "major_area")
 {
  $query = "SELECT city FROM zipcodes WHERE major_area = '".$_POST["query"]."' GROUP BY city";
  $result = mysqli_query($con, $query);
  $output .= '<option value="">Select State</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
  }
 }
 if($_POST["action"] == "city")
 {
  $query = "SELECT zip_code FROM zipcodes WHERE city = '".$_POST["query"]."' && major_area = '".$_POST['major_area']."'";
  $result = mysqli_query($con, $query);
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["zip_code"].'">'.$row["zip_code"].'</option>';
  }
 }
 echo $output;

 json_encode($output);
}
?>