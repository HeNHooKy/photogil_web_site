<?php 
  require_once 'source/php/database.php';
  require_once 'source/php/index/get_content.php';
?>

<!DOCTYPE html>
<html>

<?php 
  require_once 'structure/header.php';
?>
  <link rel="stylesheet" type="text/css" href="source/styles/album.css">
  <link rel="stylesheet" type="text/css" href="source/styles/rus.css">

<nav> 
  <a href="index.php">Главная</a>
  <a href="index.php#say_about_me">Обо мне</a>
  <a href="index.php#portfel">Портфолио</a>
  <a href="index.php#review_jak">Отзывы</a>
  <a href="price.php">Цены</a>
</nav>
  <div id="connect">
  </div>
</header>

<section id="sect_start">
  <h1> <?php $name = mysqli_fetch_assoc(mysqli_query($link, 'SELECT real_name FROM all_albums WHERE album like "'.$_GET['wed'].'"')); 
  echo $name['real_name'] ?> </h1>
  <div id="photo_1" style="background: url(<?php echo get_link('SELECT * FROM photos WHERE name like "photo_1"') ?>);"></div>
</section>

<div id="mom_slash"> 
  <div id="slash_1" class="slash"> </div> <div id="slash_2" class="slash"> </div> <!--остановить загрузку фото-->
</div>



<section class="album" data-page="1" wed=<?php echo($_GET['wed']); ?>>
</section>

<img id="photo_load" src="source/images/ajax-loader.gif">

<div style="width: 100%; border-top: 1px #6d6e71 solid; height: 1px; margin-top: 40px;"> </div>

<section id="portfolio">

  <a href="?wed=love" class="portfolio_block">
    <h4> Свадьбы и love story </h4>
    <div class="port_brick">
      <img alt="Фотография свадьбы или love story" src="photos/block1_love.jpg"> 
      <div class="photo_shadow"> </div>
    </div>
  </a>
  
  <a href="?wed=family" class="portfolio_block">
    <h4> Семейные фотосессии </h4>
    <div class="port_brick">
      <img alt="Семейные фотосессии" src="photos/block2_family.jpg"> 
      <div class="photo_shadow"> </div>
    </div>
  </a>

  <a href="?wed=portret" class="portfolio_block">
    <h4> Портреты </h4>
    <div class="port_brick">
      <img alt="Портет женщины или мужчины" src="photos/block3_portret.jpg"> 
      <div class="photo_shadow"> </div>
    </div>
  </a>

</section>


<div class="social_service">
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "mywed"').'"' ?> id="mywed"><?php require_once 'source/mini_svg/mywed.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "instagram"').'"' ?> id="insta"><?php require_once 'source/mini_svg/instagram.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "facebook"').'"' ?> id="facebook"><?php require_once 'source/mini_svg/facebook.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "vk"').'"' ?> id="vk"><?php require_once 'source/mini_svg/vk.php';?></a>
</div>


<?php 
  require_once 'structure/footer.php';
?>



<script type="text/javascript" src="source/scripts/fixedScroll/photoDownToSroll_album.js"></script>
<script type="text/javascript" src="source/scripts/ScrollLoader.js"></script>
<script type="text/javascript" src="source/scripts/startScroll.js"></script>

<script type="text/javascript">
  
$('#mom_slash').on('click', function() {
  begining = true;
  $(this).animate({opacity: 0}, 200);
  $('.album').animate({opacity: 0, height: 0}, 800);
  setTimeout(function() {
    $('.album').empty();
    $(this).hide();
  }, 800);
});

</script>

</body>
</html>