<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';
	require_once '../function.php';

	pass_check_exit(3);

	updatePhoto('photos', 'me_photo', 3);
	
	