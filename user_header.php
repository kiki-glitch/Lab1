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
				<img src="./upload/company.jpg" alt="logo" class="logo" style="width: 50%; height: 50%;">
			</a>
			<nav>
				
				<p style="color: white;">USER PROFILE</p>
			</nav>

		<div>
			<?php

			if(isset($_SESSION['userId'])){

			
			echo '<form action="includes/logout_inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
		}
			elseif(isset($_COOKIE['mailuid'])){

			$mailuid = $_COOKIE['mailuid'];

			echo "<script>

				document.getElementbyId('mailuid').value = $mail;

				</script>";

		}

			?>
			
			
		</div>
		

	</header>

</body>
</html>