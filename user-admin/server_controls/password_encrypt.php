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

		$pass_in_db = mysqli_fetch_array(mysqli_query($link, 'SELECT * FROM `user_list` WHERE login LIKE "'.$login.'"'));

		$pass_in_db_convert = $pass_in_db['password'];

		$hash_at_user = crypt($password, $pass_in_db_convert);

		if ($hash_at_user == $pass_in_db_convert) {
			return true;
		} else {
			return false;
		}


	}

	function pin_check($login, $pin) {
		global $link;

		$pin_in_db = mysqli_fetch_array(mysqli_query($link, 'SELECT * FROM `user_list` WHERE login LIKE "'.$login.'"'));

		$pin_in_db_convert = $pin_in_db['pin-code'];

		$hash_at_user = crypt($pin, $pin_in_db_convert);

		if ($hash_at_user == $pin_in_db_convert) {
			return true;
		} else {
			return false;
		}
	}

	function pass_check_exit($count_path) {
		$path_back = '';

		for ($i = 0; $i<$count_path; $i++) {
			$path_back .= '../';
		}

		if (!isset($_COOKIE['login'], $_COOKIE['password']) || !password_check($_COOKIE['login'], $_COOKIE['password'])) {
			die ('<b> Эта страница не доступна без авторизации <meta http-equiv="refresh" content="0.5; url='.$path_back.'authentication.php">');
		}

	}

	function photo_resizer($file, $type, $newwidth, $newheight, $path, $optimize = true) { //Имя файла, путь; новая ширина; новая высота; путь - выходной файл; опитимизация изображения
		$filename = $file;

		if($type == 'image/jpeg')
			$source = imagecreatefromjpeg($filename);
		elseif($type == 'image/png')
			$source = imagecreatefrompng($filename);
		elseif($type == 'image/gif')
			$source = imagecreatefromgif($filename);
		else die("File is not correct!");

		list($width, $height) = getimagesize($filename);


		if($width > $newwidth || $height > $newheight) { //Не подходит для маленьких изображений

			if(abs($width - $newwidth) < abs($height - $newheight)) {
				$k = $newwidth/ $width;
			}
			else {
				$k = $newheight/ $height; //Коэфициент
			}

			$w_0 = $width*$k;
			$h_0 = $height*$k;

			$thumb_0 = imagecreatetruecolor($w_0, $h_0);

			imagecopyresized($thumb_0, $source, 0, 0, 0, 0, $w_0, $h_0, $width, $height);

			if($w_0 > $newwidth && $optimize) {

				$x_axis = ($w_0 - $newwidth)/2;

				$thumb_1 = imagecreatetruecolor($newwidth, $newheight);

				imagecopyresized($thumb_1, $thumb_0, 0, 0, $x_axis, 0, $newwidth, $newheight, $newwidth, $newheight);

				imagejpeg($thumb_1, $path);

				return true;

			} 
			elseif ($h_0 > $newheight && $optimize) {

				$y_axis = ($h_0 - $newheight)/2;

				$thumb_1 = imagecreatetruecolor($newwidth, $newheight);

				imagecopyresized($thumb_1, $thumb_0, 0, 0, 0, $y_axis, $newwidth, $newheight, $newwidth, $newheight);

				imagejpeg($thumb_1, $path);

				return true;
			} 
			else {
				imagejpeg($thumb_0, $path);

				return true;
			}	
		}
	}