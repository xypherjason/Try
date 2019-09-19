<?php
include '../dbcon.php';
$con = connect_db();
$id = $_GET['id'];
$query = "update agent_list_tb set acct_approval = 'Approved' where id = '$id'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
if ($result) {
	echo "<script>alert('Approved Done !');
	window.location='index.php';
	</script>";
}
?>