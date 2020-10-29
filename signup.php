<?php 

	require "signup_header.php";
?>


	<main>
		<h1>Signup</h1>
		<?php 

		if(isset($_GET['error'])){

			if($_GET['error'] == "emptyfields"){

				echo '<p>Fill in all fields!</p>';
			}
			elseif($_GET['error'] == "invaliduidmail"){

				echo '<p>Invalid username and e-mail!</p>';
			}
			elseif($_GET['error'] == "invaliduid"){

				echo '<p>Invalid username!</p>';
			}
			elseif($_GET['error'] == "invalidmail"){

				echo '<p>Invalid e-mail!</p>';
			}
			elseif($_GET['error'] == "passwordcheck"){

				echo '<p>Your passwords do not match!</p>';
			}
			elseif($_GET['error'] == "usertaken"){

				echo '<p>Username is already taken!</p>';
			}

		}
		else if($_GET['signup'] == "success"){

			echo '<p>Signup successful!</p>';			

		}

		?>
		<form action="includes/signup_inc.php" method="post">
			<input type="text" name="uid" placeholder="Username"><br><br>
			<input type="text" name="city" placeholder="City of residence"><br><br>
			<input type="text" name="pic" placeholder="Profile pic"><br><br>
			<input type="text" name="mail" placeholder="E-mail"><br><br>
			<input type="password" name="pwd" placeholder="Password"><br><br>
			<input type="password" name="pwd-repeat" placeholder="Repeat Password"><br><br>
			<input type="radio" name ="user_type" id="user" value="User">
	 		<label for="user">User</label>
	
	  		<input type="radio" name ="user_type" id="admin" value="Admin">
	  		<label for="admin">Admin</label><br>
			
			<button type="submit" name="signup-submit">Signup</button>
		



		</form>

	</main>


 