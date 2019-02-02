<article class="col-sm-9">
	<h2>Регистрация пользователя</h2>
	<fieldset>
		<legend>Заполнить поля (все обязательно)</legend>
		
		<?php	echo validation_errors();
				echo form_open('users/create'); 
				
				$login = array(
					'name' => 'login',
					'maxlength' => '16',
					'size' => '16',
					'value' => set_value('login'),
				);
				$pass = array(
					'name' => 'pass',
					'maxlength' => '16',
					'size' => '16',
					'value' => set_value('pass'),
				);
				$passconf = array(
					'name' => 'passconf',
					'maxlength' => '16',
					'size' => '16',
					'value' => set_value('passconf'),
				);
				$email = array(
					'name' => 'email',
					'maxlength' => '24',
					'size' => '16',
					'value' => set_value('email'),
				);
				
				$this->table->add_row(form_label('Логин:', 'login'), form_input($login));
				$this->table->add_row(form_label('Пароль:', 'pass'), form_input($pass));
				$this->table->add_row(form_label('Подтверждение пароля:', 'passconf'), form_input($passconf));
				$this->table->add_row(form_label('Email:', 'email'), form_input($email));
				$this->table->add_row(form_label(form_submit('', 'Сохранить')));
				echo $this->table->generate();?>
		</form>
	</fieldset>
</article>


							
							
			
