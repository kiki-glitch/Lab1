<?php

if(isset($_POST['login-submit'])){

	require 'db_sign_up.php';

	$mailuid = $_POST ['mailuid'];
	$password = $_POST ['pwd'];
	

	if (empty($mailuid) || empty($password) ) {
		
		header("Location: ..?index.php?error=emptyfields");
		exit();
	}
	else{

		$sql = "SELECT * FROM app_users WHERE uidUsers=?  or emailUsers = ?;";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt,$sql)) {
			
			header("Location:../index.php?error=sqlerror");
			exit();

		}
		else{

			mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password,$row['pwdUsers']);
				if($pwdCheck == false){

					header("Location:../index.php?error=wrongpwd");
					exit();

				}
				elseif ($pwdCheck == true ){

					if(isset($_POST['remember'])){
						setcookie('username',$mailuid,time()+3600);

					}else{

					}

					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];
					if($row['User_type'] == Admin){

						header("Location:../admin.php?login=success");
						exit();
					}elseif ($row['User_type'] == User) {
						header("Location:../user.php?login=success");
						exit();
					}

					
				}
				else{

					header("Location:../index.php?error=wrongpwd");
					exit();

				}
			}
			else{

				header("Location:../index.php?error=nouser");
				exit();
			}


		}


	}
}
else{

	header("Location:../index.php");
}