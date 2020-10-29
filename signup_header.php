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
		
			<a href = "GUI.php">
				<img src="./upload/company.jpg" alt="logo" class="logo" style="width: 10%; height: 50%;">
			</a>
		

		<div>
			<?php

			if(isset($_SESSION['userId'])){

			
			echo '<form action="includes/logout_inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
		}
		else{

			echo '<form action="includes/login_inc.php" method="post">		

				<input type="text" name="mailuid" placeholder="Username/E-mail">
				<input type="password" name="pwd" placeholder="Password"><br>
				<input type = "checkbox" name = "remember" value = "Rememeber me">
				<label style="color:#0088a9; for ="remember" >Remember me &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp</label>
				
				<button type="submit" name="login-submit">Login</button><br>
				</form>
				<a href="signup.php" style="color:#0088a9;">Signup</a>';
		}

		
		?>
			
			
		</div>
		

	</header>

	<br> 
	<br>
	<br>

</body>
</html>


