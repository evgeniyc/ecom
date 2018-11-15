<article class="col-sm-9">
	<h2>Добавление изображений модели</h2>
<fieldset>
		<legend>Создание модели</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php echo form_open_multipart('items/upload');?>
			
		<?php foreach($cats as $cat)
			$options[$cat->id] = $cat->brand;
        
		if (isset($options)):
			echo '<label for="cats">Выберите категорию: </label> ';
			echo form_dropdown('cats', $options);
		endif;?><br>
		
		<label for="model">Введите наименование модели: </label>
		<input type="text" name="model" size="12"><br>
		
        <br><label for="descr">Введите описание: </label><br>
		<?php	$data = array(
						'name' => 'descr',
						);
				echo form_textarea($data); ?><br>

		<div class="error"><?php echo $error;?></div>
		<label for="userfile">Выберите изображение</label>
		<input type="file" name="userfile" size="12" /><br />
		
		<input type="submit" value="Сохранить" />
		</form>
	</fieldset>
</article>