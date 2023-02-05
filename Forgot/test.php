<?php

session_start();
if (!isset($_SESSION['forgot_ml'])) {
	header('location: ../login_before/forgot_1.php');
}

$code = $_POST['code_sent'];

$email = $_SESSION['forgot_ml'];

$to_email = $email;
$subject = "Charity Management - Veirfication Code";
$body = "The code for verification to reset your password is:\n$code\nIf you did not request this, please ignore.";
$headers = "From: Reset Password";

if (mail($to_email, $subject, $body, $headers)) {
	$_SESSION['code_ver'] = $code;
	header('location: forgot_validate.php');
} else {
    echo "Email sending failed...";
}

?>