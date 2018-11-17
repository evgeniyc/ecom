<article class="col-sm-9">
	<h2>Редактирование характеристик модели</h2>
<fieldset>
		<legend>Выбор модели</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php echo form_open('items/updatecharact');?>
			
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
						echo form_dropdown('mod', $opt);?>
					
</fieldset>	
			<?php 	if(!empty($charact)): ?>
<fieldset>
		<legend>Характеристики модели</legend>	
			
	<?php	
			echo form_hidden('id', $charact->id);
			echo form_label('Размеры д*ш*в: ', 'dims');
			$data = array(
				'name' => 'dims',
                'maxlength' => '12',
				'size' => '12',
				
			);
			echo form_input('dims', $charact->dims).'<br>';
			echo form_label('Диагональ: ', 'disp');
			$data = array(
				'name' => 'disp',
                'maxlength' => '5',
				'size' => '5',
			);
			echo form_input('disp', $charact->disp).'<br>';
			echo form_label('Технология митрицы: ', 'disp_type');
			$data = array(
				'name' => 'disp_type',
                'maxlength' => '5',
				'size' => '5',
			);
			echo form_input('disp_type',$charact->disp_type).'<br>';
			echo form_label('Размер камеры: ', 'cam_size');
			$data = array(
				'name' => 'cam_size',
                'maxlength' => '5',
				'size' => '5',
			);
			echo form_input('cam_size', $charact->cam_size).'<br>';
			echo form_label('Емкость батареи: ', 'bat');
			$data = array(
				'name' => 'bat',
                'maxlength' => '5',
				'size' => '5',
			);
			echo form_input('bat', $charact->bat).'<br>';
			echo form_label('Вес: ', 'weight');
			$data = array(
				'name' => 'weight',
                'maxlength' => '5',
				'size' => '5',
			);
			echo form_input('weight', $charact->weight).'<br>';
					endif;
					endif;?>	
		<input type="submit" value="<?php echo empty($charact) ? 'Загрузить' : 'Сохранить';?>" />
		</form>
</fieldset>
					
</article>