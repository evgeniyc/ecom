<article class="col-sm-9">
	<h2>Создание категории</h2>
	<fieldset>
		<legend>Наименование бренда</legend>
		<div class="error"><?php echo validation_errors(); ?></div>

		<?php echo form_open('cats/create'); ?>

			<label for="brand">Наименование бренда</label>
			<input type="text" name="brand" size="12"><br>
			<input type="submit" name="submit" value="Создать">

		</form>
	</fieldset><br>
	<fieldset>
		<legend>Загрузка файла изображения</legend>
		<div class="error"><?php echo $error;?></div>

		<?php echo form_open_multipart('cats/upload');?>
			
		<?php foreach($cats as $cat):
		
		$options[$cat->id] = $cat->brand;
        
		endforeach;
		
		if (isset($options)):
			echo '<label for="cats">Выберите категорию</label> ';
			echo form_dropdown('cats', $options);
		endif;?><br>

			<label for="userfile">Добавить изображение</label>
			<input type="file" name="userfile" size="12" />
			<br />
			<input type="submit" value="Загрузить" />
		</form>
	</fieldset>
</article>
   