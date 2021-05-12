<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';

	if (!isset($_COOKIE['login'], $_COOKIE['password']) || !password_check($_COOKIE['login'], $_COOKIE['password'])) {
		die ('<b> Эта страница не доступна без авторизации <meta http-equiv="refresh" content="0.5; url=../../authentication.php">');
	}

	$id = $_GET['id'];
	
	$sql = $_GET['sql'];

	mysqli_query($link, 'DELETE FROM '.$sql.' WHERE id='.$id);

	echo $id.$sql;
?>