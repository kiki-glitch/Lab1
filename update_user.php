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

	if(isset($_POST['update'])){

 		$User_ID= $_GET["ID"];
		$Username= $_POST["uid"];
		$Email= $_POST["mail"];
		$pwd=  $_POST["pwd"];

	//if(empty($Username) || empty($Email ) || empty($pwd)){

	//	header("Location:edit_user.php?error=emptyfields&uid=".$Username. "&mail=".$Email);
	//	exit();
	//}
	//elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$Username) ){

//		header("Location:edit_user.php?error=invalidmailuid=");
//	exit();
//	}
	
//	elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		
//	header("Location:edit_user.php?error=invalidmail&uid=".$Username);
//	exit();

//	}
	//elseif (!preg_match("/^[a-zA-Z0-9]*$/",$Username)) {
		
	//header("Location:edit_user.php?error=invaliduid&mail=".$Email);
	//exit();
	//}

	//elseif ($pwd !== $pwdRepeat) {
		
	//	header("Location:edit_user.php?error=passwordcheck&uid=".$Username. "&mail=".$Email);
	//m	exit();
	//}
	
		$query = "update users set uidUsers ='".$Username."', emailUsers='".$Email."', pwdUsers = '".$pwd."' where idUsers='".$User_ID."'";


	
		$result =mysqli_query($conn,$query);

		if($result){

		header("location:user.php");

		}else{
		echo 'Please Check Your Query'; 
		}
	}
	else{

		header("location:user.php");
	}
?>