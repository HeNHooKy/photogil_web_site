<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';

	pass_check_exit(3);

	$mw = $_POST['mywed'];
	$im = $_POST['instagram'];
	$fb = $_POST['facebook'];
	$vk = $_POST['vk'];
	$city = $_POST['city'];
	$number = $_POST['phone_number'];

	$non_errors = true;

	$errors = '';

	if($mw != '') {
		if(!mysqli_query($link, 'UPDATE `social_net` SET `link` = "'.$mw.'" WHERE name LIKE "mywed"')) {
			$errors .= '"myWed" не был обнавлен';
			$non_errors = false;
		}
	}

	if($im != '') {
		if(!mysqli_query($link, 'UPDATE `social_net` SET `link` = "'.$im.'" WHERE name LIKE "instagram"')) {
			$errors .= '"instagram" не был обнавлен';
			$non_errors = false;
		}
	}

	if($fb != '') {
		if(!mysqli_query($link, 'UPDATE `social_net` SET `link` = "'.$fb.'" WHERE name LIKE "facebook"')) {
			$errors .= '"facebook" не был обнавлен';
			$non_errors = false;
		}
	}

	if($vk != '') {
		if(!mysqli_query($link, 'UPDATE `social_net` SET `link` = "'.$vk.'" WHERE name LIKE "vk"')) {
			$errors .= '"vk" не был обнавлен';
			$non_errors = false;
		}
	}

	if($city != '') {
		if(!mysqli_query($link, 'UPDATE `social_net` SET `link` = "'.$city.'" WHERE name LIKE "city"')) {
			$errors .= '"city" не был обнавлен';
			$non_errors = false;
		}
	}

	if($number != '') {
		if(!mysqli_query($link, 'UPDATE `social_net` SET `link` = "'.$number.'" WHERE name LIKE "phone_number"')) {
			$errors .= '"phone_number" не был обнавлен';
			$non_errors = false;
		}
	}

	if(!$non_errors) {
		echo $errors;
	} else {
		echo 'Все поля обновлены. ';
	}
	