<?php 
	require_once '../source/php/database.php';
	require_once 'server_controls/password_encrypt.php';
	require_once '../source/php/index/get_content.php';

	$user_login = isset($_POST['user_name']) ? $_POST['user_name'] : '';
	$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';	
	if(password_check($user_login, $user_password)) {		
			setcookie('login', $user_login, time() + 86400, '/', 'photodaria.com'); //Теперь авторизация строго привязана к домену
			setcookie('password', $user_password, time() + 86400, '/', 'photodaria.com');//При смене домена - корректировать cookie!
			header('Location: admin.php');
	}	elseif (isset($_COOKIE['login'], $_COOKIE['password']) && password_check($_COOKIE['login'], $_COOKIE['password'])) {
			setcookie('login', $_COOKIE['login'], time() + 86400, '/', 'photodaria.com');
			setcookie('password', $_COOKIE['password'], time() + 86400, '/', 'photodaria.com');
	}	else {
		die('<b>Данные пользователя введены неверно!</b><br> <meta http-equiv="refresh" content="0.5; url=../authentication.php">');
	}
	
 	require_once 'server_controls/loadAtServer.php';

 	$albumArray = get_review('SELECT * FROM `all_albums`');

 	$url = explode('.', $_SERVER['SERVER_NAME']);
  	$lang = $url[0];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Site manager</title>
	<link rel="stylesheet" type="text/css" href="../source/styles/default.css">
	<link rel="stylesheet" type="text/css" href="styles/default.css">
	<link rel="stylesheet" type="text/css" href="styles/review.css">
	<link rel="stylesheet" type="text/css" href="../source/styles/messages.css">
	<style type="text/css">
		#central_photo a:hover {
			color: #f6921e;
		}
	</style>
</head>
<body>
<header>
	<h1> Site manager </h1>
	<a href="http://ru.photodaria.com/"> Back to site</a>
	<a href="http://ru.photodaria.com/user-admin/admin"> ПУ с упором на русский </a>
	<a href="http://en.photodaria.com/user-admin/admin"> ПУ с упором на английский </a>
</header>

<section>

	<form id = "central_photo" name = "central_photo" slide="1">
		<h3> 1. Загрузить фото в слайдер </h3>
		<i style="padding-left: 15px; display: block;">Рекомендуемый размер: 1600х500(1600х600)</i>
		<a class="prev" href="#"> < </a>
		<p style="display: inline-block; padding-left: 30px;"> Слайд # 1 </p>
		<input style="display: inline-block;" type="file" name="central_photo_image">
		<a class="next" href="#"> > </a>
		<button style="display: block;"> Сохранить </button>
	</form>

	<form id = "create_album" name = "create_album" >

		<h3> 2. Создать/изменить альбом </h3> <!-- выбор изменить -->
		<p>
		<input type="radio" name="album_rad" checked value="love"> Свадьбы и love story <Br>
		<input type="radio" name="album_rad" checked value="family"> Семейные фотосессии <Br>
		<input type="radio" name="album_rad" checked value="portret"> Портреты <Br>
		</p>
   

		<div>
			<label for="album_name"> Название альбома: </label> <!--HTML язык программирования!;) -->
			<input type="text" name="album_name" required>
		</div>

		<div>
			<label for="album_name"> Название альбома (eng): </label> <!--HTML язык программирования!;) -->
			<input type="text" name="album_name_eng" required>
		</div>

		<div>
			<label for="album_real_name"> Название альбома в базе данных(eng): </label>
			<input type="text" name="album_real_name" placeholder=" например: love" required>
		</div>

		<div>
			<label class="textarea_label"> Описание альбома(анг. описание можно добавить при изменении альбома): </label>
			<textarea name="description" required></textarea>
		</div>
		<i>Рекомендуемый размер изображения для обложки: 250х215px</i>
		<input type="file" name="album_image" required>
		<button> Сохранить </button>

	</form>

</section>

<section>

	<form id = "new_about_me" name = "new_about_me">
		<h3> 3. Новое обо мне </h3>
		<input type="text" hidden name="lang" value="ru">
		<?php if($lang == 'ru'){
			echo '<input type="text" hidden name="lang" value="ru">';
		} elseif($lang == 'en') {
			echo '<input type="text" hidden name="lang" value="en">';
		}?>
		<textarea name="new_info_about_me"><?php 
		if($lang == 'ru') { 
			echo get_content("SELECT * FROM `rusification` WHERE name like 'about_me' and lang like 'ru'");
		} elseif($lang == 'en') {
			echo get_content("SELECT * FROM `rusification` WHERE name like 'about_me' and lang like 'en'");
		}
		?></textarea>
		<input type="file" name="about_me_image">
		<button> Сохранить </button>
	</form>

	<form id = "change_contacts" name = "change_contacts" enctype="multipart/form-data" method="post">
		<h3> 4. Изменить контакты </h3>

		<div>
			<label for="myWed"> MyWed: </label>
			<input required type="text" name="mywed" value=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name like "mywed"').'"' ?> >
		</div>

		<div>
			<label for="instagram"> Instagram: </label>
			<input required type="text" name="instagram" value=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name like "instagram"').'"' ?> >
		</div>

		<div>
			<label for="facebook">Facebook: </label>
			<input required type="text" name="facebook" value=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name like "facebook"').'"' ?> >
		</div>

		<div>
			<label for="vk"> Vkontakte: </label>
			<input required type="text" name="vk" value=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name like "vk"').'"' ?> >
		</div>

		<div>
			<label for="city"> Город: </label>
			<input required type="text" name="city" value=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name like "city"').'"' ?> >
		</div>

		<div>
			<label for="phone_number"> Номер телефона: </label>
			<input required type="text" name="phone_number" value=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name like "phone_number"').'"' ?> >
		</div>

		<button> Сохранить </button>


	</form>

</section>

<article>

	<form id = "change_header" name = "change_header">
		<div>
			<h3> 5. Изменить заголовок </h3>
			<?php if($lang == 'ru'){
				echo '<input type="text" hidden name="lang" value="ru">';
			} elseif($lang == 'en') {
				echo '<input type="text" hidden name="lang" value="en">';
			}?>
			<input type="text" name="header" style='width: 50%' value=<?php if($lang == 'ru') { echo '"'.get_content('SELECT * FROM `rusification` WHERE name like "about_site" and lang like "ru"').'"'; }
			elseif($lang == 'en') {
				echo '"'.get_content('SELECT * FROM `rusification` WHERE name like "about_site" and lang like "en"').'"';
			}?> >
		</div>
		<button> Сохранить </button>
	</form>

</article>

		<h3> 6. Заявки на отзыв </h3>

<article class = "review">

	<div class="review_block" id="non_filtered" <?php $array = get_review('SELECT * FROM revieTimed'); $length = $array ? count($array) : 0; echo 'data-number="'.$length.'"';?> >
		
		<div id="non_next" class="block_next"> <div class="next"> </div> </div>
		<div id="non_prev" class="block_prev"> <div class="prev"> </div> </div>
		<?php
		
		$i = 0;
		if($length>0) {
			while($i < $length) {
				$name = $array[$i]['name'];
				$url = $array[$i]['link'];
				$content = $array[$i]['content'];
				$email = $array[$i]['email'];
				$tel = $array[$i]['phone_number'];
				$id = $array[$i]['id'];

				echo ('<div class="review_content" non_number="'.$i.'" id="'.$id.'"');
				if($i == 0) {
					echo ' style="display: inline-block;"';
				}
				echo ('> <img src="../'.$url.'" alt="review img"> <h3> '.$name.' </h3> <p>'.$content.'</p> <i>email: '.$email.'; </i> <i> телефон: '.$tel.';</i> </div>');
				$i++;
			}
		}	else {
			echo  "<strong> Новых отзывов нет <strong>";
		}
		 ?>
	</div>
</article>

<div class="control_package">
		<button class="delete_review non_filtered_choose"  dBase="revieTimed" review-id=<?php echo ('"'.$array[0]['id'].'"') ?> > Удалить отзыв </button>
		<button class="complite_review non_filtered_choose" review-id=<?php echo ('"'.$array[0]['id'].'"') ?> > Одобрить отзыв </button>
</div>

	<h2> Редактировать альбомы </h2>

<article class="album_portfolio">
	
	<!--При нажатии нас кинет на страницу с редакитрованием альбома -->
	<!-- Перечислить все существующие альбомы -->

	<?php
	$count = count($albumArray);
		for($j = 0; $j<$count; $j++) {
			echo('<a href=wed_edit.php?wed='.$albumArray[$j]['name'].' class="portfolio_block">');
			echo('<h4> '.$albumArray[$j]['real_name'].'</h4>');
			echo('<div class="port_brick">');
			echo('<img class="port_photo" alt="Фотография '.$albumArray[$j]['real_name'].'" src="../'.$albumArray[$j]['link'].'">');
			echo('<div class="photo_shadow"> </div>');
			echo('</div> </a>');
		}

	?>

</article>
	<h3> 7. Редактировать отзывы </h3>

	<!--Загрузить все отзывы с главной страницы -->
	<!--Можно редактировать изображения и текст. По типу страницы с ценами--> 
<article class = "review">

	<div class="review_block" id="filtered" name="review" <?php $array = get_review('SELECT * FROM review'); $length = count($array); echo 'data-number="'.$length.'"';?> >

		<div id="delete_review_filtered" review-id=<?php echo ('"'.$array[0]['id'].'"') ?> class="delete_review" dBase="review">

			<div id="mom_slash"> 
			  <div id="slash_1" class="slash"> </div> <div id="slash_2" class="slash"> </div> <!--остановить загрузку фото-->
			</div>

		</div>
		
		<div id="next" class="block_next"> <div class="next"> </div> </div>
		<div id="prev" class="block_prev"> <div class="prev"> </div> </div>
		<?php
		
		$i = 0;
		if($length>0) {
			while($i < $length) {
				$name = $array[$i]['name'];
				$url = $array[$i]['link'];
				$content = $array[$i]['content'];
				$email = $array[$i]['email'];
				$tel = $array[$i]['phone_number'];
				$id = $array[$i]['id'];

				echo ('<div class="review_content" number="'.$i.'" id="'.$id.'"');
				if($i == 0) {
					echo ' style="display: inline-block;"';
				}
				echo ('> <img src="../'.$url.'" alt="review img"> <h3> '.$name.' </h3> <p>'.$content.'</p> <i>email: '.$email.'; </i> <i> телефон: '.$tel.';</i> </div>');
				$i++;
			}
		}	else {
			echo "<strong>На главной нет отзывов. <strong>";
		}
		 ?>
	</div>
	
</article>

<footer>
  <b style="color: #6d6e71"> &copy; DMITRY GILEV 2017 </b>
</footer>

<div id="message" name="review">
	<p></p>
</div>

<script type="text/javascript" src="../source/plugins/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/function.js"></script>
<script type="text/javascript" src="../source/scripts/hoverToShadow.js"></script>
<script type="text/javascript" src="scripts/srollReview.js"></script>
<script type="text/javascript" src="scripts/reviewChoose.js"></script>
<script type="text/javascript" src="scripts/albumInfoRefresh_Update.js"></script>
<script type="text/javascript" src="scripts/centralPhotoUpdate.js"></script>
<script type="text/javascript" src="scripts/allOtherForm.js"></script>

</body>
</html>