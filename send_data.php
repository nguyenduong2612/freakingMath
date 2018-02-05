<?php
	include('config.php');
	session_start();
	if(isset($_POST['data'])) {
		$user_check = $_SESSION['login_user'];
		$data = $_POST['data'];
		$obj = json_decode($data);
		$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
	   	$ses_sql = mysqli_query($conn,"UPDATE user SET highscore = '$obj->highscore' WHERE username = '$user_check' ");
	}
?>