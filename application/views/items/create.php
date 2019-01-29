<article class="col-sm-9">
	<h2>Добавление изображений модели</h2>
<fieldset>
		<legend>Создание модели</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php echo form_open_multipart('items/create');
			
		foreach($cats as $cat)
			$options[$cat->id] = $cat->brand;
        
		if (isset($options)):
			echo form_label('Выберите категорию:&nbsp;');
			echo form_dropdown('cats', $options);
		endif;
		echo br();
		
		echo form_label('Введите наименование модели:&nbsp;','model');
		$data = array(
			'name' => 'model',
			'size' => 12,
			'value' => set_value('model'),
		);
		echo form_input($data);
		echo br();
		
		echo form_label('Введите описание:&nbsp;','descr');
		echo br();
        $data = array(
				'name' => 'descr',
				'value' => set_value('descr'),
				);
		echo form_textarea($data);
		echo br();
		echo '<div class="error">'.$error.'</div>';
		echo form_label('Выберите изображение:&nbsp;','userfile');
		$data = array(
			'name' => 'userfile',
			'size' => 12,
		);
		echo form_upload($data);
		echo br();
		echo form_label('Введите цену:&nbsp;', 'price');
		$data = array(
			'name' => 'price',
			'size' => 6,
			'value' => set_value('price'),
		);
		echo form_input($data).'<span> грн.</span>';
		echo br();
		echo form_submit('', 'Сохранить');?>
		</form>
	</fieldset>
</article>