<?php
include('../dbcon.php');
$con = connect_db();

if(isset($_POST['view'])){

// $con = mysqli_connect("localhost", "root", "", "notif");

if($_POST["view"] != '')
{
    $update_query = "UPDATE agent_list_tb SET notif_status = 1 WHERE notif_status=0";
    mysqli_query($con, $update_query);
}
$query = "SELECT * FROM agent_list_tb ORDER BY datecreated DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  if ($row['status']=="Inactive") {
    $output .= '
   <li>
   <a href="#">
   <strong>'.$row["lastname"].' '.$row["firstname"].' '.$row["middlename_suffix"].'</strong><br />
   <small><em style="color: red;">'.$row["status"].'</em></small>
   </a>
   </li>
   ';
  }else{
   $output .= '
   <li>
   <a href="#">
   <strong>'.$row["lastname"].' '.$row["firstname"].' '.$row["middlename_suffix"].'</strong><br />
   <small><em style="color: blue;">'.$row["status"].'</em></small>
   </a>
   </li>
   ';
 }
  }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}



$status_query = "SELECT * FROM agent_list_tb WHERE notif_status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}

?>