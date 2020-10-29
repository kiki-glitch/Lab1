<?php 

	require "GUI.php";
?>


	<main>

	<?php

		if(isset($_SESSION['userId'])){

			
			echo '<p>You are logged in!<p>';
			echo 'Welcome '; echo $_SESSION['userUid'];
		}
		else{

			echo '<p>You are logged out!</p>';
		}
		?>
		
		
	</main>

