<?php
	include("config.php");
	session_start();
	$sql = "SELECT * FROM user ORDER BY user.highscore DESC";
	$result = mysqli_query($conn ,$sql);
?>

<html>
<head>
	<title>Ranking</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="ranking.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="main">
		<p class="title">Scoreboard</p>
		<div class="thead">
			<span>Username</span>
			<span>Score</span>
			<br style="clear: both;" />
		</div>
		<div class="tbody">
			<?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
				<span><?php echo $row['username']; ?></span>
				<span><?php echo $row['highscore']; ?></span>
				<br>
			<?php endwhile; ?>
			<br style="clear: both;" />
		</div>
		<button class="pinkbtn back" onclick="location.href='index.php'">Back</button>
	</div>

</body>
</html>