<?php
	require_once '../../../source/php/database.php';
	require_once '../password_encrypt.php';

	pass_check_exit(3);

	function get_albumInfo($data) {
		global $link;

		$array = mysqli_query($link, 'SELECT * FROM `all_albums` WHERE album LIKE "'.$data.'"');

		$all_array = mysqli_fetch_array($array, MYSQL_ASSOC);

		return json_encode($all_array);

	}

	if($_GET['action'] == 'albumDescript') {
		echo get_albumInfo($_GET['value']);
	}