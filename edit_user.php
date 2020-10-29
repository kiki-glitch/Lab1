<?php

	//ALEX KARIUKI 121660 ICS B
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "loginsystem";

	
	//Create Connection
	$conn = mysqli_connect($servername,$username, $password,$database);

	if(mysqli_connect_error()){

   die("Connection failed: ". mysqli_connect_error());
    }


	//$User_ID =(isset($_GET['ID']) ? $_GET['ID'] : '');
	$User_ID =$_GET['GetID'];
	$query = "select * from users where idUsers = '".$User_ID."'";
	$result = mysqli_query($conn,$query);

	while($row = $result -> fetch_assoc())
	{
		$User_id= $row["idUsers"];
		$Username= $row["uidUsers"];
		$Email= $row["emailUsers"];
		$pwd=  $row["pwdUsers"];

 	}
?>


<!DOCTYPE html>
<html>
<head>

<title>View Food Updates</title>
<link rel="stylesheet" type="text/css" href="admin.css">

</head>
<body>

<h1>Update Foood</h1>

<h2>Food details</h2>
	<?php 

	//	if(isset($_GET['error'])){

	//		if($_GET['error'] == "emptyfields"){

	//			echo '<p>Fill in all fields!</p>';
	//		}
	//		elseif($_GET['error'] == "invaliduidmail"){

//				echo '<p>Invalid username and e-mail!</p>';
	//		}
	//		elseif($_GET['error'] == "invaliduid"){

	//			echo '<p>Invalid username!</p>';
	//		}
	//		elseif($_GET['error'] == "invalidmail"){

	//			echo '<p>Invalid e-mail!</p>';
	//		}
	//	}
?>
 <form  style="max -width-500px" action="update_user.php?ID=<?php echo $User_id ?> "  method="POST">
			<input type="text" name="uid" placeholder="Username" value="<?php echo $Username ?>"><br><br>
			<input type="text" name="mail" placeholder="E-mail" value="<?php echo $Email ?>"><br><br>
			<input type="password" name="pwd" placeholder="Password" value="<?php echo $pwd ?>"><br><br>
			<input type="password" name="pwdRepeat" placeholder="Repeat Password" value="<?php echo $pwd ?>"><br><br>
			<button type="submit" name="update" value="Update">Update</button>
     
	</form>
</body>
</html>
