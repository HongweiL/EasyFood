<?php
	session_start();
?>

<html lang="en">
<head>
	<title>Easy Food</title>
	<link rel = "stylesheet"  href = "css/style.css" />
	<script src="jquery-3.3.1.min.js"></script>
</head>

<body name = "lp">
	<main name = "mb">
		<section class = "top-search">
			<div class="top-nav">
				<?php 
					if (isset($_SESSION['uid'])) {
						echo "<form action='includes/logout.inc.php'method = 'post' style = 'display : flex; flex-direction: row; height: 3vh;'>
						<button type='submit' name='submit' style = 'height: 2vh; margin-top: 1vh; background: #ff9800; border: 0; border-radius: 3px; color: white; padding-left: 10px; padding-right: 10px;'>Log out</button>
						<a href = 'login.php' style='text-decoration: none;'><h4>My Cart</h4></a>
						<a href = 'login.php' style='text-decoration: none;'><h4>Support</h4></a>
						</form>";
					} else {
						echo "<a href = 'login.php' style='text-decoration: none;'><h4>Log In/Sign up</h4></a>";
					}
				?>
				
			</div>	
			<div class="main-search">
				<div>
					<a href="index.php"><img src = "images/logo.jpg" alt = "Website Logo"></a>
				</div>
				<div class= "location">
					<select id = "location">
						<option value="10">St Lucia</option>
						<option value="11">Toowong</option>
						<option value="14">Milton</option>
						<option value="17">City</option>
						<option value="10">Woolongaba</option>
						<option value="11">Garden City</option>
						<option value="14">Indooropily</option>
						<option value="17">Sunny Bank</option>
					</select>
				</div>
				<div class = "search-bar">					
				  <input class = "search-bar" type="text" placeholder="Search Food or Restaurant You Like" name="search">
				  <button type="submit">Search</button>					
				</div>
			</div>			
		</section>