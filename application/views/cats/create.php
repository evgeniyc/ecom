<article class="col-sm-9">
	<h2>Добавление изображений модели</h2>
<fieldset>
		<legend>Создание модели</legend>
		<div class="error"><?php echo validation_errors(); ?></div>
		
		<?php echo form_open_multipart('cats/create');
			
		echo form_label('Введите наименование категории:&nbsp;','brand');
		$data = array(
			'name' => 'brand',
			'size' => 12,
		);
		echo form_input($data);
		echo br();
		
		echo '<div class="error">'.$error.'</div>';
		echo form_label('Выберите изображение:&nbsp;','userfile');
		$data = array(
			'name' => 'userfile',
			'size' => 12,
		);
		echo form_upload($data);
		echo br();
		
		echo form_submit('', 'Сохранить');?>
		</form>
	</fieldset>
</article>