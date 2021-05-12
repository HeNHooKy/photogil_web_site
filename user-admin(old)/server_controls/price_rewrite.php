<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';
	if(!password_check($_COOKIE['login'], $_COOKIE['password'])) {
    	die('<b> Вы не имеете права находится на этой странице. </b> <meta http-equiv="refresh" content="0.5; url=../../authentication.php">');
  	}

  	if(mysqli_query($link, 'UPDATE `Price` SET `value` = "'.$_POST['value'].'" WHERE name LIKE "'.$_POST['name'].'" AND `number` = '.$_POST['number'])) {
  		echo 'Редактирование завершено.';
  	}

?>