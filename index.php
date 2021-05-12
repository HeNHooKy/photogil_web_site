<?php 
	require_once 'source/php/database.php';
	require_once 'source/php/index/get_content.php';
?>
<!DOCTYPE html>
<html>
<?php 
	require_once 'structure/header.php';
?>
<div class="language"> <!--Устанавливаем язык-->
    <a id="en" href=<?php echo 'http://en'.'.'.$url[1].'.'.$url[2].'/'?>>
      <b>EN</b>
    </a>

    <a id="ru"  href=<?php echo 'http://ru'.'.'.$url[1].'.'.$url[2].'/'?>>
      <b>RU</b>
    </a>
</div>

  <?php 
  if($lang == 'ru') {
    echo ('<nav> <a href="#home">Главная</a> <a href="#say_about_me">Обо мне</a><a href="#portfel">Портфолио</a> <a href="#review_jak">Отзывы</a><a href="price.php">Цены</a>');
  } elseif($lang == 'en') {
    echo ('<nav> <a href=#home">Home</a> <a href="#say_about_me">About me</a><a href="#portfel">Portfolio</a> <a href="#review_jak">Reviews</a><a href="/price.php">Price</a>');
  }
  ?>

  <div id="connect">
    <b style="font-weight: 600;"><?php echo get_link('SELECT * FROM `social_net` WHERE name LIKE "phone_number"'); ?></b>
    <button class="open_modal" modal="send_message"><?php echo $alldata['connect']; ?></button>
  </div>
</header>
<section id="sect_start">
  <h1> <?php 
    echo get_content("SELECT * FROM `rusification` WHERE name LIKE 'about_site' AND lang LIKE '".$lang."'");
    ?> </h1>
  <div id="photo_1" style="background: url(<?php echo get_link('SELECT * FROM photos WHERE name like "photo_1"') ?>); background-size: auto 100%"></div>
</section>

  <h2 id = "say_about_me"> <?php echo $alldata['about_me']; ?> </h2>
 
<section id="about_me">
  
  <img alt="Фотография Дарьи Гилёвой" <?php echo 'src="'.get_link("SELECT * FROM `photos` WHERE name like 'me_photo'").'"'; ?> id="photo_face">
    <p>  <?php 
    echo get_content("SELECT * FROM `rusification` WHERE name LIKE 'about_me' AND lang LIKE '".$lang."'");
    ?> </p>
    <button class="open_modal" modal="send_message"> <?php echo $alldata['get_photo']; ?> </button>
</section>

  <h2 id="portfel"> <?php echo $alldata['portfolio']; ?> </h2>

<section id="portfolio">

      <a href="wed.php?cat=love" class="portfolio_block">
      <h4> <?php echo $alldata['love'] ?> </h4>
      <div class="port_brick">
      <img class="port_photo" alt="photography weddings and love story" src="photos/block1_love.jpg">
      <div class="photo_shadow"> </div>
      </div> </a>

      <a href="wed.php?cat=family" class="portfolio_block">
      <h4> <?php echo $alldata['family'] ?> </h4>
      <div class="port_brick">
      <img class="port_photo" alt="photography family fotossesion" src="photos/block2_family.jpg">
      <div class="photo_shadow"> </div>
      </div> </a>

      <a href="wed.php?cat=portret" class="portfolio_block">
      <h4> <?php echo $alldata['portret'] ?> </h4>
      <div class="port_brick">
      <img class="port_photo" alt="photography portrets" src="photos/block3_portret.jpg">
      <div class="photo_shadow"> </div>
      </div> </a>
    
</section>

	<h2 id="review_jak"> <?php echo $alldata['review']; ?> </h2>

<section id = "review">
	
	<div id="review_block" <?php $array = get_review('SELECT * FROM review WHERE lang LIKE "'.$lang.'"'); $length = count($array); echo 'data-number="'.$length.'"';?> >
		
		<div id="block_next"> <div id="next"> </div> </div>
		<div id="block_prev"> <div id="prev"> </div> </div>
		<?php 

		$i = 0;
		while($i < $length) {
			$name = $array[$i]['name'];
			$p_link = $array[$i]['link'];
			$content = $array[$i]['content'];
			echo('<div class="review_content" number="'.$i.'" ');
			if($i < 1) {
				echo('style="display: inline-block;" ');
			}
			echo('> <img src="'.$p_link.'" alt="review img"> <h3>'.$name.'</h3><p>'.$content.'</p></div>');
			$i++;
		}

		?>
			<a id="give_review" class="open_modal" modal="send_review"> <?php echo $alldata['get_review']; ?> </a>
	</div>

</section>

<!--с этого момента страница перестает загружаться-->
<div class="social_service">
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "mywed"').'"' ?> id="mywed"><?php require_once 'source/mini_svg/mywed.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "instagram"').'"' ?> id="insta"><?php require_once 'source/mini_svg/instagram.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "facebook"').'"' ?> id="facebook"><?php require_once 'source/mini_svg/facebook.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "vk"').'"' ?> id="vk"><?php require_once 'source/mini_svg/vk.php';?></a>
</div>


<div id="modal_back"> <!--Подложка-->

</div>

<!--Модалки. Оставить отзыв, оставить сообщение-->
<?php 
	
	if($lang == 'ru') {
		require_once 'structure/send_message.php';
		require_once 'structure/send_review.php';
	} else {
		require_once 'structure/send_message_en.php';
		require_once 'structure/send_review_en.php';
	}
	require_once 'structure/loading.php';
?>

<!--Сообщения-->
<div id="message" name="review">
	<p></p>
</div>

<?php 
	require_once 'structure/footer.php';
?>

<script type="text/javascript" src="source/scripts/fixedScroll/photoDownToSroll.js"></script>
</body>
</html>

<!--Дмитрий Гилёв сделал это-->