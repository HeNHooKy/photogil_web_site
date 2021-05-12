<?php
	require_once 'source/php/database.php';
	require_once 'user-admin/server_controls/password_encrypt.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		body {
			background-color: #eee;
		}

		input {
			display: block;
			width: 90%;
			margin: 10px 5%;
		}

		button {
			display: block;
			width: 90%;
			margin: 10px 5%;
		}

		form {
			width: 300px;
			height: 400px;
			border: 1px #eee solid;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -200px;
		}
		h1 {
			text-align: center;
			color: #000;
		}
	</style>
</head>
<body>

<form method="POST">
	<h1> Регистрация администратора </h1>
	<input type="text" name="user_name" placeholder="Login" required="true">
	<input type="password" name="user_password" placeholder="password" required="true">
	<input type="password" name="user_repassword" placeholder="repeat password" required="true">
	<input type="text" name="pin-code" placeholder="pin-code" maxlength="4" required="true">
	<button> REGISTER! </button>
</form>
	
	<?php 
		

		if(isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['pin-code']) && isset($_POST['user_repassword'])) {

			$login = $_POST['user_name'];
			$password = $_POST['user_password'];
			$pin = $_POST['pin-code'];
			$repass = $_POST['user_repassword'];

			$crypt_pass = password_encrypt($password);

			if($password != $repass) {
				die(' Пароли не совпадают! <br> <br>');
			}

			$crypt_pin = pin_encrypt($pin);

			if(mysqli_query($link, 'INSERT INTO user_list (`login`, `password`, `pin-code`) VALUES ("'.$login.'", "'.$crypt_pass.'", "'.$crypt_pin.'")')) {
				echo "<script> alert('Регистрация прошла успешно!'); </script>";
			} else {
				echo ' Администратор с таким именем уже существует <br> <br>';
			}
			

		}
	?>

</body>
</html>