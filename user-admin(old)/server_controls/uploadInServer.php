<?php
	require_once '../../source/php/database.php';
	require_once 'password_encrypt.php';

	if (!isset($_COOKIE['login'], $_COOKIE['password']) || !password_check($_COOKIE['login'], $_COOKIE['password'])) {
		die ('<b> Эта страница не доступна без авторизации <meta http-equiv="refresh" content="0.5; url=../../authentication.php">');
	}


	$count = count($_FILES['userfile']['name']);

	$sql = $_POST['sql'];

	$page = $_POST['page'];

	for($i = 0;$i < $count; $i++) {
		if(copy($_FILES['userfile']['tmp_name'][$i], '../../photos/'.$_FILES['userfile']['name'][$i])) {

			$s = mysqli_query($link, 'INSERT INTO '.$sql.'(`link`, `title`) VALUES ("photos/'.$_FILES['userfile']['name'][$i].'", "'.basename($_FILES['userfile']['name'][$i]).'")');

		}
	}
	if($s) {
		echo 'loading, please wait!';

		echo ('<meta http-equiv="refresh" content="0.5; url=../admin.php?page='.$page.'">');
	}
