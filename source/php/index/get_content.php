<?php
	function get_content($sql) {

		global $link;

		$query = mysqli_query($link, $sql);

		$assoc_array = mysqli_fetch_assoc($query);

		return $assoc_array['content'];
	}

	function get_link($sql) {

		global $link;

		$query = mysqli_query($link, $sql);

		$assoc_array = mysqli_fetch_assoc($query);

		return $assoc_array['link'];
	}
	
	function get_review($sql) {

		global $link;

		$query = mysqli_query($link, $sql);

		while($assoc_array = mysqli_fetch_array($query)) {
			$allray[] = $assoc_array;
		}
		if(isset($allray)) {
			return $allray;
		}
		return;
	}