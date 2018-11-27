<article class="col-sm-9">
	<h2>Операции с изображением</h2>
	<fieldset>
		<legend>Загрузка файла изображения</legend>
		<div class="error"><?php echo $error;?></div>

		<?php echo form_open_multipart('cats/upload');?>
			
		<?php foreach($cats as $cat)
				$options[$cat->id] = $cat->brand;
			echo form_label('Выберите категорию: ', 'cats');
			echo form_dropdown('cats', $options);
			echo '<br>';

			echo form_label('Добавить изображение: ', 'userfile');
			$data = array(
				'name' => 'userfile',
				'size' => '12',
			);
			echo form_upload($data);
			echo '<br>';
			echo form_submit('submit', 'Сохранить');?>
			
		</form>
	</fieldset>
</article>
   