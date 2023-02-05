<?php

session_start();
if (!isset($_SESSION['check_1'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['val_id'];
$usr = $_SESSION['reg_name'];


?>

<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Charity Management</title>
		<!-- JavaScript Bundle with Popper -->
		<!-- CSS only -->
		<!-- JavaScript Bundle with Popper -->
		<link rel="stylesheet" type="text/css" href="t1.css">
	</head>
	
	
<body>
<div id="page-wh">

	<div id="nav_bar">
		<h1 id="heading">CHARITY MANAGEMENT</h1>
		<center>
		<div id="menu-bar-2">
			<div style="width: auto;height: auto;padding: 4px 0px;">
				<a href="home.php">Home</a>
				<a href="contact.php">Contact Us.</a>
			</div>
		</div>
		</center>
	</div>		

	<div class="opts" style="width: 25%;padding: 10px 0px; height: auto; margin: 0 auto;margin-top: 11.5%; background: white; border-radius: 8px; position: flex; justify-content: center;">
		<form action="change_pw_1.php" method="post">
			<center>
			<input class="field_look" type="password" name="pw" placeholder="Enter New Password">
			<input class="field_look" type="password" name="rpw" placeholder="Re-Enter New Password">
			<input type="hidden" name="opts" value="pw">
			<input class="field_btn" type="submit" name="sub" value="Change">
			<center>
		</form>
	</div>

	<div id="end_bar">
		<p class="top"> Donate or Visit the prodegies | Charitable Number - +(91)9346743312 | resourcesmanagement2022@gmail.com </p>
	</div>
</div>
</body>
<style type="text/css">
	.opts a{
		display: block;
		text-align: center;
		margin: 10px 15px;
		text-decoration: none;
		color: black;
		font-size: 18px;
	}

	.opts a:hover{
		text-decoration: underline;
	}
</style>
</html>