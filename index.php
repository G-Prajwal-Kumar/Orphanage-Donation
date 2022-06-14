
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Resource Management</title>
		<link rel="stylesheet" type="text/css" href="t1.css">
	</head>
	
	
<body>
<div id="page-wh">

	<div id="nav_bar">
		<h1 id="heading">RESOURCE MANAGEMENT</h1>
		<center>
		<div id="menu-bar-2">
			<div style="width: auto;height: auto;padding: 4px 0px;">
			<a href="index.html">Home</a>				
			<a href="reglogin.html">Register</a>
			<a href="login.html">Already a Member? Login!</a>
			<a href="contact.php">Contact Us.</a>
			</div>
		</div>
		</center>
	</div>		

	<div id="page">

		<p id="slide-heading"> See it Yourself</p>

		<div id="slider">
			<div id="slides">
				
				<input type="radio" name="radio-btn" checked="checked" id="radio1">
				<input type="radio" name="radio-btn" id="radio2">
				<input type="radio" name="radio-btn" id="radio3">
				<input type="radio" name="radio-btn" id="radio4">
				
				<div class="slide first">
					<img src="https://drive.google.com/uc?export=view&id=1KHHfelCgVVjOe2QXw4hDtiClp6Ig6y-W">
				</div>
				<div class="slide">
					<img src="https://drive.google.com/uc?export=view&id=1WIXzjHL7itb02ODI-7Yf2_BK2SIYid8r">
				</div>
				<div class="slide">
					<img src="https://drive.google.com/uc?export=view&id=1PvUHolrhvwyJ9Pzb8VRfYtkEXcyWrisy">
				</div>
				<div class="slide">
					<img src="https://drive.google.com/uc?export=view&id=1ZgXIEKSBRYNwWHHMYPnKXap5jda6pPAk">
				</div>

				<div class="navigation-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
				</div>

				<div class="navigation-manual">
					<label for="radio1" class="manual-btn"></label>
					<label for="radio2" class="manual-btn"></label>
					<label for="radio3" class="manual-btn"></label>
					<label for="radio4" class="manual-btn"></label>
				</div>
			</div>
		</div>



		<p class= "btnHead">Do you feel concerned about these under-privileged people? If yes, please donate!</p>
		<!-- Trigger/Open The Modal -->
	<div id="end_bar">
		<p class="top"> Donate or Visit the prodegies | Charitable Number - +(91)9346743312 | resourcesmanagement2022@gmail.com </p>
	</div>
</div>

<script type="text/javascript">


var counter = 1;
	setInterval(function(){
		document.getElementById('radio' + counter).checked = true;
		counter++;
		if(counter > 4){
			counter = 1;
	}
}, 5000);


</script>
</body>
</html>