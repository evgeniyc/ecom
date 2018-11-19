<article class="col-sm-9">
	<h2>Удаление пользователя</h2>
	<fieldset>
		<legend>Введите имя пользователя</legend>
		
		<?php	echo validation_errors();
				echo form_open('users/delete'); 
				
				echo form_label('Логин:&nbsp;', 'login');
				$data = array(
					'name' => 'login',
					'maxlength' => '16',
					'size' => '16',
					'value' => set_value('login'),
				);
				echo form_input($data).'<br>';
				
				echo form_submit('', 'Удалить');?>
			</form>
	</fieldset>
</article>
