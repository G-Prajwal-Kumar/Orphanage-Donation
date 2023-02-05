<?php
session_start();
if (!isset($_SESSION['forgot_up'])) {
	header('location: ../login_before/forgot_1.php');
}

$email_chk = $_SESSION['forgot_ml'];
$np = $_POST['np'];
$rnp = $_POST['rnp'];


if ($np == $rnp){
	$con = mysqli_connect('localhost','root','','farm_login');
	$s = "update login_reg_details set reg_password = '$np' where reg_email = '$email_chk'";
	if(mysqli_query($con, $s)){
		echo("<script>alert('Password Successfully Reset!')</script>");
 		echo("<script>window.location = '../login_before/login.html';</script>");	
	}else{
		echo("<script>alert('Password Reset Unsuccessful!\nRetry Later')</script>");
		echo("<script>window.location = '../login_before/login.html';</script>");	
	}
	

}else{
	echo("<script>alert('Password Mis-match!')</script>");
 	echo("<script>window.location = 'forgot_update.php';</script>");
}
?>