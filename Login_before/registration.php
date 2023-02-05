<?php

session_start();
header('location: login.html');

$con = mysqli_connect('localhost','root','','farm_login');

$user_name = $_POST['field5'];
$email = $_POST['field2'];
$pass = $_POST['field6'];

$user = $_POST['field1'];
$phone = $_POST['field3'];
$address = $_POST['field7'];
$state = $_POST['field4'];


$s = " select * from login_reg_details where reg_user_name = '$user_name'";

//$d= " select * from login_reg_contact where reg_name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" Username Already Taken ";
}
else{
	$reg= " insert into login_reg_details(reg_user_name , reg_password , reg_email) values ('$user_name' , '$pass' , '$email')";
	mysqli_query($con, $reg);

	$reg1= " insert into login_reg_contact(reg_name , reg_phone , reg_address , reg_state) values ('$user' , '$phone' , '$address' , '$state')";
	mysqli_query($con, $reg1);
}

?>