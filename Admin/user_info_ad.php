<?php

session_start();
if (!isset($_SESSION['ad_user_id'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['ad_user_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admin_users where ad_user_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);

$user_info_id = $_POST['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Charity Management</title>
	<!-- JavaScript Bundle with Popper -->
	<!-- CSS only -->
	<!-- JavaScript Bundle with Popper -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="../Login_before/t1.css">
</head>


<body>
	<div id="page-wh">

		<div id="nav_bar">
			<h1 id="heading">CHARITY MANAGEMENT</h1>
			<center>
				<div id="menu-bar-2">
					<div style="width: auto;height: auto;padding: 4px 0px;">
						<a style="border: none;"><?php echo $usr['ad_user_name'] ?></a>
					</div>
				</div>
			</center>
		</div>		

		<i class="bi bi-arrow-left-circle-fill" onclick="func()"></i>

		<div class="opts" style="width: 60%; height: 20% ;padding: 5px; padding-bottom: 12px; padding-top: 3px; margin: 0 auto; margin-top: -0.5%; background: white; border-radius: 3px;">
			<?php
				$s = mysqli_query($con,"select * from 
							(select reg_email as c from login_reg_details where reg_id = '$user_info_id')as X
							JOIN
							(select reg_name as a, reg_phone as b, reg_address as e, reg_state as d from login_reg_contact where reg_id = '$user_info_id')as Y;");
				while($var = mysqli_fetch_assoc($s)){
				?>
						<div style="width: 49.5%; height: 29.5%; background-color: lightgray; margin: 0.25% 0%; border-radius: 5px; float: left;">
							<div style="width: 30%; height: 100%; float: left">
								<p style="width: 80%; height: auto; margin-top: 8px; float: left; text-align: left;"><b>&nbsp&nbsp&nbspName</b></p>
								<p style="width: 20%; height: auto; margin-top: 8px; float: right; text-align: right;"><b>:&nbsp&nbsp</b></p>
							</div>
							<p style="width: 70%; height: auto; margin-top: 8px; float: right; text-align: left;"><?php echo $var['a'] ?></p>
						</div>
						<div style="width: 49.5%; height: 29.5%; background-color: lightgray; margin: 0.25% 0%; border-radius: 5px; float: right;">
							<div style="width: 30%; height: 100%; float: left">
								<p style="width: 80%; height: auto; margin-top: 8px; float: left; text-align: left;"><b>&nbsp&nbsp&nbspPhone</b></p>
								<p style="width: 20%; height: auto; margin-top: 8px; float: right; text-align: right;"><b>:&nbsp&nbsp</b></p>
							</div>
							<p style="width: 70%; height: auto; margin-top: 8px; float: right; text-align: left; "><?php echo $var['b'] ?></p>
						</div>
						<div style="width: 49.5%; height: 29.5%; background-color: lightgray; margin: 0.25% 0%; border-radius: 5px; float: left;">
							<div style="width: 30%; height: 100%; float: left">
								<p style="width: 80%; height: auto; margin-top: 8px; float: left; text-align: left;"><b>&nbsp&nbsp&nbspEmail ID</b></p>
								<p style="width: 20%; height: auto; margin-top: 8px; float: right; text-align: right;"><b>:&nbsp&nbsp</b></p>
							</div>
							<p style="width: 70%; height: auto; margin-top: 8px; float: right; text-align: left; "><?php echo $var['c'] ?></p>
						</div>
						<div style="width: 49.5%; height: 29.5%; background-color: lightgray; margin: 0.25% 0%; border-radius: 5px; float: right;">
							<div style="width: 30%; height: 100%; float: left">
								<p style="width: 80%; height: auto; margin-top: 8px; float: left; text-align: left;"><b>&nbsp&nbsp&nbspState</b></p>
								<p style="width: 20%; height: auto; margin-top: 8px; float: right; text-align: right;"><b>:&nbsp&nbsp</b></p>
							</div>
							<p style="width: 70%; height: auto; margin-top: 8px; float: right; text-align: left; "><?php echo $var['d'] ?></p>
						</div>
						<div style="width: 100%; height: 39.5%; background-color: lightgray; margin: 0.25% 0%; border-radius: 5px; float: right;">
							<div style="width: 14.75%; height: 100%; float: left">
								<p style="width: 80%; height: auto; margin-top: 8px; float: left; text-align: left;"><b>&nbsp&nbsp&nbspAddress</b></p>
								<p style="width: 20%; height: auto; margin-top: 8px; float: right; text-align: right;"><b>:&nbsp&nbsp</b></p>
							</div>
							<p style="width: 85.25%; height: auto; margin-top: 8px; float: right; text-align: left; "><?php echo $var['e'] ?></p>
						</div>
				<?php
				}
			?>
		</div>

		<div style="width: 60%; height: 53%; padding: 5px; margin: 0 auto; margin-top: 0.75%; background: white; border-radius: 3px; overflow-y: scroll; overflow-x: hidden;">
			<?php 
				$con = mysqli_connect('localhost','root','','farm_login');
				$s = "select * from donar_table where reg_id = '$user_info_id'";
				$d = mysqli_query($con, $s);
				$f = mysqli_num_rows($d);
				?>
				<center>
				<div style="width: 100%; height: 33px; border-radius: 3px; background:lightgray; display: flex; justify-content: space-around; margin: 2.5px;">
					<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><b>Serial</b></p>
					<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Category</b></p>
					<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Date</b></p>
					<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Time</b></p>
				</div>
				</center>
				<?php
				if ($f == 0){
				?>
					<h3 style="text-align: center; margin-top: 10px;">No Recorded Donations</h3>
				<?php
				}else{
					$p = 0;
					while($var = mysqli_fetch_assoc($d)){
						$p+=1;
					?>
						<center>
						<div style="width: 100%; height: 33px; border-radius: 3px; background: lightgrey; display: flex; justify-content: space-around; margin: 2.5px">
							<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $p; ?></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['category'] ?></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['date'] ?></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['time'] ?></p>
						</div>
						</center>
					<?php
					}
				}
			?>
		</div>		

		<div id="end_bar">
			<p class="top"> Admin-User Page</p>
		</div>
	</div>
</body>
<style type="text/css">
	.opts a{
		display: block;
		text-align: center;
		margin: 10px 15px;
		text-decoration: none;
		color: black;
		font-size: 18px;
	}

	.opts a:hover{
		text-decoration: underline;
	}

	.bi-arrow-left-circle-fill{
		position: relative;
		left: 13%;
		top: 40%;
		background-color: white;
		border-radius: 10px;
		padding: 10px;
		color: black;
		transition: 0.2 5s;
		border: 2px solid lightgrey;
	}

	.bi-arrow-left-circle-fill:hover{
		background-color: #2CC9B1;
		color: white;
	}

	.bi-arrow-left-circle-fill:active{
		color: black;
	}
</style>
<script type="text/javascript">
	function func(){
		window.location = 'donations_ad.php';
	}

	var counter = 1;
	setInterval(function(){
		document.getElementById('radio' + counter).checked = true;
		counter++;
		if(counter > 4){
			counter = 1;
		}
	}, 5000);

// Get the modal
var modal_ = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
	modal_.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal_.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

function adjust_textarea(h) {
	h.style.height = "20px";
	h.style.height = (h.scrollHeight)+"px";
}

</script>
</html>