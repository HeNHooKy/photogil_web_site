<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';

	pass_check_exit(2);

	$id = $_GET['id'];
	
	$sql = $_GET['sql'];

	$data = mysqli_fetch_assoc(mysqli_query($link, 'SELECT link FROM `'.$sql.'` WHERE id='.$id));

	$linked = $data['link'];

	if(mysqli_query($link, 'DELETE FROM `'.$sql.'` WHERE id='.$id)) {
		if(file_exists('../../'.$linked)) {
			unlink('../../'.$linked);
		}
		echo $id.' альбома: '.$sql;
	}
