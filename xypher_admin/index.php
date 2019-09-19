<?php   
    session_start();
    if(!isset($_SESSION['username'])&& !isset($_SESSION['act_pass'])){
      header("location:../index.php");
    }
  ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Xypher Administrator Page</title>
	<link rel="icon" type="image" href="../assets/upnext.png">
  <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/Dtables.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
  <script src="../sweetalertjs/sweetalert.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jquery-1.9.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</head>
<body style="background:url('white.jpg'); background-repeat: no-repeat; background-size: cover;">
	<?php include 'xypher_navbar.php';?>
  <br>
<div class="container">
	<div class="alert alert-info" style="font-size: 20px; margin-top: 90px;"><i class="fa fa-user"></i> Account Activation</div>
    <div class="well">
      
       <table id = "example" class="table table-striped table-bordered ss" style="width:100%; background-color: white">
        <thead>
            <tr>
                <th>Agent Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		include '../dbcon.php';
        		$link = connect_db();
        		$sql = "SELECT * FROM agent_list_tb";
        		$result = mysqli_query($link,$sql) or die(mysqli_error($link));
        	?>
        	<?php 
              $n = 1;
                while ($row = mysqli_fetch_array($result)) {
                          $b_id = $row['id'];
                          $lname = $row['lastname'];
                          $fname = $row['firstname'];
                          $mname = $row['middlename_suffix'];
                          $stat = $row['status'];
                          $activate = $row['account_activation'];
           ?>
            <tr>
                <td><center><?php echo $lname?>, <?php echo $fname?> <?php echo $mname?></center></td>
                <?php 
                if($stat == "Active"){
                    echo'<td><center><a href="deactivate.php?id='.$b_id.'"><button class="btn btn-danger"><span class="fa fa-times"></span> DEACTIVATE AGENT ACCOUNT</button></a></center></td>';
                }
                elseif ($activate == "Not yet Activated") {
                     echo'<td><center><a href="activate_account.php?id='.$b_id.'"><button class="btn btn-primary" disabled><span class="fa fa-check"></span> ACTIVATE AGENT ACCOUNT</button></a></center></td>';
                }
                else{
                  echo'<td><center><a href="activate_account.php?id='.$b_id.'"><button class="btn btn-primary"><span class="fa fa-check"></span> ACTIVATE AGENT ACCOUNT</button></a></center></td>';
                }
                ?>
            </tr>
            <?php 
                $n++;
                }
             ?>
        </tbody>
    </table>
  </div>
</body>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</html>