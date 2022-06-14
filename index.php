<?php
$con = mysqli_connect('ec2-52-22-136-117.compute-1.amazonaws.com','suhpqtnnyaxmiq','20a9a482d1d7e8b78dee63181f6e4d640a7a2111e67169b03bc3e5f6e2998aac','d2d1dgnsihi7p1');
$result = mysqli_query($con, "select test from hello;");

$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Testing</title>
</head>
<body>
<h1><?php echo $num ?></h1>
</body>
</html>