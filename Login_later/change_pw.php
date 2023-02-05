<?php

session_start();
if (!isset($_SESSION['reg_name'])) {
	header('location: ../login_before/login.html');
}

$id = $_SESSION['val_id'];
$pw = $_POST['pw'];
$opt = $_POST['opts'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = "select reg_password from login_reg_details where reg_id = '$id'";
$d = mysqli_query($con, $s);
$f = mysqli_fetch_row($d);

if ($pw == $f[0]){
	$_SESSION['check_1'] = "check_1";
	if ($opt == "pw"){
		header('location: change_password_1.php');	
	}else if ($opt == "em"){
		header('location: change_email_1.php');	
	}
	
}else{
	echo "<script>alert('Incorrect Password!')</script>";
	if ($opt == "pw"){
		echo("<script>window.location = 'change_password.php';</script>");
	}else if($opt == "em"){
		echo("<script>window.location = 'change_email.php';</script>");
	}
}

?>