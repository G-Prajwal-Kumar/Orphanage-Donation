<?php

session_start();
if (!isset($_SESSION['reg_name'])) {
	header('location: ../login_before/login.html');
}

$reg_id_no = $_SESSION['val_id'];
$con = mysqli_connect('localhost','root','','farm_login');
$s = mysqli_query($con,"select reg_user_name from login_reg_details where reg_id = '$reg_id_no'");
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
	<link rel="stylesheet" type="text/css" href="t1.css">
</head>


<body>
	<div id="page-wh">

		<div id="nav_bar">
			<h1 id="heading">CHARITY MANAGEMENT</h1>
			<center>
				<div id="menu-bar-2">
					<div style="width: auto;height: auto;padding: 4px 0px;">
						<a href="home.php">Home</a>
						<a href="contact.php">Contact Us.</a>
						<a href="opt.php"><?php echo $usr['reg_user_name'] ?></a>
					</div>
				</div>
			</center>
		</div>		

		<div id="page">
			<p id="slide-heading"> See it Yourself</p>
			<div id="slider">
				<input type="radio" name="radio-btn" checked="checked" id="radio1">
				<input type="radio" name="radio-btn" id="radio2">
				<input type="radio" name="radio-btn" id="radio3">
				<input type="radio" name="radio-btn" id="radio4">
				<div class="slides first">
					<div class="slide">
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
				</div>

				<div class="navigation-manual">
					<label for="radio1" class="manual-btn1"></label>
					<label for="radio2" class="manual-btn2"></label>
					<label for="radio3" class="manual-btn3"></label>
					<label for="radio4" class="manual-btn4"></label>
				</div>
			</div>



			<p class= "btnHead">Do you feel concerned about them? If yes, please donate!</p>
			<!-- Trigger/Open The Modal -->
			<center><button id="myBtn">DONATE</button></center>

			<!-- The Modal -->
			<div id="myModal" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<div class="form-style-5">

						<form action="donate.php" method="post">
							<fieldset>
								<center>
								<legend><span class="number"></span>Donate with us and spread smiles</legend>
								<input type="hidden" name="field1" value="<?php echo $reg_id_no; ?>">
								<select id="job" name="field4">
									<optgroup label="Requirements">
										<option value="Books">Books</option>
										<option value="Bags">Bags</option>
										<option value="Clothes">Clothes</option>
										<option value="Medicines">Medicines</option>
										<option value="Education needs">Education needs</option>
										<option value="Stationary Items">Stationery Items</option>
										<option value="Toys and Play-material">Toys and Play-material</option>
										<option value="Sports Equipments">Sports Equipments </option>
										<option value="Musical Equipments">Musical Equipments</option>
									</optgroup>
								</select>      
								</center>
							</fieldset>
							<input type="submit" value="Donate" />
						</form>
					</div>


					<div class="clear"></div>

					<p class= "stats">Help Us Change The Statistics-</p>
					<center>
						<div id="hello">
							<div class="stats-area">
								<div class="stats-section stats-menu">	
									<p class="num" style="color: #05A892;">90%</p>
									<p class="numtext" >are social orphans</p>
								</div>
							</div>
							<div class="stats-area">
								<div class="stats-section stats-menu stat1">
									<p class="num" style="color: #05A892;">70%</p>
									<p class="numtext" >of boys end up with criminal activities</p>	
								</div>
							</div>
							<div class="stats-area">
								<div class="stats-section stats-menu stat1">
									<p class="num" style="color: #05A892;">60%</p>
									<p class="numtext" >of girls end up in prostitution</p>	
								</div>
							</div>
							
							<div class="stats-area">
								<div class="stats-section stats-menu stat1">
									<p class="num" style="color: #05A892;">10%</p>
									<p class="numtext" >of orphan children commit suicide.</p>
								</div>	
							</div>
						</div>
					</center>

					<div>
						<p class="after-text">If not helped.</br> And thus we wish to create an environment safe and sound for the ones alone- to live and enjoy the life they deserve.</p>
					</div>	

					<div style="border-radius: 25px; height: auto;">

						<div>
							<p class= "works" >Shower your consern to them.</br> please help.</br></p>
							<p class= "works" id ="adopt">For Adoption Visit Our Website.</p>
							<p class= "works" >386 Charity Management </br> Sector- XYZ </br> Hyderabad</br> Pin- 500001 </br> Contact - 9121834363 OR charitymanagement2022@gmail.com</p>
						</div>		

						<div id="foot">
							<footer>
								<p  class="foot-color"> Help us. Help the children.<br/> Hyderabad- India <br/> Contact : +(91)9121834363| charitymanagement2022@gmail.com<br/>
									&copy 2021<a href="home.html"> &nbsp Charity Management</a>.</p>
								</footer>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div id="end_bar" style="position: static; ">
				<p class="top"> Donate or Visit the prodegies | Charitable Number - +(91)9121834363 | charitymanagement2022@gmail.com </p>
			</div>
		</div>

	</div>
</body>
<script type="text/javascript">


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