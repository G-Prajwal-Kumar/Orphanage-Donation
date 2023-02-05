<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['admin_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admins where admin_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);

if(isset($_POST['sub'])){
  	$user_name = $_POST['user_name'];
  	$email = $_POST['email'];
  	$pw = $_POST['pw'];
  	$rpw = $_POST['rpw'];
  	$con = mysqli_connect('localhost','root','','farm_login');
  	if ($pw == $rpw){
  		$ch1 = "select * from login_reg_details where reg_user_name = '$user_name'";
  		$ch2 = "select * from login_reg_details where reg_password = '$pw'";
  		if(mysqli_num_rows(mysqli_query($con,$ch1)) == 1 || mysqli_num_rows(mysqli_query($con,$ch2)) == 1){
  			echo "<script>alert('Admin User Credentials Not Available!')</script>";	
			echo "<script>window.location = 'create_au.php';</script>";
  		}else{
  			if(mysqli_query($con,"insert into admin_users (ad_user_name, ad_passsword, ad_email) values ('$user_name','$pw','$email')")){
				echo "<script>alert('Admin User Credentials Added!')</script>";	
				echo "<script>window.location = 'c_r_a_u.php';</script>";
			}else{
				echo "<script>alert('Admin User Credentials Not Added!\nTry Again Later')</script>";	
				echo "<script>window.location = 'c_r_a_u.php';</script>";
			}	
  		}
	}else{
		echo "<script>alert('Mis-Matched Passwords!')</script>";
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

		<div class="opts" style="width: 40%;padding: 5px 0px; height: 41%; margin: 0 auto;margin-top: 8%; background: white; border-radius: 8px; position: flex; justify-content: center;">
			<center>
			<form method="post">
				<input style="width: 94%; margin: 5px;" class="field_look" type="text" name="user_name" placeholder="Enter User Name">
				<input style="width: 94%; margin: 5px;" class="field_look" type="email" name="email" placeholder="Enter Email ID">
				<input style="width: 94%; margin: 5px;" class="field_look" type="password" name="pw" placeholder="Enter Password">
				<input style="width: 94%; margin: 5px;" class="field_look" type="password" name="rpw" placeholder="Re-Enter Password">
				<input class="field_btn" style="margin: 4px 0px;" type="submit" name="sub">
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