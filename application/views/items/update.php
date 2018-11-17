<article class="col-sm-9">
	<h2>Редактирование модели</h2>
<fieldset>
		<legend>Выберите категорию</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php echo form_open('items/update');?>
			
			<?php foreach($cats as $cat)
				$options[$cat->id] = $cat->brand;
			
			if (isset($options)):
				echo '<label for="cats">Выберите категорию: </label> ';
				echo form_dropdown('cats', $options);
			endif;?><br>
			
			<?php 	if (!empty($models)):
						foreach($models as $mod)
							$opt[$mod->id] = $mod->model;
						echo '<label for="mod">Выберите модель: </label> ';
						echo form_dropdown('mod', $opt);
					endif;
					if (!empty($model)):
						echo '<br><label for="model">Отредактируйте наименование модели: </label>';
						echo '<input type="text" name="model" size="12" value="'.$model->model.'"><br>';
						echo '<br><label for="descr">Описание: </label><br>';
						$data = array(
							'name' => 'descr',
							);
						$value = $model->descr;
						echo form_textarea($data, $model->descr).'<br>';	
						echo '<br><label for="price">Цена: </label>';
						echo form_input('price', $model->price) . '<span> грн.</span><br>';
					endif;
			echo form_submit('submit', empty($model) ? 'Догрузить' : 'Сохранить');
		echo form_close();?>
	</fieldset>
			<?php 	echo anchor('items/editimg', 'Изменить изображение'); ?>
</article>