<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';
	require_once '../function.php';

	pass_check_exit(3);

	$album = $_POST['album_rad']; //выбор
	$name = $_POST['album_name']; //имя на русском
	$real_name = $_POST['album_real_name']; //имя на анг
	$name_eng = $_POST['album_name_eng']; //Полное имя на анг
	$description = $_POST['description']; //описание write

	$msg = '';

	//Создать новую таблицу
	if(mysqli_query($link, "CREATE TABLE `photogil_bd`.`".$real_name."` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `link` TEXT NOT NULL , `title` VARCHAR(256) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;")) {
		mysqli_query($link, "ALTER TABLE `".$real_name."` ORDER BY `id`;");

		//Добавить новую таблицу в список таблиц альбомов
		if(!mysqli_query($link, "INSERT INTO `all_albums` (`name`, `real_name`, `real_name_eng`, `description`, `category`) VALUES ('".$real_name."','".$name."', '".$name_eng."', '".$description."', '".$album."') ")) {
			$msg .= 'Не удалось добавить описательные данные '; //В случае ошибки удаляем созданную ранее таблицу
			if(mysqli_query($link, "DROP TABLE `".$real_name."`")) { //Удалить ранее загруженный файл, увы неудастся.
				$msg.='Таблица удалена';
			}
		} 

	} else {
		$msg .= 'Не удалось создать новую таблицу ';
	}

	// } else {
	// 	//редактировать существующую таблицу
	// 	//поменять название таблицы
	// 	//изменить поле с названием таблицы в списке таблиц альбомов + загрузить остальное
	// 	if(mysqli_query($link, 'UPDATE `all_albums` SET `album` = "'.$real_name.'", `real_name` = "'.$name.'", `write` = "'.$description.'" WHERE album LIKE "'.$album.'"')) {
	// 		if($album != $real_name) {
	// 			if(mysqli_query($link, 'RENAME TABLE '.$album.' TO '.$real_name)) {
	// 				echo 'Success! ';
	// 			} else {
	// 				echo 'таблица не может быть переименована.';
	// 			}
	// 		} else {
	// 			echo 'Success!';
	// 		}	
	// 	}
	// }
	//Выводим сообщения об ошибках
	echo $msg;