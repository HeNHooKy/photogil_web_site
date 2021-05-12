<?php
 require_once '../database.php';
 require_once 'isSendReview.php';

 $user_name = trim($_POST["name"]);

 $user_phone = trim($_POST["tel_number"]);

 $user_mail = trim($_POST["email"]);

 $user_review = $_POST["content"];

 $user_lang = trim($_POST["lang"]);

 $user_review = str_replace( '"', "„", $user_review);
 $user_review = str_replace( "'", "`", $user_review);


 if($user_name == '' || $user_phone == '' || $user_mail == '' || $user_review == '' || $user_lang == '') {
 	throw new Exception();
 }

 if($_COOKIE['isSendReview'] == true) {
 	throw new Exception();
 }

 if(!mysqli_query($link, 'INSERT INTO `revieTimed`(`name`, `time`, `phone_number`, `email`, `content`, `lang`) VALUES ("'.$user_name.'","'.time().'", "'.$user_phone.'", "'.$user_mail.'", "'.$user_review.'", "'.$user_lang.'")')) {
 	throw new Exception();
 }

sendReview();