<?php

session_start();
if (!isset($_SESSION['reg_name'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['val_id'];
$usr = $_SESSION['reg_name'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = "select * from login_reg_details where reg_id = '$reg_id_no'";
$d = mysqli_query($con, $s);
$f = mysqli_fetch_row($d);

$s1 = "select * from login_reg_contact where reg_id = '$reg_id_no'";
$d1 = mysqli_query($con, $s1);
$f1 = mysqli_fetch_row($d1);

$ss = mysqli_query($con,"select reg_user_name from login_reg_details where reg_id = '$reg_id_no'");
$usr = mysqli_fetch_array($ss);


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
	<form action="profile_update.php" method="post" id="form_id">
	<div class="opts" style="width: 40%;padding: 1px 0px; height: auto; margin: 0 auto;margin-top: 2%; background: white; border-radius: 8px; position: flex; justify-content: center;">
		<center>
		<div style="width: 95%; height: 50px; background-color: lightgrey; border-radius: 5px;">
			<div style="width: 30%; float: left">
				<label style="float:left;margin-left: 10px; margin-top: 7px" for="user_name">UserName</label>
				<label style="float: right; margin-right: 0px; margin-top: 7px;">:</label>
			</div>
			<div style="width: 70%; float: right;">
				<input class="inpts" style="float: left; width: 90%;margin-top: 1px; margin-left: 10px;" type="text" name="user_name" value="<?php echo $f[1] ?>" disabled>
			</div>
		</div>
		<div style="width: 95%; height: 50px; background-color: lightgrey; border-radius: 5px;">
			<div style="width: 30%; float: left">
				<label style="float:left;margin-left: 10px; margin-top: 7px" for="name">Name</label>
				<label style="float: right; margin-right: 0px; margin-top: 7px;">:</label>
			</div>
			<div style="width: 70%; float: right;">
				<input class="inpts" style="float: left; width: 90%;margin-top: 1px; margin-left: 10px;" type="text" name="name" value="<?php echo $f1[1] ?>" disabled>
			</div>
		</div>
		<div style="width: 95%; height: 50px; background-color: lightgrey; border-radius: 5px;">
			<div style="width: 30%; float: left">
				<label style="float:left;margin-left: 10px; margin-top: 7px" for="email">Email ID</label>
				<label style="float: right; margin-right: 0px; margin-top: 7px;">:</label>
			</div>
			<div style="width: 70%; float: right;">
				<input style="float: left; width: 90%;margin-top: 1px; margin-left: 10px;" type="email" name="email" value="<?php echo $f[3] ?>" disabled>
			</div>
		</div>
		<div style="width: 95%; height: 50px; background-color: lightgrey; border-radius: 5px;">
			<div style="width: 30%; float: left">
				<label style="float:left;margin-left: 10px; margin-top: 7px" for="mobile">Mobile Number</label>
				<label style="float: right; margin-right: 0px; margin-top: 7px;">:</label>
			</div>
			<div style="width: 70%; float: right;">
				<input class="inpts" style="float: left; width: 90%;margin-top: 1px; margin-left: 10px;" type="text" name="mobile" value="<?php echo $f1[2] ?>" disabled>
			</div>
		</div>
		<div style="width: 95%; height: 80px; background-color: lightgrey; border-radius: 5px;">
			<div style="width: 30%; float: left;">
				<label style="float:left;margin-left: 10px; margin-top: 19px" for="address">Address</label>
				<label style="float: right; margin-right: 0px; margin-top: 19px;">:</label>
			</div>
			<div style="width: 70%; float: right;">
				<textarea class="inpts" style="float: left; width: 90%;height: 55px; margin-top: 0px; margin-left: 10px;" form="form_id"name="address" disabled><?php echo $f1[3] ?></textarea>
			</div>
		</div>
		<div style="width: 95%; height: 50px; background-color: lightgrey; border-radius: 5px;">
			<div style="width: 30%; float: left">
				<label style="float:left;margin-left: 10px; margin-top: 7px" for="state">State</label>
				<label style="float: right; margin-right: 0px; margin-top: 7px;">:</label>
			</div>
			<div style="width: 70%; float: right;">
				<input class="inpts" style="float: left; width: 90%;margin-top: 1px; margin-left: 10px;" type="text" name="state" value="<?php echo $f1[4] ?>" disabled>
			</div>
		</div>
		<button type="button" class="field_btn" id="btn_edit" style="margin-top: 0px; margin-bottom: 10px;" onclick="update_enable()">Edit</button>
		<input id="updt_edit" type="submit" name="sub" value="Update" class="field_btn" style="width: 80px; height: 35px; margin-top: 0px; margin-bottom: 10px;" hidden>
		<button hidden type="button" class="field_btn" id="btn_edit_1" style="margin-top: 0px; margin-bottom: 10px;" onclick="update_disable()">Cancel</button>
		</center>
	</div>
	</form>

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

	.opts label{
		display: block;
		margin-top: 15px;
		font-size: 16px;
		text-align: right;
	}

	.opts input{
		width: 65%;
		margin-top: 10px;
		height: 23px;
	}

	.opts div{
		margin: 10px 0px;
	}
</style>
<script type="text/javascript">
	function update_enable(){
		var cells = document.getElementsByClassName("inpts");
		for (var i = 0; i < cells.length; i++) { 
    		cells[i].disabled = false;
		}
		document.getElementById("btn_edit").hidden = true;
		document.getElementById("updt_edit").hidden = false;
		document.getElementById("btn_edit_1").hidden = false;
	}
	function update_disable(){
		var cells = document.getElementsByClassName("inpts");
		for (var i = 0; i < cells.length; i++) { 
    		cells[i].disabled = true;
		}
		document.getElementById("btn_edit").hidden = false;
		document.getElementById("updt_edit").hidden = true;
		document.getElementById("btn_edit_1").hidden = true;
	}
</script>
</html>