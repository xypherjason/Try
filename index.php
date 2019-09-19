<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Upnext Admin Page</title>
	<link rel="icon" type="image" href="assets/upnext.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login_style.css">
	<script src="sweetalertjs/sweetalert.js"></script>
</head>
<body style="background-image: url('xypher_admin/white.jpg');background-repeat: no-repeat; background-size: cover; ">
	<div class="container">
		<div class="login-page">
			<div class="form">
				<img src="PDD logo.png" width="205" class="con">
				<form class="login-form" method="post">
		      <input type="text" name="username" style="background-color: white;" placeholder="username" required />
		      <input type="password" name="password" style="background-color: white;" placeholder="password" required />
		      <button type="submit" name="log">login</button>
		      <p class="message">Authorized Person Only</p>
		      <p class="message">Powered By XYPHER SOLUTIONS</p>
		    </form>
		    <?php include'login.php';?> 
			</div>
		</div>
	</div>
</body>
</html>