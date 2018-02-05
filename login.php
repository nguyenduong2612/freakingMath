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
        echo "<span class = 'loginfail'>Your Login Name or Password is invalid<br>";
    }
}
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body>
	<div class="main">
		<span class="head">Login Freaking Math</span>
		<div class="login">
			<form action = "" method = "post">
				<label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
				<label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
				<input type = "submit" value = " Submit " class="submit" /><br />
			</form>
		</div>
	</div>
</body>
</html>
