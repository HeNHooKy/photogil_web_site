<!DOCTYPE html>
<html>
<head>
	<title>Oops. Page not found.</title>
	<link rel="shortcut icon" href="photos/favicon.png" type="image/png">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="source/styles/fonts.css">
	<style type="text/css">

		body {
			margin: 0;
			background-color: #fff;
			overflow: hidden;
		}

		.row {
			float: left;
		}

		.row-1-2 {
			width: 30%;
			min-height: 2000px;
			max-height: 10000px;
			background-color: #F6AB40;
		}

		.row-2-2 {
			width: 70%;

		}

		.scale-1-2 {
			width: 60%;
			margin: 30% 20%;

		}

		.christos {
			position: relative;
			width: 50px;
			height: 50px;
			margin: 0 auto;
		}

		.christ {
			position: absolute;
			width: 6px;
			height: 50px;
			background-color: #fff;
			top: 0;
			left: 0;
		}

		.rotateA {
			transform: rotate(45deg);
			left: 22px;
		}

		.rotateB {
			width: 50px;
			height: 6px;
			transform: rotate(45deg);
			top: 22px;
		}

		button {
			display: inline-block;
			width: 60%;
			margin-left: 20%;
			background: linear-gradient(to top, #EE8B3F , #F8C20C 180%);
			border: none;
			border-radius: 10px;
			font-size: 26px;
			color: #fff;
			cursor: pointer;

		}

		h1 {
			text-align: center;
			font-size: 700%;
			margin: 5% 0 0 0;
			line-height: 100%;
			color: #fff;
			font-weight: 500;
		}

		h2 {
			text-align: center;
			margin-bottom: 50%;
			color: #fff;
			font-size: 3em;
			font-weight: 100;
		}
		.bird {
			float: right;
			margin-top: 5vh;
		}

		.birdHead {
			width: 60%;
			min-width: 478px;
			margin: 15% auto;

		}
		h3 {
			display: inline-block;
			margin: 0;
			font-size: 100%;
			font-weight: 300;
			color: #fff;
		}
		h5 {
			color: #004C57;
			font-size: 2em;
		}

		

	</style>
</head>
<body>
	<section class="row row-1-2">
		<div class="scale-1-2">
			<div class="christos">
				<div class="christ rotateA"></div>
				<div class="christ rotateB"></div>
			</div>
			
			<h1>404</h1>
			<h2>ERROR</h2>
			<button onclick="gobutTo()"> <?php require_once 'source/mini_svg/mini_home.php'; ?><!--Расположить домик--> <h3> Home </h3></button>
		</div>
	</section>
	<section class="row row-2-2">
		<div class="birdHead">
			<h5>Sorry, the page not found</h5>
			<?php require_once 'source/mini_svg/bird.php'; ?>
		</div>
	</section>
</body>
</html>
<script type="text/javascript" src="source/plugins/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		if($('button').width() < 120) {
			$('h3').hide();
		} 	else {
			$('h3').show();
		}
		var cssBirdHead = $('.birdHead').css('margin');
		if($('.row-2-2').width() <700) {
			$('.birdHead').css('margin','0');
		} else {
			$('.birdHead').css('margin', cssBirdHead);
		}
		$(window).on('resize', function() {
			if($('button').width() < 120) {
				$('h3').hide();
			} 	else {
				$('h3').show();
			}
			if($('.row-2-2').width() <700) {
				$('.birdHead').css('margin','0');
			} else {
				$('.birdHead').css('margin', cssBirdHead);
			}

		});
	});	

	function gobutTo() {
		location.href = <?php 
					 	$url = explode('.', $_SERVER['SERVER_NAME']);
						$lang = $url[0];
						if($lang == 'ru') {
							echo '"http://ru.photodaria.com";';
						} elseif($lang == 'en') {
							echo '"http://en.photodaria.com";';
						}
					?>
	}
</script>

