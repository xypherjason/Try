<?php
 include 'dbconfig.php';
 $con = mysqli_connect($servername,$username,$password,$dbname);
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $Sql_Query = "select * from agent_list_tb where username = '$email' and password = '$password'and status = 'Active' ";
 
 $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
 
 if(isset($check)){
 
 echo "Data Matched";
 }
 else{
 echo "Invalid Username / Password";
 }
mysqli_close($con)