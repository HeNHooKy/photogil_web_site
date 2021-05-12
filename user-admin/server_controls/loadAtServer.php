<?php 

	function getAllData($sql) {
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

	function getAllPhotos($sql) {
		$array = getAllData($sql);
				$length = isset($array) ? count($array) : 0;
				$i = 0;

				while($i < $length) {
					$title = $array[$i]['title'];
					$link = $array[$i]['link'];
					$id = $array[$i]['id'];

					echo ('<div class="img_package">');
					echo ('<div class="mom_slash" id='.$id.'><div class="slash_1" class="slash"></div> <div class="slash_2" class="slash"></div></div>');

					echo ('<img class="image" id ='.$id.' title='.$title.' src="../'.$link.'"">');

					echo '</div>';

					$i++;
				}
	}
