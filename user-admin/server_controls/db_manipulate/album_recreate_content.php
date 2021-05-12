<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';
	require_once '../function.php';

	pass_check_exit(3);
	$db_name = $_POST['name'];
	$name = $_POST['am_name']; 				 	   	//имя на русском
	$name_eng = $_POST['am_name']; 			   	   	//имя на анг
	$description_ru = $_POST['am_ru_description']; 	//описание рус
	$description_en = $_POST['am_en_description']; 	//описание eng

	$msg = '';

	if($name != '') {
		if(!mysqli_query($link, 'UPDATE `all_albums` SET `real_name` = "'.$name.'" WHERE `name` LIKE "'.$db_name.'"')) {
			$msg .= '|| имя не обновлено! ';
		}
	}

	if($name_eng != '') {
		if(!mysqli_query($link, 'UPDATE `all_albums` SET `real_name_eng` = "'.$name_eng.'" WHERE `name` LIKE "'.$db_name.'"')) {
			$msg .= '|| имя(анг.) не обновлено! ';
		}
	}

	if($description_ru != '') {
		if(!mysqli_query($link, 'UPDATE `all_albums` SET `description` = "'.$description_ru.'" WHERE `name` LIKE "'.$db_name.'"')) {
			$msg .= '|| описание не обновлено! ';
		}
	}

	if($description_en != '') {
		if(!mysqli_query($link, 'UPDATE `all_albums` SET `description_eng` = "'.$description_en.'" WHERE `name` LIKE "'.$db_name.'"')) {
			$msg .= '|| описание(анг.) не обновлено! ';
		}
	}

	if($msg == '') {
		echo 'Ошибок в процессе изменения не возникло.';
	} else {
		echo $msg;
	}
	