<?php

require_once('../database.php');

$lang = $_GET['lang'];
$wed = $_GET['wed'];
$desc;

if($lang == 'ru') {
	$desc = 'description';
} elseif($lang == 'en') {
	$desc = 'description_eng';
}

if($description = mysqli_fetch_array(mysqli_query($link, 'SELECT `'.$desc.'` FROM `all_albums` WHERE `name` LIKE "'.$wed.'"'))) {
	echo $description[0];
}

