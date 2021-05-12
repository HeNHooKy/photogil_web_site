<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';

	pass_check_exit(3);

	$data = $_POST['new_info_about_me'];
	$lang = $_POST['lang'];

	if(mysqli_query($link, 'UPDATE `rusification` SET `content` = "'.$data.'" WHERE name LIKE "about_me" and lang LIKE "'.$lang.'"')) {
		echo '"обо мне" изменено успешно. ';
	}	else {
		echo 'Вероятно, нет подключения к ДБ. ';
	}
	