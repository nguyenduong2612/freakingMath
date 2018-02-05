<?php
	include('config.php');
	session_start();

/*	$user_check = $_SESSION['login_user'];
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	$highscore =  $_POST['highscore'];
	echo $highscore;*/
   /*	$ses_sql = mysqli_query($conn,"UPDATE user SET highscore = '".$mysqli->real_escape_string($_POST['highscore'])."' WHERE username = '$user_check' ");*/
	if(session_destroy()) {
    	header("Location: login.php");
   	}
?>