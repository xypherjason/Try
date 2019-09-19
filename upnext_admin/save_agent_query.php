
<script src="../sweetalert.js"></script>
<?php
?>
<?php
session_start();
if(isset($_POST['get_username']))
{
	
 $user_name=str_replace(' ', '', $_POST['get_username']);
 random_username($user_name);
 exit();
}

function random_username($user_name)
{
 $new_name = $user_name.mt_rand(0,10000);
 check_user_name($new_name,$user_name);
}

function check_user_name($new_name,$user_name)
{
	$connection = mysqli_connect('localhost','root','','db_connext');
 $select = mysqli_query($connection,"SELECT* from users where username='".$new_name."'");

 if(mysqli_num_rows($select))
 {
  random_username($user_name);
 }
 else
 {
 	$_SESSION['new_name'] = $new_name;
  echo $new_name;
 }
}
if (isset($_POST['insert'])) {

include '../dbcon.php';
$conn = connect_db();
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];

$h_unit = $_POST['h_unit'];
$streetname = $_POST['streetname'];
$floor = $_POST['floor'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];
$province = $_POST['province'];
$zip = $_POST['zip'];

$tel1 = $_POST['Tel1'];
$mob1 = $_POST['mob1'];
$email = $_POST['email'];

$dob = $_POST['DOBMonth'];
$day = $_POST['day'];
$yr = $_POST['taon'];

$age = $_POST['age'];

$comname = $_POST['complete_name'];
$tel2 = $_POST['tel2'];
$mob2 = $_POST['mob2'];

$client = $_POST['client'];

$aub =     $_POST['aub'];
$aub_acct =$_POST['aub_acct'];
$source =  $_POST['source'];
$branch =  $_POST['branch'];
$endorse = $_POST['endorse'];
$remarks = $_POST['remarks'];

$approver = $_POST['approver'];
$date_app = $_POST['date_app'];
$username = $_POST['username'];
$password= $_POST['password'];
$check = mysqli_query($conn,"SELECT firstname,lastname from agent_list_tb where firstname ='$fname' and lastname = '$lname' ");
$checkdata = mysqli_num_rows($check);

if ($checkdata>0) {
	 echo '<script>alert("Data Already Exist !");
	 window.location.href = "add_agent.php";</script>';
}else{
	$sql = "INSERT INTO `agent_list_tb`(`lastname`, `firstname`, `middlename_suffix`, `house_unit_no`, `street_no`, `floor_bldg_subdiv_no`, `barangay`, `city_town`, `province`, `zipcode`, `tel_no`, `mob_no`, `email`, `month`, `day`, `year`, `age`, `complete_name`, `cr_tel_no`, `cr_mob_no`, `question`, `aub_atm_no`, `aub_act_no`,`branch_assign`, `source_code`, `endorse_by`, `remarks`, `name_of_approval`, `date_approve`, `username`, `password`, `status`,`acct_approval`,`account_activation`,`agent_type`)VALUES('$lname','$fname','$mname','$h_unit','$streetname','$floor','$brgy','$city','$province','$zip','$tel1','$mob1','$email','$dob','$day','$yr','$age','$comname','$tel2','$mob2','$client','$aub','$aub_acct','$branch','$source','$endorse','$remarks','$approver','$date_app','$_SESSION[new_name]','$password','Inactive','Pending','Not yet Activated','upnext')";
$query = mysqli_query($conn,$sql)or die(mysqli_error($conn));
echo $query;
if ($query) {
	 echo '<script>alert("Successfully Save !");
	 window.location.href="admin_upnext.php";</script>';
}
else
{
	 echo '<script>alert("Error While Saving !");
	 window.location.href="";</script>';
}
}

}

?>
