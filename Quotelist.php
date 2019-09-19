<?php
include 'connection.php';
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM user_quotes WHERE a_id ='".$_GET['id']."' ";
$result = $conn->query($sql);
if ($result->num_rows >0) {
 while($row[] = $result->fetch_array()) {
 $tem = $row;
 $json = json_encode($tem);
 }
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>