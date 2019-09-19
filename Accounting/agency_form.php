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
<?php include'accounting_navbar.php';?>
<br><br><br>
<?php
include '../dbcon.php';
$con = connect_db();
$subj = $_GET['id'];
$query = "Select * from agent_list_tb where id = '$subj'";
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
  $cr_tel_no = $row['cr_tel_no'];
  $cr_mob_no = $row['cr_mob_no'];
  $question = $row['question'];
  $aub_atm_no = $row['aub_atm_no'];
  $aub_act_no = $row['aub_act_no'];
  $program = $row['program'];
  $program_tnvs = $row['program_tnvs'];
  $branch_assign = $row['branch_assign'];
  $source_code = $row['source_code'];
  $endorse_by = $row['endorse_by'];
  $remarks = $row['remarks'];
  $name_of_approval = $row['name_of_approval'];
  $date_approve = $row['date_approve'];
  //additional info
  $username = $row['username'];
  $password = $row['password'];
  $status = $row['status'];

  $type = $row['agent_type'];
}
?>
  <div class="container" style="padding-top: 22px; margin-top: 10px; background-color: #fff">
  	<!-- <table class="table  table-bordered" style="width:100%; background-color: white; border: none;"> -->
  		<table class="table table-borderless table-condensed" >
  </table>
  	<center><h1>AGENT CONTRACT(<?php echo $type;?> Agent)</h1></center>
  	<table class="table table-bordered">
  		<tr>
  			<td><?php echo $lname;?></td>
  			<td><?php echo $fname;?></td>
  			<td colspan="8"><?php echo $mname;?></td>
  		</tr>
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>PERMANENT ADDRESS</center></b></td>
  		</tr>
  		<tr>
  			<td ><?php echo $house_unit?></td>
  			<td colspan="2"><?php echo $st_no?></td>
  			<td colspan="8"><?php echo $floor?></td>
  		</tr>
  		<tr>
  			<td><?php echo $brgy?></td>
  			<td><?php echo $city_town?></td>
  			<td><?php echo $province?></td>
  			<td colspan="8"><?php echo $zc?></td>
  		</tr>
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>PERSONAL AND CONTACT DETAILS</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>TELEPHONE NO.</b></td>
  			<td colspan="9"><?php echo $telno?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>MOBILE NO.</b></td>
  			<td colspan="9"><?php echo $mob_no?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>EMAIL ADDRESS</b></td>
  			<td colspan="9"><?php $email?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>DATE OF BIRTH</b></td>
  			<td ><?php echo $dob?></td>
  			<td ><?php echo $day?></td>
  			<td ><?php echo $yr?></td>
  			<td colspan="2" style="background-color: gray"><b>AGE</b></td>
  			<td colspan="2"><?php echo $age?></td>
  		</tr>

  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>CHARACTER REFERENCE</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>COMPLETE NAME</b></td>
  			<td colspan="9"><?php echo $comname;?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>TELEPHONE NO.</b></td>
  			<td colspan="9"><?php echo $cr_tel_no;?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>MOBILE NO.</b></td>
  			<td colspan="9"><?php echo $cr_mob_no?></td>
  		</tr>
  	</table>
  	<table class="table table-bordered">
  		<tr>
  			<td style="background-color: gray"><i>What is your primary source of clients ?</i></td>
  			<td colspan="9"><?php echo $question?></td>
  		</tr>
  	</table>

  	<table class="table table-bordered table-condensed" >
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>FOR CONNEXT USE ONLY</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>AUB ATM NO.</b></td>
  			<td colspan="9"><?php echo $aub_atm_no;?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>AUB ACCOUNT NO.</b></td>
  			<td colspan="9"><?php echo $aub_act_no;?></td>
  		</tr>
     
  		<tr>
  			 <?php
        if ($type == "connext") {
          echo'<td style="background-color: gray"><b>PROGRAM</b></td>
        <td >'.$program.'</td>';
        }else{
          echo'';
        }
      ?>
  			<td style="background-color: gray"><b>SOURCE CODE</b></td>
  			<td colspan="9"><?php echo $source_code;?></td>
  		</tr>
      <tr>
        <?php
        if ($type == "connext") {
          echo'<td style="background-color: gray"><b>PROGRAM TVS</b></td>
        <td colspan="9">'.$program_tnvs.'</td>';
        }else{
          echo'';
        }
      ?>
      </tr>
  		<tr>
  			<td style="background-color: gray"><b>BRANCH ASSIGNED</b></td>
  			<td ><?php echo $branch_assign;?></td>
  			<td colspan="2" style="background-color: gray"><b>ENDORESED BY</b></td>
  			<td colspan="2"><?php echo $endorse_by;?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>Remarks</b></td>
  			<td colspan="9"><?php echo $remarks;?></td>
  		</tr>
  	</table>
  	<table class="table table-bordered table-condensed" >
  		<tr>
  			<td colspan="12" style="background:url('yelow.png');"><b><center>APPROVAL</center></b></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>NAME OF APPROVER</b></td>
  			<td><?php echo $name_of_approval;?></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>SIGNATURE OF APPROVER</b></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td style="background-color: gray"><b>DATE APPROVED</b></td>
  			<td><?php echo $date_approve?></td>
  		</tr>
  	</table>
  	<br><br>
  	<br><br><br>
  </div>
  <br>
  </body>
  </html>
  
  
