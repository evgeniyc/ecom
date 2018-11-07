<article class="col-sm-9">
	<h2>Добавление изображений модели</h2>
<fieldset>
		<legend>Загрузка файла изображения</legend>
		<div class="error"><?php echo $error;?></div>

		<?php echo form_open_multipart('items/upload');?>
			
		<?php foreach($models as $model):
		
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