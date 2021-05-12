<?php
	function sendReview() {
		setcookie('isSendReview', true, time() + 1, '/', 'photodaria.com'); //Я тоже привязан к домену
			//Привязываем к куки
	}

	if(isset($_GET['send']) && $_GET['send'] == 'request') {
		returnIsSend();
	}

	function returnIsSend() {
		if($_COOKIE['isSendReview'] == true) {
			echo 'Today you already send review!';
		}
	}


	
