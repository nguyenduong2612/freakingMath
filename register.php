<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$newusername = $_POST['username'];
	$newpassword = $_POST['password'];
	$repassword = $_POST['repassword'];
	$lenuser = strlen($_POST['username']);
	$lenpass = strlen($_POST['password']);

	if (($lenuser == 0) || ($lenpass == 0))
		echo "<span class='fail'>Please input your username and password</span>";
	else if ($newpassword != $repassword)
		echo "<span class='fail'>Retype password error</span>";
	else {
		$sql = "INSERT INTO user (username, password, highscore) VALUES ('$newusername', '$newpassword', '0')";
		$result = mysqli_query($conn ,$sql);
		if ($result) {
			header("Location: success.php");
		} else 
			$conn->error;
	}
}

?>

<html>
<head>
	<title>Sign Up</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<img src="sub_right_chara5.png" width="260" height="369">
	<div class="main">
		<span class="fail"><?php echo $conn->error; ?></span>
		<span class="head">Sign up</span>
		<div class="login">
			<form action = "" method = "post">
				<label>Username  :</label><input type = "text" name = "username" class = "box" size="25"><br><br>
				<label>Password  :</label><input type = "password" name = "password" class = "box" size="25"><br><br>
				<label>Retype Password  :</label><input type = "password" name = "repassword" class = "box" size="25"><br><br>
				<input type = "submit" value = " Submit " class="submit	"><br>
			</form>		
		</div>
	</div>

</body>
</html>