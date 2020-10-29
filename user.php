<?php 
//ALEX KARIUKI 121660 ICS B
	require "user_header.php";
?>


	<main>

		<?php

		
		if(isset($_SESSION['userId'])){ ?>

			
		
			<!DOCTYPE html>
			<html>
			<head>
			
			<!--Bootstrap-->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
			
			<!--CSS style sheet-->
			<link rel="stylesheet" href="style.css">
			<!--<style >
			.centre{
				display: block;
 				margin-left: auto;
  				margin-right: auto;
  				width: 250px;
  				height:260px;
			}	

			</style>-->

			</head>
			<body>
			
				<button style="float: right;width 70px;" name="submit"><a href="edit_user.php?GetID=<?php echo $_SESSION['userId'] ?>">Edit</a></button>
			

			<?php 

			
				$servername = "localhost";
				$dBUsername="root";
				$dBPassword="";
				$dBName="app";

				$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

				if(!$conn){

					die("Connection failed: ".mysqli_connect_error());
				}
			$sql = "SELECT * FROM app_users where idUsers='$_SESSION[userId]' ";
			$result = mysqli_query($conn,$sql);
			?>
			<h1 style ="text-align: center;">My Profile</h1>

			<?php

			$row = mysqli_fetch_assoc($result);
			?>
			<div class="profile-card">
		<div class="image-container">
			<img src="<?php echo $row['profile_pic']; ?>" style="width:100%">
			<div class="title">
				<h2><?php echo $row['uidUsers']; ?></h2>
			</div>
        </div>
		<div class="main-container">
			
			<p><b>User ID:</b> <?php echo $row['idUsers']; ?> </p>
			<p><b>Username:</b>  <?php echo $row['uidUsers']; ?></p>
			<p><b>Email:</b> <?php echo $row['emailUsers']; ?></p>
			<p><b>City of residence:</b>  <?php echo $row['city_residence']; ?> </p>
			<p><b>User type:</b> <?php echo $row['User_type']; ?></p>
		</div>
	</div>

	

	<?php 
		}
		?>
		
		
	<br> <br> <br>
	</main>

