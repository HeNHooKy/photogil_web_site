<div class="adminPanelPage">

	<section>
		<h2> Welcome Daria </h2>
		<h3> Новые отзывы </h3>
		<section id = "review">
			<div id="review_block" <?php $array = get_review('SELECT * FROM revieTimed'); $length = count($array); echo 'data-number="'.$length.'"';?> >
				
				<div id="block_next"> <div id="next"> </div> </div>
				<div id="block_prev"> <div id="prev"> </div> </div>
				<?php
				
				$i = 0;
				if($length>0) {
					while($i < $length) {
						$name = $array[$i]['name'];
						$link = $array[$i]['link'];
						$content = $array[$i]['content'];
						$email = $array[$i]['email'];
						$tel = $array[$i]['phone_number'];
						$id = $array[$i]['id'];

						echo ('<div class="review_content" number="'.$i.'" id="'.$id.'"');
						if($i == 0) {
							echo ' style="display: inline-block;"';
						}
						echo ('> <img src="../'.$link.'" alt="review img"> <h3> '.$name.' </h3> <p>'.$content.'</p> <i>email: '.$email.'; </i> <i> телефон: '.$tel.';</i> </div>');
						$i++;
					}
				}	else {
					echo "Новых отзывов нет";
				}
				 ?>
			</div>
			<div class="control_package">
				<button class="delete_review" review-id=<?php echo ('"'.$array[0]['id'].'"') ?> > Удалить отзыв </button>
				<button class="complite_review" review-id=<?php echo ('"'.$array[0]['id'].'"') ?> > Одобрить отзыв </button>
			</div>
		</section>
		

		<form id="base_info">

		<p> Загрузить новое центральное фото </p>
		<h3> Фото-презентация портфолио </h3>

		<div>
			<h4> Свадьбы и love story </h4>
			<input type="file" name="love">
		</div>

		<div>
			<h4> Семейные фотосессии </h4>
			<input type="file" name="family">
		</div>

		<div>
			<h4> Портреты </h4>
			<input type="file" name="portret">
		</div>

		<button> Save all </button>

		</form>

		<form id="my_info">
			<h3> Информация обо мне </h3>

			<div>
				<label for="telephone">Телефон</label>
				<input type="text" name="telephone">
			</div>

			<div>
				<h4> Социальные сети </h4>

				<div>
					<label for="mywed">MyWed</label>
					<input type="text" name="mywed">
				</div>

				<div>
					<label for="inta">Instagram</label>
					<input type="text" name="inta">
				</div>

				<div>
					<label for="facebook">Facebook</label>
					<input type="text" name="facebook">
				</div>

				<div>
					<label for="vk">vkontakte</label>
					<input type="text" name="vk">
				</div>

			</div>

			<div>
				<label for="about_me">Обо мне</label>
				<input type="text" name="about_me">
			</div>

			<div>
				<label for="city">Где я сейчас?</label>
				<input type="text" name="city">
			</div>

			<button> Save changes </button>

		</form>

	</section>
</div>