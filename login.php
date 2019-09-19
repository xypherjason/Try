<?php
if (isset($_POST['log'])) {
include "dbcon.php";
$link= connect_db();
 
$username = $_POST['username'];
$password =$_POST['password']; 
 
$sql = "select * from users where '$username'=username and '$password'=password";
$res = mysqli_query($link,$sql);

$check = mysqli_fetch_array($res);
 
if(isset($check)){
$type='Upnext Admin';
$sql2 = "insert into login_history(username,user_type ) values('$username','$type')" ;
mysqli_query($link,$sql2);
$_SESSION['username']=$username;

 echo '<script> swal("Successfully Login!","", "success").then(okay => {
                            if (okay) {
                            window.location.href = "upnext_admin/admin_upnext.php";
                            }
                        });</script>';
}else{
    $password = $_POST['password'];
	$sql3 = "select * from xypher_user where '$username'=username and '$password'=password";
 
$res3 = mysqli_query($link,$sql3);
 
$check3 = mysqli_fetch_array($res3);
 
if(isset($check3)){
$type3='XYPHER DEV';
$sql3 = "insert into login_history(username,user_type ) values('$username','$type3')" ;
mysqli_query($link,$sql3);
$_SESSION['username']=$username;

 echo '<script> swal("Successfully Login!","", "success").then(okay => {
                            if (okay) {
                            window.location.href = "xypher_admin/";
                            }
                        });</script>';
}else{
    $password = $_POST['password'];
    $sql4 = "select * from acounting where '$username'=username and '$password'=password";
$res4 = mysqli_query($link,$sql4);
$check4 = mysqli_fetch_array($res4);
if(isset($check4)){
$type4='XYPHER DEV';
$sql4 = "insert into login_history(username,user_type ) values('$username','$type4')" ;
mysqli_query($link,$sql4);
$_SESSION['username']=$username;

 echo '<script> swal("Successfully Login!","", "success").then(okay => {
                            if (okay) {
                            window.location.href = "Accounting/";
                            }
                        });</script>';
}
else{
 echo '<script> swal("Access Denied", "Username or Password is Invalid", "error").then(okay => {
                            if (okay) {
                            window.location.href = "index.php";
                            }
                        });</script>';
}
mysqli_close($link);
}
}
}
?>