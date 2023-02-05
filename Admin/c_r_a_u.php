<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['admin_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select * from admins where admin_id = '$reg_id_no'");
$usr = mysqli_fetch_array($s);
mysqli_close($con);

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
						<a style="border: none;" href="admin_home.php"><?php echo $usr['user_name'] ?></a>
					</div>
				</div>
			</center>
		</div>		

		<div class="opts" style="width: 60%;padding: 2px; height: 60%; margin: 0 auto;margin-top: 4%; background: white; border-radius: 8px; overflow-y: auto; overflow-x: hidden;">
			<center>
				<div style="width: 98%; margin: 5px auto; height: 33px; border-radius: 3px; background:lightgray; display: flex; justify-content: space-around;">
					<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><b>User ID</b></p>
					<p style="width: 22%; height: 30px; margin-top: 8px;text-align: center;"><b>User Name</b></p>
					<p style="width: 20%; height: 30px; margin-top: 8px;text-align: center;"><b>Password</b></p>
					<p style="width: 4%; height: 30px; margin-top: 8px;text-align: center;"><b>View</b></p>
					<p style="width: 34%; height: 30px; margin-top: 8px;text-align: center;"><b>Email</b></p>
				</div>
			</center>
			<?php
				$con1 = mysqli_connect('localhost','root','','farm_login');
				$s1 = mysqli_query($con1, "select * from admin_users");
				if(mysqli_num_rows($s1) == 0){
					?>
				
					<h3 style="text-align: center; margin-top: 10px;">No Admin Users</h3>

					<?php
				}else{
					while($var = mysqli_fetch_assoc($s1)){
						?>
							<form action="ad_remove.php" method="get">
							<center>
								<div style="width: 98%; margin: 5px auto; height: 33px; border-radius: 3px; background:lightgray; display: flex; justify-content: space-around;">
									<p style="width: 10%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['ad_user_id'] ?></p>
									<button type="submit" style="width: 22%; height: 30px; text-align: center; background: none; border: none; text-decoration: underline;"><?php echo $var['ad_user_name'] ?></button>
									<input type="password" id="pwss<?php echo $var['ad_user_id'] ?>" style="width: 20%; height: 30px;text-align: center; background: none; border: none" disabled value="<?php echo $var['ad_passsword'] ?>"></input>
									<p  onclick="pws('<?php echo $var['ad_user_id'] ?>')" style="width: 4%; height: 30px; margin-top: 8px;text-align: center;"><i class="bi bi-eye"></i></p>
									<p style="width: 34%; height: 30px; margin-top: 8px;text-align: center;"><?php echo $var['ad_email'] ?></p>
								</div>
							</center>
							<input type="hidden" name="adid" value="<?php echo $var['ad_user_id'] ?>">
							</form>
						<?php
					}
				}
			?>
		</div>

		<button onclick="send()" class="field_btn" style="width: 13%; position: relative; left: 43.5%; margin-top: 25px">Create Admin User</button>

		<div id="end_bar">
			<p class="top"> Admin Page</p>
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

	.bi-eye{
		color: black;
		margin-top: 2px;
		padding: 3px;
	}
</style>
<script type="text/javascript">
	function pws(id){
		if (document.getElementById('pwss'+ id).type == "password"){
			document.getElementById('pwss'+ id).type = "text"
		}else{
			document.getElementById('pwss'+ id).type = "password"
		}
	}

	function send(){
		window.location = 'create_au.php';
	}

</script>
</html>