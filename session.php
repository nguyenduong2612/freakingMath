<?php
   	include('config.php');
   	session_start();
   
   	class func {
    	function func() {
    		$user_check = $_SESSION['login_user'];
    		$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

   			$ses_sql = mysqli_query($conn,"SELECT * FROM user WHERE username = '$user_check' ");
    		$row = mysqli_fetch_array($ses_sql, MYSQLI_BOTH);
        	$this->name =  $row['username'];
        	$this->pass = $row['password'];
        	$this->score = $row['highscore'] + 0;
   		}
	}
	$user = new func();
	$userJSON = json_encode($user);

	echo $userJSON;
?>