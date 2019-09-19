<?php
include '../dbcon.php';
$con = connect_db();

$id = $_GET['id'];
$query = "update agent_list_tb set status = 'Active' where id = '$id'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));

if ($result) {
	echo "<script>alert('Account is Successfuly ACTIVATED!');
	window.location='index.php';
	</script>";
}
?>