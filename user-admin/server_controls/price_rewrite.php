<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';
	pass_check_exit(2);
	$value = $_POST['value'];
	$name = $_POST['name'];
	$number = $_POST['number'];
	$lang = $_POST['lang'];


	if(trim($_POST['value']) != '') { //Последняя проверка
	  	if(mysqli_query($link, 'UPDATE `Price` SET `value` = "'.$value.'" WHERE name LIKE "'.$name.'" AND `number` = '.$number.' AND `lang` LIKE "'.$lang.'"')) {
	  		echo 'Редактирование завершено.';
	  	}
	} else {
		echo 'Отменено на стороне сервера';
	}
?>