<?php

session_start();
header('location: interest.php');

$con = mysqli_connect('localhost','root','','farm_login');

$reg = $_POST['field1'];
$cat = $_POST['field4'];
$date = date('Y-m-d');
$time = date('H:i:s');

$reg= " insert into donar_table(reg_id , category , date, time) values ('$reg' , '$cat' , '$date', '$time')";
mysqli_query($con, $reg);

?>