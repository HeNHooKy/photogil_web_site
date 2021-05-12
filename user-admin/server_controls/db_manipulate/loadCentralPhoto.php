<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';
	require_once '../function.php';

	pass_check_exit(3);

	$count = $_GET['count'];

	updatePhoto('photos', 'photo_1', 3, $count, 'slideCount');