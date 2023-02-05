<?php

session_start();
if (!isset($_SESSION['reg_name'])) {
	header('location: ../login_before/login.html');
}

$val_id = $_SESSION['val_id'];
$usr = $_POST['user_name'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$add = $_POST['address'];
$state = $_POST['state'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = "update login_reg_details set reg_user_name = '$usr' where reg_id = '$val_id'";
$d = "update login_reg_contact set reg_name = '$name', reg_phone = '$mobile', reg_address = '$add', reg_state = '$state' where reg_id = '$val_id'";
if (mysqli_query($con, $s) && mysqli_query($con, $d)){
	echo "<script>alert('Profile Update Success!')</script>";
	echo("<script>window.location = 'profile.php';</script>");
}else{
	echo "<script>alert('Profile Update Failed!')</script>";
	echo("<script>window.location = 'profile.php';</script>");
}

?>