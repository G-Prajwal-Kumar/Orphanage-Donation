<?php

session_start();

$con = mysqli_connect('localhost','root','','farm_login');

$name = $_POST['user_name'];
$emal = $_POST['user_email'];

$s = " select * from login_reg_details where reg_user_name = '$name' && reg_email = '$emal'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['forgot_ml'] = $emal;
	header('location: ../Forgot/forgot_2.php');
}
else{
	echo ("<script>alert('Mismatched UserName or EmailID')</script>");
	echo("<script>window.location = 'forgot_1.php';</script>");
}

?>