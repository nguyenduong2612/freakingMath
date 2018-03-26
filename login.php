<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];

	$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($conn ,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count == 1) {
		$_SESSION['login_user'] = $myusername;
        header("location: index.php");
   	} else {
        echo "<span class = 'loginfail'>Your Username or Password is invalid</span>";
    }
}
?>

<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="loading">
		<span class="intro">FREAKING MATH</span>
		<span class="credit">Group 22 's project</span>
	</div>
	<div class="main">
		<img src="sub_right_chara4.png" width="260" height="369">
		<span class="head">FREAKING MATH</span>
		<div class="login">
			<form action = "" method = "post">
				<label>Username  :</label><input type = "text" name = "username" class = "box" size="25"><br><br>
				<label>Password  :</label><input type = "password" name = "password" class = "box" size="25"><br><br>
				<input type = "submit" value = " Sign in " class="submit	"><br>
			</form>
			<span class="signup">New player? Sign up <a href="register.php">here</a></span>		
		</div>
	</div>

	<script>
		$(".loading").delay(2500).fadeOut(1000);
		$(".login").hide();
		$(".login").delay(3000).fadeIn(1500);
	</script>
</body>
</html>
