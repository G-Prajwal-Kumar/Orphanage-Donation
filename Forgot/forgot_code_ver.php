<?php
session_start();
if (!isset($_SESSION['code_ver'])) {
	header('location: ../login_before/forgot_1.php');
}

$code = $_SESSION['code_ver'];
$email_chk = $_SESSION['forgot_ml'];
$email_ver = $_POST['cod'];


if ($code == $email_ver){
	$_SESSION['forgot_up'] = $code;
	echo("<script>alert('Code Verified!')</script>");
 	echo("<script>window.location = 'forgot_update.php';</script>");

}else{
	echo "Incorrect Verification Code";
}
?>