<?php 
	require_once 'source/php/database.php';
	require_once 'source/php/index/get_content.php';
?>
<!DOCTYPE html>
<html>
<?php 
	require_once 'structure/header.php';
?>
<link rel="stylesheet" type="text/css" href="source/styles/eng.css">
<div class="language"> <!--Устанавливаем язык-->
    <a id="en" href="eu.php">
      <b>EN</b>
    </a>

    <a id="ru"  href="photodaria.com">
      <b>RU</b>
    </a>
</div>

<nav> 
  <a>Home</a>
  <a>About me</a>
  <a>Portfolio</a>
  <a>Price</a>
  <a>Blog</a>
  <a>Contacts</a>
</nav>
  <div id="connect">
    <b style="font-weight: 600;">+7 921 565273</b>
    <button>Contact</button>
  </div>
</header>
<section id="sect_start">
  <h1> Photograph on a Kipr </h1>
  <div id="photo_1" style="background: url(<?php echo get_link('SELECT * FROM photos WHERE name like "photo_1"') ?>);"></div>
</section>

  <h2> About me </h2>
 
<section id="about_me">
  
  <img alt="Фотография Дарьи Гилёвой" src="photos/dasha.jpg" id="photo_face">
    <p>  <?php 
    echo get_content("SELECT * FROM eng WHERE name like 'about_me'");
    ?> </p>
    <button> Order to photography </button>
</section>

  <h2> Portfolio </h2>

<section id="portfolio">

  <a href="album_love.html" class="portfolio_block">
    <h4> Weddings and love story </h4>
    <div class="port_brick">
    	<img alt="Фотография свадьбы или love story" src="photos/block1_love.jpg"> 
    	<div class="photo_shadow"> </div>
    </div>
    
  </a>
  <a href="album_family.html" class="portfolio_block">
    <h4> Family fotosession </h4>
    <div class="port_brick">
    	<img alt="Семейные фотосессии" src="photos/block2_family.jpg"> 
    	<div class="photo_shadow"> </div>
    </div>
    
  </a>
  <a href="album_portret.html" class="portfolio_block">
    <h4> Portrets </h4>
    <div class="port_brick">
    	<img alt="Портет женщины или мужчины" src="photos/block3_portret.jpg"> 
    	<div class="photo_shadow"> </div>
    </div>
  </a>

</section>

	<h2> Reviews </h2>

<section id = "review">
	
	<div id="review_block" <?php //Вставляем число отзывов
		$array = get_review('SELECT * FROM review_eu');
		$length = count($array);
		echo 'data-number="'.$length.'"';
		echo '>';
	?>
		
		<div id="block_next"> <div id="next"> </div> </div>
		<div id="block_prev"> <div id="prev"> </div> </div>
		<?php
		
		$i = 0;

			while($i < $length) {
				$name = $array[$i]['name'];
				$link = $array[$i]['link'];
				$content = $array[$i]['content'];

				echo '<div class="review_content" number="';
				echo $i;
				echo '" ';
				if($i == 0) {
					echo 'style="display: inline-block;"';
				}
				echo'>';
				echo '<img src="';
				echo $link;
				echo '" alt="review img">';
				echo '<h3>';
				echo $name;
				echo '</h3>';
				echo '<p>';
				echo $content;
				echo '</p>';
				echo '</div>';
				$i++;
			}
		 ?>
			<a id="give_review" modal="send_review"> Send review </a>
		</div>
		
	</div>

</section>


<div class="social_service">
    <a href="#" id="mywed"><?php require_once 'source/mini_svg/mywed.php';?></a>
    <a href="#" id="insta"><?php require_once 'source/mini_svg/instagram.php';?></a>
    <a href="#" id="facebook"><?php require_once 'source/mini_svg/facebook.php';?></a>
    <a href="#" id="vk"><?php require_once 'source/mini_svg/vk.php';?></a>
  </div>

<?php 
	require_once 'structure/footer.php';
?>
</body>
</html>

