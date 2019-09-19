<?php
include '../dbcon.php';
$con = connect_db();
$id = $_GET['id'];
$query = "update agent_list_tb set account_activation = 'Requested' where id = '$id'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
if ($result) {
	echo "<script>alert('Request Send!');
	window.location='admin_upnext.php';
	</script>";
}

$update = "update agent_list_tb set notif_status = '0' where id = '$id'";
$sql = mysqli_query($con, $update)or die(mysqli_error($con));


$date = date("Y-m-d H:i:s");
$update2 = "update agent_list_tb set datecreated = '$date' where id = '$id'";
$sql2 = mysqli_query($con, $update2)or die(mysqli_error($con));

?>