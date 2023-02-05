<?php

session_start();
if (!isset($_SESSION['reg_name'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['val_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select reg_user_name from login_reg_details where reg_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);


?>


<html>
	<head>
		<title>Charity Management</title>
		<link rel="stylesheet" type="text/css" href="t1.css">
	</head>
	
	
	<body>

		<div style="widows: 100%;height: 100%;">

		<div id="nav_bar">
		<h1 id="heading">CHARITY MANAGEMENT</h1>
		<center>
		<div id="menu-bar-2">
			<div style="width: auto;height: auto;padding: 4px 0px;">
			<a href="home.php">Home</a>	
			<a href="contact.php">Contact Us.</a>
			<a href="opt.php"><?php echo $usr['reg_user_name'] ?></a>
			</div>
		</div>
		</center>
		</div>

		<div style="width: 35%; height: 15%; background: white; margin: 14% auto; border-radius: 20px; box-shadow: 0px 0px 5px 5px white;">
			<h3 style="color: black; text-align: center; padding-top: 5%;">Your Query has been noted.<br>We will get back to you shortly.</h3>
		</div>

		<div id="end_bar_login">
			<p class="top"> Donate or Visit the prodegies | Charitable Number - +(91)9346743312 | charitymanagement2022@gmail.com </p>
		</div>


	</div>		
	</body>
</html>