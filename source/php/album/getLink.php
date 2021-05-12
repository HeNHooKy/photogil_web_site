<?php

require_once('../database.php');

if(isset($_GET['page']) && !empty($_GET['page'])) { 

	$wed = $_GET['wed'];

	$page = $_GET['page'];
	
	$id_end = 10*$page;
	
	if($page >= 2) {
		$id_start = $id_end-10;
	} 
	else {
		$id_start = 0;
	}

$sql = 'SELECT link FROM `'.$wed.'` LIMIT ' . $id_start . ', ' . $id_end;

$query = mysqli_query($link, $sql);

while($array = mysqli_fetch_array($query)) {

	$urls[] = $array['link'];

}
if(isset($urls)) {
	echo json_encode($urls);
}
}

?>