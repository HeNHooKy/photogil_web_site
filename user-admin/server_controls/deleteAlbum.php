<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';

	pass_check_exit(2);
	

	$wed = $_POST['wed'];
	$pin = $_POST['pin'];

	if(!pin_check($_COOKIE['login'], $pin)) {
		die('Неверный пин-код.');
	}

	$photo = mysqli_fetch_assoc(mysqli_query($link, 'SELECT link FROM `all_albums` WHERE name LIKE "'.$wed.'"'));
	$ssilka = $photo['link'];

	$query = mysqli_query($link, 'SELECT `link` FROM `'.$wed.'`');
	while($foto_link = mysqli_fetch_assoc($query)) {
		unlink('../../'.$foto_link['link']);
	}
	
	if(mysqli_query($link, 'DELETE FROM `all_albums` WHERE name LIKE "'.$wed.'"')) {
		if(mysqli_query($link, 'DROP TABLE `'.$wed.'`')) {
			if(file_exists('../../'.$ssilka)) {
				unlink('../../'.$ssilka);
				echo 'Альбом удален. Полностью... Навсегда.';
			} else {
				echo 'Альбом удален. Полностью... Навсегда.';
			}
		} else {
			echo 'Альбом был удален не полностью.';
		}
	} else {
		echo 'Альбом не был удален.';
	}
	

	
		
	
