	<section class="row" id="love">
		<h2> Свадьбы и love story </h2>

		<article class="view">

			<?php 
				getAllPhotos('SELECT * FROM love');
			?>
			
		</article>

		<article class="upload">

			<form class="upload_form" method="POST" action="server_controls/uploadInServer.php" enctype="multipart/form-data">
			  Рекомендуемое разрешение изображений: <i>960х600;</i> <br />
			  Рекомендуемый формат изображений: <i>.jpg</i> <br />
			  <b>Каждый файл должен иметь отличное от других имя, иначе - замещение.</b> <br />
			  Файлы:<br />
			  <input name="userfile[]" type="file" multiple="true" required="true" /><br />
			  <input type="text" value="love" hidden="true" name="sql"/>
			  <input type="text" value="wed" hidden="true" name="page"/>
			  <input type="submit" value="Отправить" />
			</form>
			
		</article>
		
	</section>

	<section class="row" id="family">
		<h2> Семейные фотосессии </h2>

		<article class="view" >

			<?php 
				getAllPhotos('SELECT * FROM family');
			?>
			
		</article>

		<article class="upload">

			<form class="upload_form" method="POST" action="server_controls/uploadInServer.php" enctype="multipart/form-data">
			  Рекомендуемое разрешение изображений: <i>960х600;</i> <br />
			  Рекомендуемый формат изображений: <i>.jpg</i> <br />
			  <b>Каждый файл должен иметь отличное от других имя, иначе - замещение.</b> <br />
			  Файлы:<br />
			  <input name="userfile[]" type="file" multiple="true" required="true" /><br />
			  <input type="text" value="family" hidden="true" name="sql"/>
			  <input type="text" value="wed" hidden="true" name="page"/>
			  <input type="submit" value="Отправить" />
			</form>
			
		</article>
		
	</section>

	<section class="row" id="portret">
		<h2> Портреты </h2>

		<article class="view" >

			<?php 
				getAllPhotos('SELECT * FROM portret');
			?>
			
		</article>

		<article class="upload">

			<form class="upload_form" method="POST" action="server_controls/uploadInServer.php" enctype="multipart/form-data">
			  Рекомендуемое разрешение изображений: <i>960х600;</i> <br />
			  Рекомендуемый формат изображений: <i>.jpg</i> <br />
			  <b>Каждый файл должен иметь отличное от других имя, иначе - замещение.</b> <br />
			  Файлы:<br />
			  <input name="userfile[]" type="file" multiple="true" required="true" /><br />
			  <input type="text" value="portret" hidden="true" name="sql"/>
			  <input type="text" value="wed" hidden="true" name="page"/>
			  <input type="submit" value="Отправить" />
			</form>
			
		</article>
		
	</section>