<article class="col-sm-9">
	<h2>Добавление изображений модели</h2>
<fieldset>
		<legend>Загрузка файла изображения</legend>
		<div class="error"><?php echo $error;?></div>

		<?php echo form_open_multipart('item/upload');?>
			
		<?php foreach($cats as $cat)
			$options[$cat->id] = $cat->brand;
        
		if (isset($options)):
			echo '<label for="cats">Выберите категорию: </label> ';
			echo form_dropdown('cats', $options);
		endif;?><br>
		<?php foreach($models as $model)
			$opt[$model->id] = $model->model;
        
		if (isset($opt)):
			echo '<label for="models">Выберите модель: </label> ';
			echo form_dropdown('models', $opt);
			echo '<br><label for="descr">Введите описание: </label><br>';
			$data = array(
						'name' => 'descr',
						);
			echo form_textarea($data); 
			echo '<br>';
				
			echo '<label for="userfile">Добавить изображение</label>';
			echo '<input type="file" name="userfile" size="12" /><br />';
		endif;
			$sub = (empty($models)) ? "Загрузить" : "Сохранить"; ?>
			<input type="submit" value="<?php echo $sub; ?>" />
		</form>
	</fieldset>
</article>