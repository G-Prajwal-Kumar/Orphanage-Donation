<?php

session_start();
if (!isset($_SESSION['ad_user_id'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['ad_user_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admin_users where ad_user_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);


?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Charity Management</title>
	<!-- JavaScript Bundle with Popper -->
	<!-- CSS only -->
	<!-- JavaScript Bundle with Popper -->
	<link rel="stylesheet" type="text/css" href="../Login_before/t1.css">
</head>


<body>
	<div id="page-wh">

		<div id="nav_bar">
			<h1 id="heading">CHARITY MANAGEMENT</h1>
			<center>
				<div id="menu-bar-2">
					<div style="width: auto;height: auto;padding: 4px 0px;">
						<a style="border: none;"><?php echo $usr['ad_user_name'] ?></a>
					</div>
				</div>
			</center>
		</div>		

		<div class="opts" style="width: 25%;padding: 10px 0px; height: auto; margin: 0 auto;margin-top: 11.5%; background: white; border-radius: 8px; position: flex; justify-content: center;">
			<a href="donations_ad.php">Donations</a>
			<a href="change_password_ad.php">Change Password</a>
			<a href="../login_later/logout.php">Logout</a>
		</div>

		<div id="end_bar">
			<p class="top"> Admin-User Page</p>
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