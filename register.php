<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$newusername = $_POST['username'];
	$newpassword = $_POST['password'];
	$repassword = $_POST['repassword'];

	if ($newpassword != $repassword) {
		echo "<span class='fail'>Retype password error</span>";
	} else {
		$sql = "INSERT INTO user (username, password, highscore) VALUES ('$newusername', '$newpassword', '0')";
		$result = mysqli_query($conn ,$sql);
		if ($result) {
			header("Location: success.php");
		} else $conn->error;
	}
}
?>

<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
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