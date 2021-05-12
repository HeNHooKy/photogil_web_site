<?php
	require_once 'source/php/database.php';
	require_once 'user-admin/server_controls/password_encrypt.php';

	if (isset($_COOKIE['login'], $_COOKIE['password']) && password_check($_COOKIE['login'], $_COOKIE['password'])) {
		setcookie('login', $_COOKIE['login'], time() + 86400);
		setcookie('password', $_COOKIE['password'], time() + 86400);
		header('Location: user-admin/admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Site-manager Auth</title>
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
			height: 100px;
			border: 1px #eee solid;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -50px;
		}
	</style>
</head>
<body>

<form method="POST" action="user-admin/admin.php">
	<input type="text" name="user_name" placeholder="Login">
	<input type="password" name="user_password" placeholder="password">
	<button> AUTH! </button>
</form>
	

</body>
</html>