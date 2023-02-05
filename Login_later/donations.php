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
				<a href="opt.php"><?php echo $usr['reg_user_name'] ?></a>
			</div>
		</div>
		</center>
	</div>		

	<div class="opts" style="width: 50%;padding: 5px 0px; height: 287px; margin: 0 auto;margin-top: 7%; background: white; border-radius: 10px; position: flex; justify-content: center; overflow: auto;">
			<?php 
				$con = mysqli_connect('localhost','root','','farm_login');
				$s = "select * from donar_table where reg_id = '$reg_id_no'";
				$d = mysqli_query($con, $s);
				$f = mysqli_num_rows($d);
				?>
				<center>
				<div style="width: 97%; height: 33px; border-radius: 3px; background:lightgray; display: flex; justify-content: space-around; margin: 2.5px;">
					<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><b>Serial</b></p>
					<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Category</b></p>
					<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Date</b></p>
					<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Time</b></p>
				</div>
				</center>
				<?php
				if ($f == 0){
				?>
					<h3 style="text-align: center; margin-top: 10px;">No Recorded Donations</h3>
				<?php
				}else{
					$p = 0;
					while($var = mysqli_fetch_assoc($d)){
						$p+=1;
					?>
						<center>
						<div style="width: 97%; height: 33px; border-radius: 3px; background: lightgrey; display: flex; justify-content: space-around; margin: 2.5px">
							<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $p; ?></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['category'] ?></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['date'] ?></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['time'] ?></p>
						</div>
						</center>
					<?php
					}
				}
			?>
	</div>

	<div id="end_bar">
		<p class="top"> Donate or Visit the prodegies | Charitable Number - +(91)9121834363 | charitymanagement2022@gmail.com </p>
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