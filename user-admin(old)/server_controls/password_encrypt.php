<?php
	function generate_salth($length) {
		$unique_random_string = md5(uniqid(mt_rand(), true));

		$base64_string = base64_encode($unique_random_string);

		$modified_base64_string = str_replace('+', '.', $base64_string);

		$salt = substr($modified_base64_string, 0, $length);

		return $salt;
	}
	
	function password_encrypt($password) {
		$salt_length = 22;

		$salt = generate_salth($salt_length);

		$hash_format = '$2y$10$';

		$hash_salt = $hash_format . $salt;

		return crypt($password, $hash_salt);

	}

	function pin_encrypt($pin) {
		$salt_length = 22;

		$salt = generate_salth($salt_length);

		$hash_format = '$2y$10$';

		$hash_salt = $hash_format . $salt;

		return crypt($pin, $hash_salt);

	}

	function password_check($login, $password) {
		global $link;

		$pass_in_db = mysqli_fetch_array(mysqli_query($link, 'SELECT * FROM `user_list` WHERE login LIKE "'.$login.'"'), MYSQL_ASSOC);

		$pass_in_db_convert = $pass_in_db['password'];

		$hash_at_user = crypt($password, $pass_in_db_convert);

		if($hash_at_user == $pass_in_db_convert) {
			return true;
		} else {
			return false;
		}


	}

	function pin_check($login, $pin) {
		global $link;

		$pin_in_db = mysqli_fetch_array(mysqli_query($link, 'SELECT * FROM `user_list` WHERE login LIKE "'.$login.'"'), MYSQL_ASSOC);

		$pin_in_db_convert = $pin_in_db['pin-code'];

		$hash_at_user = crypt($pin, $pin_in_db_convert);

		if($hash_at_user == $pin_in_db_convert) {
			return true;
		} else {
			return false;
		}
	}