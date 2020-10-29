<?php

session_start();
session_unset();
session_destroy();

if(isset($_COOKIE['mailuid'])){

	$email = $_COOKIE['mailuid'];

	setcookie('username',$mailuid,time() -1);
}

header("Location:../index.php");