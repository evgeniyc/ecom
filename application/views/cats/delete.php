<article class="col-sm-9">
	<h2>Редактирование категории</h2>
	<fieldset>
		<legend>Наименование бренда</legend>
		<div class="error"><?php echo validation_errors(); ?></div>

		<?php 	echo form_open('cats/delete');
				foreach($cats as $cat)
					$options[$cat->id] = $cat->brand;
				echo form_label('Выберите категорию: ', 'cats');
				if(!empty($options))
					echo form_dropdown('cats', $options).'<br>';
				echo form_submit('submit', 'Удалить');?>
		</form>
	</fieldset><br>
</article>
   