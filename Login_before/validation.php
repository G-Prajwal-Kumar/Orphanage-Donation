<?php

session_start();

$con = mysqli_connect('localhost','root','','farm_login');

$name = $_POST['usr'];
$pass = $_POST['pwd'];

$s1 = " select * from admins where user_name = '$name' && password = '$pass'";
$s2 = " select * from admin_users where ad_user_name = '$name' && ad_passsword = '$pass'";

if (mysqli_num_rows(mysqli_query($con, $s1)) == 1){
	$d = mysqli_fetch_assoc(mysqli_query($con, $s1));
	$_SESSION['admin_id'] = $d['admin_id'];
	echo("<script>window.location = '../Admin/admin_home.php';</script>");
}else if(mysqli_num_rows(mysqli_query($con, $s2)) == 1){
	$d = mysqli_fetch_assoc(mysqli_query($con, $s2));
	$_SESSION['ad_user_id'] = $d['ad_user_id'];
	echo("<script>window.location = '../Admin/ad_user_home.php';</script>");
}else{
	$s = " select * from login_reg_details where reg_user_name = '$name' && reg_password = '$pass'";
	$test = " select reg_id from login_reg_details where reg_user_name = '$name' && reg_password = '$pass'";
	$result = mysqli_query($con, $s);

	if(mysqli_num_rows($result) == 1){
		$_SESSION['reg_name'] = $name;

		$result_1 = mysqli_query($con, $test);
		$test = mysqli_fetch_array($result_1);
		$_SESSION['val_id'] = $test[0];

		header('location: ../login_later/home.php');
	}
	else{
		echo "<script>alert('Incorrect username or password!')</script>";
		echo("<script>window.location = 'login.html';</script>");
	}
}
?>