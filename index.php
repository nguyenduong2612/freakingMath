<?php
	session_start();
 	if(!isset($_SESSION['login_user'])){
      	header("location:login.php");
   	}
?>
<html>
<head>
	<title>Freaking Math</title>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
	<div class="timeBar">
		<div id="time"></div>
	</div>

	<button class="pinkbtn start">START</button>
	<button class="pinkbtn logout" onclick="location.href='logout.php'">LOGOUT</button>
	<div class="main">
		<span class="name">FREAKING MATH</span><br>
		Welcome <span id="username"></span><br>
		Your high score: <span id="hs"></span><br>
	</div>	
	<br>
	<button class="greenbtn true">TRUE</button>
	<button class="greenbtn false">FALSE</button>

	<script>
		$.getJSON("session.php", function(user){
			$('#username').text(user.name);
			$('#hs').text(user.score);

    		var rdNum1;
			var rdNum2;
			var rdEqual;
			var point = 0;
			var highScore = user.score;
			var width = 99;
			var elem = document.getElementById("time");
			var setTime;

			function timeRunning() {
				elem.style.width = 100 + '%';
				width = 99;	
				id = setInterval(frame, setTime/100);
				function frame() {
					if (width == 0) {
	      				clearInterval(id);
	      			} else {
	      				width--;
	      				elem.style.width = width + '%';
	      			}
	      		}
			}
			function gameOver() {
				$('.greenbtn').hide();
				$('.pinkbtn').show();
				$('.timeBar').hide();
				if (point >= highScore) highScore = point;	
				$('.main').html('GAME OVER<br>Point: ' + point + '<br>Highscore: ' + highScore);
				clearTimeout(timeOut);
				clearInterval(id);
				$('.start').text('RESTART');
				point = 0;
				//send data to database
				var data = {
					"highscore": highScore
				}
				var dataString = JSON.stringify(data);
				console.log(dataString);
				$.ajax({
					type: 'POST',
					url: 'send_data.php',
					data: {'data': dataString}
				})
			}
			function hardMode() {
				setTime = 1200; //ms
				$('#time').css('background-color', '#ff0000cc');
				rdNum1 = Math.floor((Math.random()*25) + 11); 
				rdNum2 = Math.floor((Math.random()*25) + 11); 
				rdEqual = Math.floor(Math.random()*4) - Math.floor(Math.random()*4) + rdNum1 + rdNum2;
			}
			function normalMode() {
				setTime = 1600; //ms
				rdNum1 = Math.floor((Math.random()*15) + 5); 
				rdNum2 = Math.floor((Math.random()*15) + 5); 
				rdEqual = Math.floor(Math.random()*3) - Math.floor(Math.random()*3) + rdNum1 + rdNum2;
			}
			function easyMode() {
				rdNum1 = Math.floor((Math.random()*5) + 1); 
				rdNum2 = Math.floor((Math.random()*5) + 1); 
				rdEqual = Math.floor(Math.random()*2) - Math.floor(Math.random()*2) + rdNum1 + rdNum2;
			}
			function reMake() {
				if (point > 10) {
					hardMode();
				}
				else if (point > 5 ) {
					normalMode();
				} 
				else {
					easyMode();
				}
				$('.num1').text(rdNum1);
				$('.num2').text(rdNum2);
				$('.equal').text(rdEqual);
				timeOut = setTimeout(gameOver, setTime);
			}
			function getPoint() {
				point++;
				$('.point').text(point);
				clearTimeout(timeOut);
				clearInterval(id);
				reMake();
				timeRunning();
			}
			function changeBgn() {
				var color = '#';
				var hexCode = ['CCB8D1', 'B2E3E8', 'F5B3B4', 'CCA772', 'D94330', 'FADDAF', 'EB712F', 'FFB6C1', '97FFFF', 'AB82FF'];
				color += hexCode[Math.floor(Math.random() * hexCode.length)];
				$('body').animate({ backgroundColor: color}, 500);
			}

			//main

			$('.greenbtn').hide();
			$('.timeBar').hide();
			
			$('.start').click(function(){
				setTime = 2000; //ms
				changeBgn();
				$('.greenbtn').show();
				$('.pinkbtn').hide();
				$('.timeBar').show();
				$('#time').css('background-color', '#4CAF50');
				$('.start').text('START');
				$('.main').html('Point: <span class="point">0</span><br><span class="num1">NaN</span> + <span class="num2">NaN</span> = <span class="equal">NaN</span>');
				reMake();
				timeRunning();
			});

			$('.true').click(function(){
				changeBgn();
				if (rdEqual == rdNum1 + rdNum2) {
					getPoint();
				}
				else {
					gameOver();	
				}
			});

			$('.false').click(function(){
				changeBgn();
				if (rdEqual != rdNum1 + rdNum2) {
					getPoint();
				}
				else {
					gameOver();
				}
			});
		});

	</script>
</body>

</html>