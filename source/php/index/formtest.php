<?php

// Путь загрузки
$path = 'photos/';

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Загрузка файла и вывод сообщения
	if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
		echo 'Что-то пошло не так';
	else
		echo 'Загрузка удачна';
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Загрузка изображения с изменением размеров</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<h1>Загрузка изображения с изменением размеров</h1>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="picture">
			<input type="submit" value="Загрузить">
		</form>
	</body>
</html>