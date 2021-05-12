<?php
	require_once '../../../user-admin/server_controls/password_encrypt.php';
	require_once '../database.php';

	$uploads_dir = '../../../photos';

	$new_name = generate_salth(12);

	mysqli_query($link, 'INSERT INTO `revieTimed`(`name`) VALUES ("id")');
	$id = mysqli_insert_id($link)-1;
	mysqli_query($link, 'DELETE FROM `revieTimed` WHERE id = '.($id+1));



	if(isset($_FILES['img'])) {
		$format = basename($_FILES['img']['type']);

		$arsize = getimagesize($_FILES['img']['tmp_name']);

		if($format == 'jpeg') { //format a->format b
			$format = 'jpg';	
		}

			if($_FILES['img']['size'] < 524288) {
				if($format == 'png' || $format == 'jpg' || $format == 'gif') {
					if(move_uploaded_file($_FILES['img']['tmp_name'], $uploads_dir.'/'.$new_name.'.'.$format)) {
						if($_FILES['img']['error'] == 'UPLOAD_ERR_OK') {
							if(mysqli_query($link, 'UPDATE `revieTimed` SET `link`="photos/'.$new_name.'.'.$format.'" WHERE id ='.$id)) {
								echo 'Review send to moderate.';
							} else {
								echo 'Не удалось присоеденить картинку к отзыву';
								deleteLastWrite();
							}
							
						} else {
							echo 'файл не был загружен';
							deleteLastWrite();
						}
					} else {
						echo 'Ну удается переместить файл.';
						deleteLastWrite();
					}
				}	else {
					echo 'Формат файла не поддерживается.';
					deleteLastWrite();
				}	
			} else {
				echo 'Размер загружаемого файла превышен.';
				deleteLastWrite();
			}
}	else {
	echo 'обработка файла прервана';
	deleteLastWrite();
}

function deleteLastWrite() {
	global $link;
	global $id;

	$query = mysqli_query($link, 'SELECT `time` FROM `revieTimed` WHERE id = '.$id);
	$assoc_array = mysqli_fetch_assoc($query);

	$time = $assoc_array['time'];

	if(time() < $time+3600) {
	mysqli_query($link, 'DELETE FROM `revieTimed` WHERE id = '.$id);
}
}