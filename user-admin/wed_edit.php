<?php 
	require_once '../source/php/database.php';
	require_once 'server_controls/password_encrypt.php';
	require_once '../source/php/index/get_content.php';
	require_once 'server_controls/loadAtServer.php';
	$wed = $_GET['wed'];

	pass_check_exit(1);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wed manager</title>
	<link rel="stylesheet" type="text/css" href="../source/styles/default.css">
	<link rel="stylesheet" type="text/css" href="styles/default.css">
	<link rel="stylesheet" type="text/css" href="../source/styles/messages.css">
	<link rel="stylesheet" type="text/css" href="styles/wed.css">
</head>
<body>
<header>
	<h1> WED manager </h1>
	<a href="admin.php"> Back to manager</a>
</header>

<form class="upload_form">
  *Рекомендуемое разрешение изображений: <i>960х600;</i> <br />
  Файлы:<br />
  <input name="userfile[]" type="file" multiple="true" required="true"/><br />
  <input type="text" value=<?php echo '"'.$wed.'"'; ?> hidden="true" name="sql"/>
  <button> Добавить фото </button>
</form>

<a class="slider" href="javascript:;" onmousedown="slide('.album_update_form', 290);"> Изменить альбом.  </a>
<form class="album_update_form">
	<p>*оставьте поле пустым если нехотите его ментять</p>
	<input type="text" name="name" style="display: none;" value=<?php echo '"'.$wed.'"'; ?>>
	<input type="text" name="am_name" placeholder="Новое имя альбома на русском">
	<input type="text" name="am_name_eng" placeholder="Новое имя альбома на английском">
	<textarea placeholder="Описание альбома на русском языке" name="am_ru_description"></textarea>
	<textarea placeholder="Описание альбома на английском языке" name="am_en_description"></textarea>
	<input type="file" name="am_foto">
	<i id="delete_forever_____"> удалить альбом </i>
	<button> Изменить альбом </button>

</form>

<section id="photos" wed=<?php echo "'".$wed."'"?> >
<?php
	getAllPhotos('SELECT * FROM `'.$wed.'`');
?>
</section>


<div id="message" name="review">
	<p></p>
</div>

<script type="text/javascript" src="../source/plugins/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/function.js"></script>
<script type="text/javascript" src="scripts/uploadPhoto.js"></script>
<script type="text/javascript" src="scripts/deletePhoto.js"></script>
<script type="text/javascript" src="scripts/albumInfoRefresh_Update.js"></script>
<script type="text/javascript" src="scripts/delteAlbumForever.js"></script>
</body>
</html>