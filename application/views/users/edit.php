<article class="col-sm-9">
	<h2>Изменение статуса пользователя</h2>
	<fieldset>
		<legend>Заполнить поля</legend>
		
		<?php	echo validation_errors();
				echo form_open('users/edit'); 
				
				echo form_label('Идентификатор:&nbsp;', 'id');
				$data = array(
					'name' => 'id',
					'maxlength' => '5',
					'size' => '5',
					'value' => set_value('id'),
				);
				echo form_input($data).'<br>';
				
				echo form_label('Статус:&nbsp;', 'status');
				$options['user'] = 'user';
				$options['editor'] = 'editor';
				$options['admin'] = 'admin';
        		echo form_dropdown('status', $options);
				echo br();
				
				echo form_submit('', 'Сохранить');?>
		</form>
	</fieldset>
</article>
