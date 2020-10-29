<?php

	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Navbar</title>
	
	<!--CSS Stylesheet-->
	<link rel="stylesheet" type="text/css" href="food.css">


</head>
<body>


	<header>
		
			<a href = "header.php">
				<img src="./upload/company.jpg" alt="logo" class="logo" style="width: 50%; height: 10%;">
			</a>
			<br><br><br><br>
	</header>

			<br><br><br><br>

		<div>
			<?php

			if(isset($_SESSION['userId'])){

			
			echo '<form action="includes/logout_inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
		}
		else{

			echo '<form action="includes/login_inc.php" method="post" class="form">		

				<input type="text" name="mailuid" placeholder="Username/E-mail">
				<br><br>
				<input type="password" name="pwd" placeholder="Password"><br><bR>
				<button type="submit" name="login-submit">Login</button><br><br>
				</form>
				<a href="signup.php" style="color:#0088a9;">Signup</a>';
		}



		?>
			
			
		</div>