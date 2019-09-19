<!DOCTYPE html>
<html>
<head>
	<title>Agent Full Details</title>
	<link rel="icon" type="image" href="../assets/upnext.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/Dtables.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
	<script src="../sweetalertjs/sweetalert.js"></script>
	<script src="jquery-1.9.1.min.js"></script>
	<script src="Dtables.js"></script>
	<script src="bootstrap-datepicker.js"></script>
</head>
<body style="background-color: #000;">
<?php include'upnext_navbar.php';?>
<br><br><br>
<?php
include '../dbcon.php';
$con = connect_db();
$subj = $_GET['lastname'];
$query = "Select * from agent_list_tb where lastname = '$subj'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
$n = 1;
while ($row = mysqli_fetch_array($result)) {
  $id = $row['id'];
  $lname = $row['lastname'];
  $fname = $row['firstname'];
  $mname = $row['middlename_suffix'];
  $house_unit = $row['house_unit_no'];
  $st_no = $row['street_no'];
  $floor = $row['floor_bldg_subdiv_no'];
  $brgy = $row['barangay'];
  $city_town = $row['city_town'];
  $province = $row['province'];
  $zc = $row['zipcode'];
  $telno = $row['tel_no'];
  $mob_no = $row['mob_no'];
  $email = $row['email'];
  $dob = $row['month'];
  $day = $row['day'];
  $yr = $row['year'];
  $age = $row['age'];

$comname = $row['complete_name'];
$tel2 = $row['cr_tel_no'];
$mob2 = $row['cr_mob_no'];

$client = $row['question'];

$aub =     $row['aub_atm_no'];
$aub_acct =$row['aub_act_no'];
$prog =    $row['program'];
$prog_tnvs = $row['program_tnvs'];
$source =  $row['source_code'];
$branch =  $row['branch_assign'];
$endorse = $row['endorse_by'];
$remarks = $row['remarks'];

$approver = $row['name_of_approval'];
$date_app = $row['date_approve'];

$type = $row['agent_type'];
//$username = $row['username'];
//$password= $row['password'];
}
?>
  <div class="container" style="padding-top: 22px; margin-top: 10px; background-color: #fff">
  	<!-- <table class="table  table-bordered" style="width:100%; background-color: white; border: none;"> -->
  		<table class="table table-borderless table-condensed" >
  	<tr>
      <?php
        if ($type == "upnext") {
          echo '<td><img src="../assets/upnext.png" width="300"></td>';
        }else{
          echo '<td><img src="concorp.png" width="300"></td>';
        }
      ?>
  		<td style="padding-left: 200px;"><p>Unit 308 Sunrise Condominium, 226 Ortigas Ave.,<br>Greenhills, San Juan City, Philippines 1502<br>(02) 9782698 | (0917) 720 2698 | marketing@connextph.com</p><br></td>
  	</tr>
  </table>
  	<hr><br>
  	<center><h1>AGENT CONTRACT (<?php echo $type;?>)</h1></center>
    <form method="POST">
  	<table class="table table-bordered">
  		<tr>
  			<td><input type="text" class="form-control" name="lname" value="<?php echo $lname;?>"></td>
  			<td><input type="text" class="form-control" name="fname" value="<?php echo $fname;?>"></td>
  			<td colspan="8"><input type="text" class="form-control" name="mname" value="<?php echo $mname;?>"></td>
  		</tr>
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>PERMANENT ADDRESS</center></b></td>
  		</tr>
  		<tr>
  			<td ><input type="text" class="form-control" name="h_unit" value="<?php echo $house_unit?>"></td>
  			<td colspan="2"><input type="text" class="form-control" name="s_to" value="<?php echo $st_no?>"></td>
  			<td colspan="8"><input type="text" class="form-control" name="floor" value="<?php echo $floor?>"></td>
  		</tr>
  		<tr>
  			<td><input type="text" class="form-control" name="brgy" value="<?php echo $brgy?>"></td>
  			<td><input type="text" class="form-control" name="city" value="<?php echo $city_town?>"></td>
  			<td><input type="text" class="form-control" name="province" value="<?php echo $province?>"></td>
  			<td colspan="8"><input type="text" class="form-control" name="zc" value="<?php echo $zc?>"></td>
  		</tr>
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>PERSONAL AND CONTACT DETAILS</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>TELEPHONE NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="telno" value="<?php echo $telno?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>MOBILE NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="mob" value="<?php echo $mob_no?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>EMAIL ADDRESS</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="email" value="<?php $email?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>DATE OF BIRTH</b></td>
  			<td ><input type="text" class="form-control" name="dob" value="<?php echo $dob?>"></td>
  			<td ><input type="text" class="form-control" name="day" value="<?php echo $day?>"></td>
  			<td ><input type="text" class="form-control" name="yr" value="<?php echo $yr?>"></td>
  			<td colspan="2" style="background-color: gray"><b>AGE</b></td>
  			<td colspan="2"><input type="text" class="form-control" name="age" value="<?php echo $age?>"></td>
  		</tr>

  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>CHARACTER REFERENCE</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>COMPLETE NAME</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="comname" value="<?php echo $comname?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>TELEPHONE NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="tel" value="<?php echo $tel2?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>MOBILE NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="mobno" value="<?php echo $mob2?>"></td>
  		</tr>
  	</table>
  	<table class="table table-bordered">
  		<tr>
  			<td style="background-color: gray"><i>What is your primary source of clients ?</i></td>
  			<td colspan="9"><input type="text" class="form-control" name="source" value="<?php echo $client?>"></td>
  		</tr>
  	</table>
  	<table class="table table-bordered table-condensed" >
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>FOR CONNEXT USE ONLY</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>AUB ATM NO.</b></td>
  			<td colspan="9"><input type="text" name="aub" class="form-control" value="<?php echo $aub?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>AUB ACCOUNT NO.</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="aub_acct" value="<?php echo $aub_acct?>"></td>
  		</tr>
  		<tr>
        <?php if($type == "upnext"){
          echo '<td style="background-color: gray"><b>SOURCE CODE</b></td>
          <td colspan="9"><input type="text" class="form-control" name="source_code" value="'.$source.'"></td>';
      }elseif ($type == "connext") {
        echo '<td style="background-color: gray"><b>PROGRAM</b></td>
        <td ><input type="text" class="form-control" name="prog"  value="'.$prog.'"></td>
        <td colspan="2" style="background-color: gray"><b>SOURCE CODE</b></td>
        <td colspan="2"><input type="text" class="form-control" name="source_code" value="'.$source.'"></td>';
      }
      ?>
  		</tr>
      <?php if($type == "upnext"){
          echo '';
      }elseif ($type == "connext") {
        echo '<tr>
        <td style="background-color: gray"><b>PROGRAM_TNVS</b></td>
        <td colspan="9"><input type="number" min="0" step="0.1" class="form-control" name="prog_tnvs" value="'.$prog_tnvs.'"></td>
      </tr>';
      }
      ?>
  		<tr>
  			<td style="background-color: gray"><b>BRANCH ASSIGNED</b></td>
  			<td ><input type="text" class="form-control" name="branch" <?php echo $branch?>></td>
  			<td colspan="2" style="background-color: gray"><b>ENDORESED BY</b></td>
  			<td colspan="2"><input type="text" class="form-control" name="endorse" value="<?php echo $endorse?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>Remarks</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="remarks"  value="<?php echo $remarks?>"></td>
  		</tr>
  	</table>
  	<table class="table table-bordered table-condensed" >
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>APPROVAL</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>NAME OF APPROVER</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="approver" value="<?php echo $approver?>"></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>SIGNATURE OF APPROVER</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="sign" readonly=""></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>DATE APPROVED</b></td>
  			<td colspan="9"><input type="text" class="form-control" name="date-app" readonly="" value="<?php echo $date_app?>"></td>
  		</tr>
  	</table>
  	<button type="submit" class="btn btn-block btn-success" name="update">UPDATE INFO </button>
  	<br>
  	<a href="admin_upnext.php" class="btn btn-block btn-danger">BACK</a>
  	</form>
    <?php
    $link = connect_db();
    if (isset($_POST['update'])) {
      $lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];

$h_unit = $_POST['h_unit'];
$streetname = $_POST['s_to'];
$floor = $_POST['floor'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];
$province = $_POST['province'];
$zip = $_POST['zc'];

$tel1 = $_POST['tel'];
$mob1 = $_POST['mob'];
$email = $_POST['email'];

$dob = $_POST['dob'];
$day = $_POST['day'];
$yr = $_POST['yr'];

$age = $_POST['age'];

$comname = $_POST['comname'];
$tel2 = $_POST['tel'];
$mob2 = $_POST['mobno'];

$client = $_POST['source'];

$aub =     $_POST['aub'];
$aub_acct =$_POST['aub_acct'];
$prog =    $_POST['prog'];
$source =  $_POST['source_code'];
$branch =  $_POST['branch'];
$endorse = $_POST['endorse'];
$remarks = $_POST['remarks'];

$approver = $_POST['approver'];
$update = "UPDATE `agent_list_tb` SET `lastname`='$lname',`firstname`='$fname',`middlename_suffix`='$mname',`house_unit_no`='$h_unit',`street_no`='$streetname',`floor_bldg_subdiv_no`='$floor',`barangay`='$brgy',`city_town`='$city',`province`='$province',`zipcode`='$zip',`tel_no`='$tel1',`mob_no`='$mob1',`email`='$email',`month`='$dob',`day`='$day',`year`='$yr',`age`='$age',`complete_name`='$comname',`cr_tel_no`='$telno',`cr_mob_no`='$mob2',`question`='$source',`aub_atm_no`='$aub',`aub_act_no`='$aub_acct',`program`='$prog',`branch_assign`='$branch',`source_code`='$source',`endorse_by`='$endorse',`remarks`='$remarks',`name_of_approval`='$approver' WHERE lastname = '$subj'";

$sql = mysqli_query($link, $update)or die(mysqli_error($link));
if ($sql) {
  echo '<script>alert("Successfully Updated !");
   window.location.href="admin_upnext.php";</script>';
}else{
echo '<script>alert("Error While Saving !");
   window.location.href="agency_form.php";</script>';
}
}
    ?>
  	<br><br>
  	<br><br><br>
  </div>
  <br>
  </body>
  </html>
  
  
