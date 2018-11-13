<article class="col-sm-9">
	<h2>Создание модели</h2>
	<fieldset>
		<legend>Характеристики модели</legend>
		<div class="error"><?php echo validation_errors(); ?></div>

		<?php echo form_open('items/create'); ?>

		<?php foreach($cats as $cat):
			$options[$cat->id] = $cat->brand;
        endforeach;
		
		if (isset($options)):
			echo '<label for="cat">Выберите категорию: </label> ';
			echo form_dropdown('cat', $options);
		endif;?><br>


		<label for="model">Введите наименование: </label>
		<input type="text" name="model" size="12"><br>
					
		<label for="descr">Введите описание: </label><br>
		<?php $data = array(
						'name' => 'descr',
						'id' => 'form_descr',
						'rows' => '10',
						'cols' => '45',
						);
				echo form_textarea($data); ?><br>
		<input type="submit" name="submit" value="Создать">
		</form>
	</fieldset><br>
</article>
   