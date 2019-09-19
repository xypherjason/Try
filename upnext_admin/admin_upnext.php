<?php   
    session_start();
    if(!isset($_SESSION['username'])){
      header("location:../index.php");
    }
  ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Upnext Admin</title>
	<link rel="icon" type="image" href="../assets/upnext.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/Dtables.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="../sweetalertjs/sweetalert.js"></script>
	<script src="../upnext_admin/jquery-3.4.1.min.js"></script>
	<script src="Dtables.js"></script>
</head>
<body style="background-image: url('../xypher_admin/white.jpg');background-repeat: no-repeat; background-size: cover; ">
<?php include'upnext_navbar.php';?>
	<div class="container">
		<div class="alert alert-info" style="font-size: 20px; margin-top: 90px;"><i class="fa fa-users "></i> AGENT PERSONAL DETAILS</div>
      <style>
        th {
          background: #000;
          color: #FDC30F;
          }
      </style>
			 <table id = "example" class="table table-striped table-bordered ss" style="width:100%; background-color: white">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Account Status</th>
                <th>Agent Type</th>
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
                          $id = $row['id'];
                          $lname = $row['lastname'];
                          $fname = $row['firstname'];
                          $mname = $row['middlename_suffix'];
                          $stats = $row['status'];
                          $acct = $row['acct_approval'];
                          $acti = $row['account_activation'];
                          $type = $row['agent_type'];
           ?>
            <tr>
                <td><center><?php echo $lname?>, <?php echo $fname?> <?php echo $mname?><input type="hidden" value="<?php echo $lname; echo','; echo $fname; echo ' '; echo $mname;?>" name=""></center></td>
                <td><center><span class="label label-success"><?php echo $stats?></span></center></td>
                <td><center><?php echo $type;?></center></td>
                <td><center><a href='agency_form.php?lastname=<?php echo "$lname" ?>'><button class="btn btn-info"><span class="fa fa-eye"></span> View Agent Details</button></a>
                  <?php if($acct == "Pending"){
                      echo'|| <button class="btn btn-warning" disabled><span class="fa fa-check" ></span> Request for Activation</button></center></td>';
                  }elseif ($stats == "Active") {
                     echo'|| <button class="btn btn-warning"><span class="fa fa-envelope" ></span> Already Activated</button></center></td>';
                  }elseif ($acti == "Requested") {
                     echo'|| <button class="btn btn-warning"><span class="fa fa-envelope" ></span> Request for Activation is Already Sent</button></center></td>';
                  }else{
                      echo'|| <a href="request.php?id='.$id.'"><button class="btn btn-warning"><span class="fa fa-check" ></span> Request for Activation</button></center></td>';
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