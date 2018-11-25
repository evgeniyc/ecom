<article class="col-sm-9">
	<h2>Редактирование категории</h2>
	<fieldset>
		<legend>Наименование бренда</legend>
		<div class="error"><?php echo validation_errors(); ?></div>

		<?php 	echo form_open('cats/update');
				foreach($cats as $cat)
					$options[$cat->id] = $cat->brand;
				echo form_label('Выберите категорию: ', 'cats');
				echo form_dropdown('cats', $options);
				echo '<br>';
				if(!empty($category)):
					echo form_label('Измените наименование: ', 'brand');
						$data = array(	
							'name' => 'brand',
							'maxlength' => '12',
							'size' => '12',
							'value' => $category->brand,
						);
					echo form_input($data);
				endif;
				$sub = empty($category) ? 'Загрузить' : 'Сохранить';
				echo form_submit('submit', $sub);?>
		</form>
	</fieldset><br>
</article>
   