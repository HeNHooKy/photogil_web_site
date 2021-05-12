<?php 
	require_once '../source/php/database.php';
	require_once 'server_controls/password_encrypt.php';
	require_once '../source/php/index/get_content.php';

	$user_login = $_POST['user_name'];
	$user_password = $_POST['user_password'];	
	if(password_check($user_login, $user_password)) {		
			setcookie('login', $user_login, time() + 86400, '/', 'photogil.tmweb.ru'); //Теперь авторизация строго привязана к домену
			setcookie('password', $user_password, time() + 86400, '/', 'photogil.tmweb.ru');//При смене домена - корректировать cookie!
			header('Location: admin.php');
	}	elseif (isset($_COOKIE['login'], $_COOKIE['password']) && password_check($_COOKIE['login'], $_COOKIE['password'])) {
			setcookie('login', $_COOKIE['login'], time() + 86400, '/', 'photogil.tmweb.ru');
			setcookie('password', $_COOKIE['password'], time() + 86400, '/', 'photogil.tmweb.ru');
	}	else {
		die('<b>Данные пользователя введены неверно!</b><br> <meta http-equiv="refresh" content="0.5; url=../authentication.php">');
	}
	
 	require_once 'server_controls/loadAtServer.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Site Manager</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/razmetka.css">
	<link rel="stylesheet" type="text/css" href="styles/main_menu.css">
	<link rel="stylesheet" type="text/css" href="../source/styles/review.css">
	<link rel="stylesheet" type="text/css" href="styles/AP.css">
	


</head>
<body>

	<article class="main_menu"  style="position: relative;">

		<h1> Site <br> Manager </h1>

		<nav>
			<a href="?" class="menu"> Home </a>
			<a href="?page=wed" class="menu"> Wed </a>
			
		</nav>

		<a href="../index.php" id="back_to_site" style="position: absolute; bottom: 15px;">  Вернуться к сайту. </a>
	</article>

<?php 
	if(!isset($_GET['page'])) {
		require_once 'pages/adminPanel.php';
	} elseif ($_GET['page'] == 'wed') {
		require_once 'pages/adminWed.php';
	} else {
		die('Такой страницы не существует. <a href="admin.php"> Вернуться на главную </a>');
	}
?>

<script type="text/javascript" src="../source/plugins/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/deletePhoto.js"></script>
<script type="text/javascript" src="scripts/reviewChoose.js"></script>
<script type="text/javascript" src="../source/scripts/srollReview.js"></script>

</body>
</html>