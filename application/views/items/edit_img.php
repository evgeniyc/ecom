<article class="col-sm-9">
	<h2>Редактирование изображений модели</h2>
<fieldset>
		<legend>Выбор модели</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php 	echo form_open_multipart('items/editimg');?>
			
		<?php 	foreach($cats as $cat)
					$options[$cat->id] = $cat->brand;
        
				if (isset($options)):
					echo '<label for="cats">Выберите категорию: </label> ';
					echo form_dropdown('cats', $options);
				endif;?><br>
		<?php 	if (!empty($models)):
					foreach($models as $model)
						$opt[$model->id] = $model->model;
					echo '<label for="model">Выберите модель: </label> ';
					echo form_dropdown('model', $opt);
				endif;?>
		<div class="error"><?php echo $error;?></div>
		<label for="userfile">Выберите новое изображение: </label>
		<input type="file" name="userfile" size="12" /><br />
		
		<input type="submit" value="<?php echo empty($model) ? 'Выбрать модель' : 'Сохранить изменения';?>" />
		</form>
	</fieldset>
</article>