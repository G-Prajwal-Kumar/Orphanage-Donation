<?php

session_start();
if (!isset($_SESSION['admin_check_1'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['admin_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admins where admin_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);
mysqli_close($con);

if(isset($_POST['sub'])){
  	$input = $_POST['pw'];
  	$input1 = $_POST['rpw'];
  	$con = mysqli_connect('localhost','root','','farm_login');
	if ($input == $input1){
		if (mysqli_query($con,"update admins set password = '$input' where admin_id = '$reg_id_no'")){
			echo "<script>alert('Password Update Successful!')</script>";
			echo("<script>window.location = 'admin_home.php';</script>");	
		}else{
			echo "<script>alert('Password Update Unsuccessful!\nPlease try again Later')</script>";
			echo("<script>window.location = 'admin_home.php';</script>");	
		}
	}else{
		echo "<script>alert('Password Mis-Match!')</script>";
	}
	mysqli_close($con);
}

?>

<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Charity Management</title>
		<!-- JavaScript Bundle with Popper -->
		<!-- CSS only -->
		<!-- JavaScript Bundle with Popper -->
		<link rel="stylesheet" type="text/css" href="../login_later/t1.css">
	</head>
	
	
<body>
<div id="page-wh">

	<div id="nav_bar">
		<h1 id="heading">CHARITY MANAGEMENT</h1>
		<center>
		<div id="menu-bar-2">
			<div style="width: auto;height: auto;padding: 4px 0px;">
				<a><?php echo $usr['user_name'] ?></a>
			</div>
		</div>
		</center>
	</div>		

	<div class="opts" style="width: 25%;padding: 10px 0px; height: auto; margin: 0 auto;margin-top: 11.5%; background: white; border-radius: 8px; position: flex; justify-content: center;">
		<form method="post">
			<center>
			<input class="field_look" type="password" name="pw" placeholder="Enter New Password">
			<input class="field_look" type="password" name="rpw" placeholder="Re-Enter New Password">
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