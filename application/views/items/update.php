<article class="col-sm-9">
	<h2>Редактирование модели</h2>
<fieldset>
		<legend>Выберите категорию</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php echo form_open_multipart('items/update');?>
			
		<?php foreach($cats as $cat)
			$options[$cat->id] = $cat->brand;
        
		if (isset($options)):
			echo '<label for="cats">Выберите категорию: </label> ';
			echo form_dropdown('cats', $options);
		endif;?><br>
		
		<?php if (isset($models):
			foreach($models as $model)
				$opt[$model->id] = $model->model;
			echo '<label for="model">Выберите модель: </label> ';
			echo form_dropdown('model', $opt);
			endif;?><br>
		
		<?php if (isset($model)):
		echo '<br><label for="descr">Описание: </label><br>';
				$data = array(
					'id' => 'descr',
					'name' => 'descr',
					);
				$value = $model->descr;
				echo form_textarea($data, $value); ?><br>

		<div class="error"><?php echo $error;?></div>
		<label for="userfile">Изображение</label>
		<input type="file" name="userfile" size="12" /><br />
		
		<label for="price">Цена: </label>
		<input type="text" name="price" size="6"><span> грн.</span><br>
		
		<input type="submit" value="Сохранить" />
		</form>
	</fieldset>
</article>