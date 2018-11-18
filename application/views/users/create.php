<article class="col-sm-9">
	<h2>Создание пользователя</h2>
	<fieldset>
		<legend>Заполнить поля</legend>
		
		<?php	echo validation_errors();
				echo form_open('users/create'); 
				
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
					'value' => set_value('pass'),
				);
				echo form_input($data).'<br>';
				
				echo form_label('Подтверждение пароля:&nbsp;', 'passconf');
				$data = array(
					'name' => 'passconf',
					'maxlength' => '16',
					'size' => '16',
					'value' => set_value('passconf'),
				);
				echo form_input($data).'<br>';
				
				echo form_label('Email:&nbsp;', 'email');
				$data = array(
					'name' => 'email',
					'maxlength' => '24',
					'size' => '24',
					'value' => set_value('email'),
				);
				echo form_input($data).'<br>';
		
				echo form_submit('', 'Сохранить');?>
	</form>
	</fieldset>
</article>
