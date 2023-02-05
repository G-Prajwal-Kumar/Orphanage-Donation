<?php
session_start();
if (!isset($_SESSION['check_1'])) {
	header('location: ../login_later/opt.php');
}

$id = $_SESSION['val_id'];
$np = $_POST['pw'];
$rnp = $_POST['rpw'];
$opt = $_POST['opts'];

if ($opt == "pw"){
	if ($np == $rnp){
	$con = mysqli_connect('localhost','root','','farm_login');
	$s = "update login_reg_details set reg_password = '$np' where reg_id = '$id'";
	if(mysqli_query($con, $s)){
		echo("<script>alert('Password Successfully Reset!')</script>");
 		echo("<script>window.location = '../login_later/opt.php';</script>");	
	}else{
		echo("<script>alert('Password Reset Unsuccessful!\nRetry Later')</script>");
		echo("<script>window.location = '../login_later/opt.php';</script>");	
	}
	

	}else{
		echo("<script>alert('Password Mis-match!')</script>");
	 	echo("<script>window.location = 'change_password_1.php';</script>");
	}
}else if($opt == "em"){
	if ($np == $rnp){
	$con = mysqli_connect('localhost','root','','farm_login');
	$s = "update login_reg_details set reg_email = '$np' where reg_id = '$id'";
	if(mysqli_query($con, $s)){
		echo("<script>alert('EmailID Successfully Reset!')</script>");
 		echo("<script>window.location = '../login_later/opt.php';</script>");	
	}else{
		echo("<script>alert('EmailID Reset Unsuccessful!\nRetry Later')</script>");
		echo("<script>window.location = '../login_later/opt.php';</script>");	
	}
	

	}else{
		echo("<script>alert('Email Mis-match!')</script>");
	 	echo("<script>window.location = 'change_email_1.php';</script>");
	}
}



?>