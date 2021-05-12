<?php
 $to_token = '387203014:AAFmusW41gFVoJ4cFfw4in0Vkf19geCsWww';
 $to_id_bot = "-307071488";

 $subject = 'У вас новое письмо с сайта photoGil';

 $lang = $_POST["lang"];

 $user_name = trim($_POST["name"]);

 $user_phone = trim($_POST["tel_number"]);

 $user_mail = trim($_POST["email"]);

 $user_content = $_POST["content"];

 if($user_name == '' || $user_phone == '' || $user_mail == '' || $user_content == '') {
 	echo'Ошибка: не все данные введены';
 	die();
 }
	 $text = "<b>{$subject} </b> %0A";
	 $text .= "{$user_content} %0A";
	 $text .= "С уважением, {$user_name}. %0A тел: <i>{$user_phone}; </i> email: <i> {$user_mail}.</i>";

	 $sendToTelegram = fopen("https://api.telegram.org/bot{$to_token}/sendMessage?chat_id={$to_id_bot}&parse_mode=html&text={$text}","r");

	 if($sendToTelegram) {
	 	if($lang == 'ru') {
	 		echo 'Я скоро вам перезвоню!';
	 	}
	 	if($lang == 'en') {
	 		echo 'I call you soon!';
	 	}
	 	
	 }
