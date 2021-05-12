<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';

	pass_check_exit(2);

	$pin = $_GET['pin'];

	$action = $_GET['action'];

	$id = $_GET['id'];

	$data_base = isset($_GET['dbase']) ? $_GET['dbase'] : 'revietimed';

	if(!pin_check($_COOKIE['login'], $pin) || ($action == '' || $id == '')) {
		if(!pin_check($_COOKIE['login'], $pin)) {
			echo('Неверный пин-код, попробуйте снова ');
		} 

		if($action == '' || $id == '') {
			echo ('Нет параметров на входе ');
		}

		die();
	}
	
	

	if($action == 'delete') {

		if($link_query = mysqli_query($link, 'SELECT link FROM `'.$data_base.'` WHERE id='.$id)) {

			$link_assoc = mysqli_fetch_array($link_query);

				if(unlink('../../'.$link_assoc['link']) && mysqli_query($link, 'DELETE FROM `'.$data_base.'` WHERE id='.$id)) {
					echo 'Отзыв успешно удален ';
				} else {
					echo 'Возникла ошибка при деинстализации данных ';
				}

		} else {
			echo 'Некоторая ошибка программиста';
		}
	} elseif($action == 'complite') {

		if($review = mysqli_query($link, 'SELECT * FROM `revieTimed` WHERE id='.$id)) {

			$review_assoc = mysqli_fetch_array($review);

			if(mysqli_query($link, 'INSERT INTO `review`(`link`, `name`, `phone_number`, `email`, `content`, `lang`) VALUES ("'.$review_assoc['link'].'","'.$review_assoc['name'].'","'.$review_assoc['phone_number'].'","'.$review_assoc['email'].'","'.$review_assoc['content'].'","'.$review_assoc['lang'].'")')) {

				if(mysqli_query($link, 'DELETE FROM `revieTimed` WHERE id='.$id)) {

					echo 'Отзыв успешно перемещен к одобренным ';

				} else {

					echo 'Возникла ошибка при удалении временного отзыва ';
					die();

				}

			} else {
				echo 'Возникла ошибка при копировании данных в бд ';
				die();
			}

		}	else {
				echo 'Не удалось подключиться к бд ';
				die();
			}

	}	else {

		echo('Неизвестное значение action: '. $action.'. ');
		die();

	}
