<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';

	pass_check_exit(3);

	$data = $_POST['header'];
	$lang = $_POST['lang'];
	if($data != '' ) {
		if(mysqli_query($link, 'UPDATE `rusification` SET `content` = "'.$data.'" WHERE name LIKE "about_site" and lang LIKE "'.$lang.'"')) {
			echo '"заголовок" изменено успешно. ';
		}	else {
			echo 'Вероятно, нет подключения к ДБ. ';
		}
	} else {
		echo 'Строка пуста';
	}