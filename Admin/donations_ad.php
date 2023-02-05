<?php

session_start();
if (!isset($_SESSION['ad_user_id'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['ad_user_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admin_users where ad_user_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);


?>

<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Charity Management</title>
		<!-- JavaScript Bundle with Popper -->
		<!-- CSS only -->
		<!-- JavaScript Bundle with Popper -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="../login_later/t1.css">
	</head>
	
	
<body>
<div id="page-wh" style="height: 100%;">

	<div id="nav_bar">
		<h1 id="heading">CHARITY MANAGEMENT</h1>
		<center>
		<div id="menu-bar-2">
			<div style="width: auto;height: auto;padding: 4px 0px;">
				<a href="ad_user_home.php" style="border: none;"><?php echo $usr['ad_user_name'] ?></a>
			</div>
		</div>
		</center>
	</div>
	<div style="width: 7%; height: auto; margin: 1.25% auto; display: flex; justify-content: space-evenly;">
		<i class="bi bi-list"></i>
		<i class="bi bi-ui-checks"></i>
	</div>
	<div style="width: 85%; height: 415px; margin: 0 auto; overflow: hidden">
		<div id="hello" style="width: 200%; height: 100%; display: flex;">
			<div class="opts" style="width: 100%; height: 100%; background: white; border-radius: 10px; overflow-y: auto; overflow-x: hidden;">
					<?php 
						$con = mysqli_connect('localhost','root','','farm_login');
						$s = "select x.reg_user_name, y.category, y.date, y.time from donar_table as y
								join login_reg_details as x on x.reg_id = y.reg_id;";
						$d = mysqli_query($con, $s);
						$f = mysqli_num_rows($d);
						?>
						<center>
						<div style="width: 97%; margin: 0 auto; height: 33px; border-radius: 3px; background:lightgray; display: flex; justify-content: space-around; margin-top: 9px;">
							<p style="width: 8%; height: 30px; margin-top: 8px;text-align: center;"><b>Serial</b></p>
							<p style="width: 8%; height: 30px; margin-top: 8px;text-align: center;"><b>User Name</b></p>
							<p style="width: 28%; height: 30px; margin-top: 8px;text-align: center;"><b>Category</b></p>
							<p style="width: 23%; height: 30px; margin-top: 8px;text-align: center;"><b>Date</b></p>
							<p style="width: 23%; height: 30px; margin-top: 8px;text-align: center;"><b>Time</b></p>
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
								<div style="width: 97%; height: 33px; border-radius: 3px; background: lightgrey; display: flex; justify-content: space-around; margin: 2.5px">
									<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $p; ?></p>
									<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['reg_user_name'] ?></p>
									<p style="width: 30%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['category'] ?></p>
									<p style="width: 25%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['date'] ?></p>
									<p style="width: 25%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['time'] ?></p>
								</div>
								</center>
							<?php
							}
						}
					?>
			</div>
			<div id="change">
				<div style="width: 70%; height: 100%; background: white; margin: 0 auto; border-radius: 10px; overflow-y: auto; overflow-x: hidden">
					<center>
						<div style="width: 97%; margin: 0 auto; height: 33px; border-radius: 3px; background:lightgray; display: flex; justify-content: space-around; margin-top: 9px;">
							<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><b>Serial</b></p>
							<p style="width: 30%; height: 30px; margin-top: 8px;text-align: center;"><b>User Name</b></p>
							<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><b>Donations</b></p>
							<p style="width: 25%; height: 30px; margin-top: 8px;text-align: center;"><b>Latest Date</b></p>
							<p style="width: 25%; height: 30px; margin-top: 8px;text-align: center;"><b>Latest Time</b></p>
						</div>
					</center>
					<?php 
						$con = mysqli_connect('localhost','root','','farm_login');
						$s = "select h.reg_id, ad.reg_user_name as x, h.a, h.b, h.c from (select reg_id, count(category) as a, max(date) as b, max(time) as c from donar_table group by reg_id) as h
							join login_reg_details as ad on ad.reg_id = h.reg_id order by b desc, c desc;";
						$d = mysqli_query($con, $s);
						if (mysqli_num_rows($d) == 0){
						?>
							<h3 style="text-align: center; margin-top: 10px;">No Recorded Donations</h3>
						<?php
						}
						else{
							$m=0;
							while($var = mysqli_fetch_assoc($d)){
								$m+=1;
								?>
								<form action="user_info_ad.php" method="post">
								<center>
								<div style="width: 97%; height: 33px; border-radius: 3px; background: lightgrey; display: flex; justify-content: space-around; margin: 2.5px">
									<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $m; ?></p>
									<button type="submit" style="width: 30%; height: 30px; margin-top: 0px;text-align: center; text-decoration: underline; background: none; border: none" ><?php echo $var['x'] ?></button>
									<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['a'] ?></p>
									<p style="width: 25%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['b'] ?></p>
									<p style="width: 25%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['c'] ?></p>
								</div>
								</center>
									<input type="hidden" name="user_id" value="<?php echo $var['reg_id'] ?>">
								</form>
								<?php
							}
						}
						
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="end_bar">
		<p class="top"> Admin-User Page </p>
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

	.bi{
		border: 2px solid lightgrey;
		padding: 5px;
		border-radius: 10px;
		transition: 0.5s;
	}

	.bi-list{
		background-color: #2CC9B1;
		color: white;
	}

	.bi-ui-checks{
		background-color: white;
		color: black;
	}

	#change{
		width: 100%;
		height: 100%;
		margin-left: 0%;
	}
</style>
<script type="text/javascript">

	$(".bi-ui-checks").click(function(){
		$(".bi-ui-checks").css({"background-color": "#2CC9B1"});
		$(".bi-list").css({"background-color": "white"});
		$(".bi-ui-checks").css({"color": "white"});
		$(".bi-list").css({"color": "black"});
  		$("#hello").animate({marginLeft: '-105%'},500);
  		$("#hello").animate({marginLeft: '-100%'},250);
	});

	$(".bi-list").click(function(){
		$(".bi-ui-checks").css({"background-color": "white"});
		$(".bi-list").css({"background-color": "#2CC9B1"});
		$(".bi-ui-checks").css({"color": "black"});
		$(".bi-list").css({"color": "white"});
  		$("#hello").animate({marginLeft: '5%'},500);
  		$("#hello").animate({marginLeft: '0%'},250);
	});
</script>
</html>