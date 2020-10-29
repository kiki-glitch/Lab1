<?php

if(isset($_POST['signup-submit'])){

	require 'db_sign_up.php';

	$username =$_POST ['uid'];
	$email = $_POST['mail'];
	$residence = $_POST['city'];
	$profile = $_POST['pic'];
	$password=$_POST['pwd'];
	$passwordRepeat =$_POST['pwd-repeat'];
	$User_type = $_POST['user_type'];

	if(empty($username) || empty($email ) || empty($residence)||empty($profile)||empty($password) || empty($passwordRepeat) || empty($User_type)){

		header("Location:../signup.php?error=emptyfields&uid=".$username. "&mail=".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username) ){

		header("Location:../signup.php?error=invalidmailuid=");
	exit();

	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
	header("Location:../signup.php?error=invalidmail&uid=".$username);
	exit();

	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		
	header("Location:../signup.php?error=invaliduid&mail=".$email);
	exit();
	}

	elseif ($password !== $passwordRepeat) {
		
		header("Location:../signup.php?error=passwordcheck&uid=".$username. "&mail=".$email);
		exit();
	}
	else {

		$sql ="SELECT uidUsers FROM app_users where uidUsers=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)){

			header("Location:../signup.php?error=sqlerror");
				exit();

		}
		else{

			 mysqli_stmt_bind_param($stmt,"s", $username);
			 mysqli_stmt_execute($stmt);
			 mysqli_stmt_store_result($stmt);
			 $resultCheck = mysqli_stmt_num_rows($stmt);
			 if ($resultCheck > 0 ) {
			 	
			 	header("Location: ../signup.php?error=usertaken&mail=".$email);

			 	exit();
			 }
	    else{

			$sql = "INSERT INTO app_users (uidUsers,emailUsers,city_residence,profile_pic,pwdUsers,User_type) VALUES(?,?,?,?,?,?)";
			$stmt =mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)){

				header("Location:../signup.php?error=sqlerror2");

			}
			else{

				$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
				 mysqli_stmt_bind_param($stmt,"ssssss", $username,$email,$residence,$profile, $hashedPwd,$User_type);
				 mysqli_stmt_execute($stmt);
				 mysqli_stmt_store_result($stmt);
				 header("Location:../signup.php?signup=success");
				 exit();
			}

	    }


		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	 header("Location:../signup.php");
	 exit();
}