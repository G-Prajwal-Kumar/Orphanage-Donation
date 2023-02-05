<?php

session_start();
if (!isset($_SESSION['forgot_ml'])) {
	header('location: ../login_before/forgot_1.php');
}

$email = $_SESSION['forgot_ml']


?>

<html>
<head>
	<title>Charity Management</title>
	<link rel="stylesheet" type="text/css" href="../Login_before/t1.css">
</head>


<body onload="javascript:DrawCaptcha()">

	<div style="widows: 100%;height: 100%;">

		<div id="nav_bar">
			<h1 id="heading">Charity MANAGEMENT</h1>
			<center>
				<div id="menu-bar-2">
					<div style="width: auto;height: auto;padding: 4px 0px;">
						<a href="home.html">Home</a>				
						<a href="reglogin.html">Register</a>
						<a href="login.html">Already a Member? Login!</a>
						<a href="cotact.html">Contact Us.</a>
					</div>
				</div>
			</center>
		</div>


		<div class="user_check">
			<form action="test.php" method="post" style="margin: 0px">
				<input type="hidden" id="hdd" name="code_sent">
				<h3 style="text-align: center; margin-top: 1%;">Click to send code to <?php echo $email ?></h3>
				<center><input class="field_btn" type="submit" value="Send"></center>
			</form>
			<a style="float: right; margin-bottom: 1.5%; margin-right: 1.5%" href="../Login_before/login.html">Cancel</a>
		</div>











		<div id="end_bar_login">
			<p class="top"> Donate or Visit the prodegies | Charitable Number - +(91)9121834363 | charitymanagement2022@gmail.com </p>
		</div>


	</div>
	<style type="text/css">
		.user_check{
			width: 40%;
			height: auto;
			background: white;
			box-shadow: 0px 0px 10px 10px white;
			float: left;
			margin-left: 30%;
			margin-top: 15%;

		}

		#sub{
			width: 50%; 
			height: 5%; 
			border-radius: 115px; 
			box-shadow: 0px 0px 10px 10px #43D1AF;
			background: #43D1AF;
			border:  none;
			margin-top: 10	px;
			color: white;
		}

		#sub:hover{
			background-color: rgb(214, 214, 214);
			box-shadow: 0px 0px 10px 10px lightgrey;
			transition: .2s;
			color:green;
		}

		.form-style-6{
			font: 95% Arial, Helvetica, sans-serif;
			margin: 20px auto;
			padding: 16px;
			background: #F7F7F7;
			width: 45%;
			height: auto;
			position: relative;
			top: 15%;

		}
		.form-style-6 h1{
			background: #43D1AF;
			padding: 20px 10px;
			font-size: 140%;
			font-weight: 300;
			text-align: center;
			color: #fff;
			margin: -20px -20px 20px -20px;
		}
		.form-style-6 input[type="text"],
		.form-style-6 input[type="date"],
		.form-style-6 input[type="datetime"],
		.form-style-6 input[type="email"],
		.form-style-6 input[type="number"],
		.form-style-6 input[type="search"],
		.form-style-6 input[type="time"],
		.form-style-6 input[type="url"],
		.form-style-6 input[type="password"],
		.form-style-6 textarea,
		.form-style-6 select 
		{
			-webkit-transition: all 0.30s ease-in-out;
			-moz-transition: all 0.30s ease-in-out;
			-ms-transition: all 0.30s ease-in-out;
			-o-transition: all 0.30s ease-in-out;
			outline: none;
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			width: 100%;
			background: #fff;
			margin-bottom: 4%;
			border: 1px solid #ccc;
			padding: 3%;
			color: #555;
			font: 95% Arial, Helvetica, sans-serif;
		}
		.form-style-6 input[type="text"]:focus,
		.form-style-6 input[type="date"]:focus,
		.form-style-6 input[type="datetime"]:focus,
		.form-style-6 input[type="email"]:focus,
		.form-style-6 input[type="number"]:focus,
		.form-style-6 input[type="search"]:focus,
		.form-style-6 input[type="time"]:focus,
		.form-style-6 input[type="url"]:focus,
		.form-style-6 input[type="password"]:focus,
		.form-style-6 textarea:focus,
		.form-style-6 select:focus
		{
			box-shadow: 0 0 5px #43D1AF;
			padding: 3%;
			border: 1px solid #43D1AF;
		}

		.form-style-6 input[type="button"]{
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			width: 100%;
			padding: 5%;
			background: #43D1AF;
			border-top-style: none;
			border-right-style: none;
			border-left-style: none;    
			color: #fff;
		}
		.form-style-6 input[type="submit"]:hover,
		.form-style-6 input[type="button"]:hover{
			background: #2EBC99;
		}
	</style>

</body>
<script type="text/javascript">
	function DrawCaptcha(){
	    	var chars = "123456789ABCDEFGHIJKLMNPQRSTUVWXTZ";
	    	var string_length = 8;
	    	var randomstring = '';
	    	for (var i=0; i<string_length; i++) {
	    		var rnum = Math.floor(Math.random() * chars.length);
	    		randomstring += chars.substring(rnum,rnum+1);
	    	}
	    	document.getElementById("hdd").value = randomstring;
    	}
</script>
</html>