<article class="col-sm-9">
	<h2>Форма входа</h2>
	<fieldset>
		<legend>Заполнить поля</legend>
		
		<?php	echo validation_errors();
				echo form_open('users/login'); 
				
					echo form_label('Логин:&nbsp;', 'login');
					$data = array(
						'name' => 'login',
						'maxlength' => '16',
						'size' => '16',
						'value' => set_value('login'),
					);
					echo form_input($data).'<br>';
					
					echo form_label('Пароль:&nbsp;', 'pass');
					$data = array(
						'name' => 'pass',
						'maxlength' => '16',
						'size' => '16',
					);
					echo form_password($data).'<br>';
					
					echo form_submit('', 'Войти');?>
				</form>
	</fieldset>
</article>
