<?php

	function updatePhoto($database, $dataname, $backpath, $photo_number=false, $number_choise=false) {

		global $link;

		$path_back = '';

		for ($i = 0; $i<$backpath; $i++) {
			$path_back .= '../';
		}

		$format = basename($_FILES['img']['type']);

		if(!$photo_number) {
			$old_file = mysqli_fetch_assoc(mysqli_query($link, 'SELECT link FROM '.$database.' WHERE name LIKE "'.$dataname.'"'));
		} else {
			$old_file = mysqli_fetch_assoc(mysqli_query($link, 'SELECT link FROM '.$database.' WHERE name LIKE "'.$dataname.'" and `'.$number_choise.'` = '.$photo_number));
		}

		

		if($_FILES['img']['tmp_name'] == '') {
			die('Файл не найден. ');
		}

		if($format == 'jpeg') { //format a->format b
			$format = 'jpg';	
		}

		if($format == 'png' || $format == 'jpg' || $format == 'gif') {
		if(unlink($path_back.$old_file['link'])) {
			if(move_uploaded_file($_FILES['img']['tmp_name'], $path_back.$old_file['link'])) {
					echo 'Фото загружено и заменено. ';
			}	else {
				echo 'Ошибка. Старое фото удалено.';
			} 
		} else {
			if(move_uploaded_file($_FILES['img']['tmp_name'], $path_back.$old_file['link'])) {
				echo 'Фото загружено и заменено. Старое фото не удалено.';
			}	else {
				echo 'Ошибка.';
			} 
		}

		} else {
			die('Формат не поддерживается. ');
		}

	}

	function photoLoad_connect($database, $search_operator, $dataname, $backpath, $randomize) {

		global $link;

		$path_back = '';

		if(!$backpath) {
			$backpath = 0;
		}

		for ($i = 0; $i<$backpath; $i++) {
			$path_back .= '../';
		}

		if($_FILES['img']['tmp_name'] == '') {
			die('Файл не найден <br />');
		}

		$new_name = basename($_FILES['img']['name']);

		if($randomize) {

			$unique_random_string = md5(uniqid(mt_rand(), true));

			$base64_string = base64_encode($unique_random_string);

			$modified_base64_string = str_replace('+', '.', $base64_string);

			$new_name = substr($modified_base64_string, 0, 22);

		}

		$format = basename($_FILES['img']['type']);

		if($format == 'jpeg') { 
			$format = 'jpg';	
		}

		$file_path = 'photos/'.$new_name;

		if($old_photo = mysqli_fetch_assoc(mysqli_query($link, 'SELECT `link` FROM `'.$database.'` WHERE '.$search_operator.' LIKE "'.$dataname.'"'))) {

			if($old_photo != 'Array') {
				unlink($path_back.$old_photo);
			} else {
				echo 'Первая установка фотографии. ';
			}
		} else {
			echo 'Первая установка фотографии. ';
		}

		if($format == 'png' || $format == 'jpg' || $format == 'gif') {
			
			if(move_uploaded_file($_FILES['img']['tmp_name'], $path_back.$file_path)) {

				if(mysqli_query($link, 'UPDATE `'.$database.'` SET `link`="'.$file_path.'" WHERE `'.$search_operator.'` LIKE "'.$dataname.'"')) {
					echo ' Успешно.';
				} else {
					echo 'Не удалось прикрепить фото к альбому. ';
				}
				
			} else {
				echo '';
			}

		} else {
			die('Формат не поддерживается. ');
		}
	}


