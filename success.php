<html>
<head>
	<title>Sign UP</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body {
			font-family: 'Indie Flower', cursive;
			font-weight: bold;
		}
		.head {
			display: block;
			text-align: center;
			font-size: 4rem;
		    padding: 5% 0;
		}
		.welcome {
			display: block;
			text-align: center;
			font-size: 2.5rem;
		    padding: 40px 0;
		}
		.btn {
			font-family: 'Indie Flower', cursive;
			font-weight: bold;
			text-align: center;
			width: 250px;
			height: 70px;
			margin: 0 calc(50% - 125px);
			font-size: 2.5rem;
		    letter-spacing: 1.5px;
		    color: #fff;
			border: none;
		    border-radius: 2px;
		    box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.3);
		    outline: none;
		    background-color: #f3989b;
		}
		.btn:hover {
			background-color: #f5a5a8;
			box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.5);
			transition: 0.5s;
		}

	</style>
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<div class="main">
		<span class="head">Sign up successfully !!</span>
		<span class="welcome">Welcome to Freaking Math</span>
		<button class="btn" onclick="location.href='login.php'">Login</button>
	</div>
</body>
</html>