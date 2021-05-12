<?php 
  require_once 'source/php/database.php';
  require_once 'source/php/index/get_content.php';
  require_once 'user-admin/server_controls/password_encrypt.php';
  $auth = false;
  if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    if(password_check($_COOKIE['login'], $_COOKIE['password'])) {
      $auth = true;
    }
  }
  

?>
<!DOCTYPE html>
<html>
<?php 
  require_once 'structure/header.php';

  if($lang == 'ru') {
    $all_data = get_review('SELECT * FROM `Price` WHERE `lang` LIKE "ru"');
  } elseif($lang == 'en') {
    $all_data = get_review('SELECT * FROM `Price` WHERE `lang` LIKE "en"');
  }
?>

<div class="language" lang=<?php echo $lang; ?>> <!--Устанавливаем язык-->

    <a id="en">
      <b>EN</b>
    </a>

</div>
<link rel="stylesheet" type="text/css" href="source/styles/price.css">

<?php 
  if($lang == 'ru') {
    echo ('<nav> <a href="http://ru.'.$url[1].'.'.$url[2].'/">Главная</a> <a href="http://ru.'.$url[1].'.'.$url[2].'/#say_about_me">Обо мне</a><a href="http://ru.'.$url[1].'.'.$url[2].'/#portfel">Портфолио</a> <a href="http://ru.'.$url[1].'.'.$url[2].'/#review_jak">Отзывы</a><a href="http://ru.'.$url[1].'.'.$url[2].'/price.php">Цены</a>');
  } elseif($lang == 'en') {
    echo ('<nav> <a href="http://en.'.$url[1].'.'.$url[2].'/">Home</a> <a href="http://en.'.$url[1].'.'.$url[2].'/#say_about_me">About me</a><a href="http://en.'.$url[1].'.'.$url[2].'/#portfel">Portfolio</a> <a href="http://en.'.$url[1].'.'.$url[2].'/#review_jak">Reviews</a><a href="http://en.'.$url[1].'.'.$url[2].'/price.php">Price</a>');
  }
?>
  
  <div id="connect">
    <b style="font-weight: 600;"><?php echo get_link('SELECT * FROM `social_net` WHERE name LIKE "phone_number"'); ?></b>
    <button class="open_modal" modal="send_message"><?php echo $alldata['connect']; ?></button>
  </div>
</header>

<section id="sect_start">

  <h1> <?php echo $alldata['phot_price']; ?></h1>
  <div class="price_block">
    <div class="аlignment">

      <div class="first_package package" name="first"> <!--0-1-->
      <h2 number = "0"> <?php echo ($all_data[0]['value']); ?> </h2>
      <h3 number = 1> <?php echo ($all_data[1]['value']); ?> </h3>

      </div>
        <div class="second_package package" name="second"><!--2-7-->
        <h2 number = "0"> <?php echo ($all_data[2]['value']); ?> </h2>
        <ul>
          <li><span number = "1"> <?php echo ($all_data[3]['value']); ?> </span></li>
          <li><span number = "2"> <?php echo ($all_data[4]['value']); ?> </span></li>
          <li><span number = "3"> <?php echo ($all_data[5]['value']); ?> </span></li>
          <li><span number = "4"> <?php echo ($all_data[6]['value']); ?> </span></li>
        </ul>
        <h3 number = 5> <?php echo ($all_data[7]['value']); ?> </h3>
      </div>

      <div class="third_package package" name="thrid"><!--8-14-->
        <h2 number = "0"> <?php echo ($all_data[8]['value']); ?> </h2>
        <ul>
          <li><span number = "1"> <?php echo ($all_data[9]['value']); ?> </span></li>
          <li><span number = "2"> <?php echo ($all_data[10]['value']); ?> </span></li>
          <li><span number = "3"> <?php echo ($all_data[11]['value']); ?> </span></li>
          <li><span number = "4"> <?php echo ($all_data[12]['value']); ?> </span></li>
          <li><span number = "5"> <?php echo ($all_data[13]['value']); ?> </span></li>
        </ul>
        <h3 number = 6> <?php echo ($all_data[14]['value']); ?> </h3>
      </div>

      <div class="last_package package" name="last"><!--15-21-->
        <h2 number = "0"> <?php echo ($all_data[15]['value']); ?> </h2>
          <ul>
          <li><span number = "1"> <?php echo ($all_data[16]['value']); ?> </span></li>
          <li><span number = "2"> <?php echo ($all_data[17]['value']); ?> </span></li>
          <li><span number = "3"> <?php echo ($all_data[18]['value']); ?> </span></li>
          <li><span number = "4"> <?php echo ($all_data[19]['value']); ?> </span></li>
          <li><span number = "5"> <?php echo ($all_data[20]['value']); ?> </span></li>
        </ul>
        <h3 number = 6> <?php echo ($all_data[21]['value']); ?> </h3>
      </div>
      <button class="open_modal" modal="send_message"> Заказать фотосъемку </button>

    </div>
  </div>
</section>

<section class="pharagraph" name = "pharagraph"><!--22-25-->
  <p number = "1"><?php echo ($all_data[22]['value']); ?></p>
  <p number = "2"><?php echo ($all_data[23]['value']); ?></p>
  <p number = "3"><?php echo ($all_data[24]['value']); ?></p>
  <p number = "4"><?php echo ($all_data[25]['value']); ?></p>
</section>

<div class="social_service">
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "mywed"').'"' ?> id="mywed"><?php require_once 'source/mini_svg/mywed.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "instagram"').'"' ?> id="insta"><?php require_once 'source/mini_svg/instagram.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "facebook"').'"' ?> id="facebook"><?php require_once 'source/mini_svg/facebook.php';?></a>
    <a href=<?php echo '"'.get_link('SELECT * FROM `social_net` WHERE name LIKE "vk"').'"' ?> id="vk"><?php require_once 'source/mini_svg/vk.php';?></a>
</div>


<div id="modal_back"> <!--Подложка-->

</div>

<?php 
  require_once 'structure/send_message.php';
?>

<!--Сообщения-->
<div id="message" name="review">
  <p></p>
</div>

<?php 
  require_once 'structure/footer.php';

  if($auth == true) {
    echo ('<script type="text/javascript" src="user-admin/scripts/price_control.js"></script>');
  }
?>

</body>
</html>