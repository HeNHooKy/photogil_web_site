<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';

	pass_check_exit(2);

	function generateName() {
		$unique_random_string = md5(uniqid(mt_rand(), true));
		$base64_string = base64_encode($unique_random_string);
		$modified_base64_string = str_replace('+', '.', $base64_string);
		$salt = substr($modified_base64_string, 0, 22);
		return $salt;
	}

	$photo_width = 2880; //Изменение размера фото
	$photo_height = 1800;

	$count = count($_FILES['userfile']['name']);

	$sql = $_POST['sql'];

	$errs = '';

	$none_errs = true;

	if($sql == '' || $count == 0) {
		die('Недостаточно параметров. ');
	}

	for($i = 0;$i < $count; $i++) {
		$format = basename($_FILES['userfile']['type'][$i]);
		if($format == 'jpeg') {
			$format = 'jpg';
		}

		$new_name = generateName();
		$new_name_type = $new_name.'.'.$format;
		

		if(photo_resizer($_FILES['userfile']['tmp_name'][$i], $_FILES['userfile']['type'][$i], $photo_width, $photo_height,'../../photos/'.$new_name_type)) { 

			if(!mysqli_query($link, 'INSERT INTO `'.$sql.'` (`link`, `title`) VALUES ("photos/'.$new_name_type.'", "'.$new_name.'")')) {
				$errs .= 'файл: '.$_FILES['userfile']['name'].' выдал ошибку.    ';
				$none_errs = false;
			} 
		} else {
			$errs .= 'Файл: '.$_FILES['userfile']['name'].' имеет слишком низкое разрешение!';   
		}
	}

	if(!$none_errs) {
		echo $errs;
	} else {
		echo 'Передача завершена. Было передано: '.$count.' изображений. ';
	}
	
