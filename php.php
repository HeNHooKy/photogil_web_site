<?php
	require_once('source/php/database.php');

	$query = mysqli_query($link, $sql);

	while($assoc_array = mysqli_fetch_row($query, MYSQL_ASSOC)) {
		$allray[] = $assoc_array;
	}

	return $allray;
?>