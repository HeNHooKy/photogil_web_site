<?php 
  require_once 'source/php/database.php';
  require_once 'source/php/index/get_content.php';
?>

<!DOCTYPE html>
<html>

<?php 
  require_once 'structure/header.php';

?>
<div class="language" lang=<?php echo $lang; ?>> <!--Устанавливаем язык-->

    <a id="en" href=<?php echo 'http://en'.'.'.$url[1].'.'.$url[2].'/wed?cat='.$_GET['cat']?>>
      <b>EN</b>
    </a>

    <a id="ru"  href=<?php echo 'http://ru'.'.'.$url[1].'.'.$url[2].'/wed?cat='.$_GET['cat']?>>
      <b>RU</b>
    </a>
</div>
  <link rel="stylesheet" type="text/css" href="source/styles/album.css">
<?php 
  if($lang == 'ru') {
    echo ('<nav> <a href="http://ru.'.$url[1].'.'.$url[2].'/">Главная</a> <a href="http://ru.'.$url[1].'.'.$url[2].'/#say_about_me">Обо мне</a><a href="http://ru.'.$url[1].'.'.$url[2].'/#portfel">Портфолио</a> <a href="http://ru.'.$url[1].'.'.$url[2].'/#review_jak">Отзывы</a><a href="http://ru.'.$url[1].'.'.$url[2].'/price.php">Цены</a>');
  } elseif($lang == 'en') {
    echo ('<nav> <a href="http://en.'.$url[1].'.'.$url[2].'/">Home</a> <a href="http://en.'.$url[1].'.'.$url[2].'/#say_about_me">About me</a><a href="http://en.'.$url[1].'.'.$url[2].'/#portfel">Portfolio</a> <a href="http://en.'.$url[1].'.'.$url[2].'/#review_jak">Reviews</a><a href="http://en.'.$url[1].'.'.$url[2].'/price.php">Price</a>');
  }
?>

  <h1 class="changingText"><?php if($_GET['cat'] == 'love') {
		echo $alldata['love'];
	} elseif($_GET['cat'] == 'family') {
		echo $alldata['family'];
	} elseif($_GET['cat'] == 'portret') {
		echo $alldata['portret'];
	}?>  </h1>

	<div class="description">
		<!--Тут будет загружено описание-->
	</div>

</header>


<div id="mom_slash"> 
  <div id="slash_1" class="slash"> </div> <div id="slash_2" class="slash"> </div> <!--остановить загрузку фото-->
</div>

<section class="album" data-page="1"  wed="none"> <!--Намеренно оставленно пустым--> 
	<!--Пока поле пусто, scrollLoad script не будет прогружать новые фотографии. т.к. альбом еще не выбран-->
</section>

<section id="portfolio">
	
  	<!--При нажатии юзера кинет на страницу альбома -->
	<!-- Перечислить все существующие альбомы -->

<?php
	$albumArray = get_review('SELECT * FROM `all_albums` WHERE `category` LIKE "'.$_GET['cat'].'"');
	$count = isset($albumArray) ? count($albumArray) : 0;
	for($j = 0; $j<$count; $j++) {
		echo('<a style="cursor: pointer;" wed="'.$albumArray[$j]['name'].'" class="portfolio_block">');
		if($lang == 'ru') {
			echo('<h4> '.$albumArray[$j]['real_name'].'</h4>');
		} elseif($lang == 'en') {
			echo('<h4> '.$albumArray[$j]['real_name_eng'].'</h4>');
		}
		echo('<div class="port_brick">');
		echo('<img class="port_photo" alt="Фотография '.$albumArray[$j]['real_name'].'" src="../'.$albumArray[$j]['link'].'">');
		echo('<div class="photo_shadow"></div></div></a>');
		echo('');

	}
?>
</section>



<img id="photo_load" src="source/images/ajax-loader.gif" style="display: none;">

<div style="width: 100%; border-top: 1px #6d6e71 solid; height: 1px; margin-top: 40px;"> </div>

<div class="social_service">
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "mywed"').'"' ?> id="mywed"><?php require_once 'source/mini_svg/mywed.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "instagram"').'"' ?> id="insta"><?php require_once 'source/mini_svg/instagram.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "facebook"').'"' ?> id="facebook"><?php require_once 'source/mini_svg/facebook.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "vk"').'"' ?> id="vk"><?php require_once 'source/mini_svg/vk.php';?></a>
</div>


<?php 
  require_once 'structure/footer.php';
?>



<script type="text/javascript" src="source/scripts/ScrollLoader.js"></script>	

<script type="text/javascript">
  
$('#mom_slash').on('click', function() {
  begining = false;
  $(this).animate({opacity: 0}, 200);
  $('.album').animate({opacity: 0, height: 0}, 800);
  $('.changingText').text(changingText);
  $('.description').text('');
  setTimeout(function() {
    $('.album').empty();
    $(this).hide();
  }, 800);
});

</script>

</body>
</html>