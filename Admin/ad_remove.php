<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['admin_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admins where admin_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);
mysqli_close($con);

$ad_rm = $_GET['adid'];

if(isset($_POST['btn'])){
  	$input = $_POST['pass'];
  	$con = mysqli_connect('localhost','root','','farm_login');
	$s = mysqli_query($con,"select * from admins where admin_id = '$reg_id_no' && password = '$input'");
	if (mysqli_num_rows($s) == 1){
		if (mysqli_query($con , "delete from admin_users where ad_user_id = '$ad_rm'")){
			echo "<script>alert('Admin User Credentials Deleted!')</script>";	
			echo "<script>window.location = 'c_r_a_u.php';</script>";
		}

	}else{
		echo "<script>alert('Incorrect Password!')</script>";
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
	<link rel="stylesheet" type="text/css" href="../Login_before/t1.css">
</head>


<body>
	<div id="page-wh">

		<div id="nav_bar">
			<h1 id="heading">CHARITY MANAGEMENT</h1>
			<center>
				<div id="menu-bar-2">
					<div style="width: auto;height: auto;padding: 4px 0px;">
						<a style="border: none;"><?php echo $usr['user_name'] ?></a>
					</div>
				</div>
			</center>
		</div>		

		<div class="opts" style="width: 30%;padding: 2px; height: 19%; margin: 0 auto;margin-top: 15%; background: white; border-radius: 8px; overflow-y: auto; overflow-x: hidden;">
			<center>
				<form method="post">
					<input class="field_look" type="password" name="pass" placeholder="Enter Admin Password" style="margin-top: 15px; margin-right: 10px; margin-left: 5px; width: 90%">
					<input class="field_btn" type="submit" name="btn" value="Verify">
				</form>
			</center>
		</div>

		<div id="end_bar">
			<p class="top"> Admin Page</p>
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