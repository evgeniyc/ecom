<article class="col-sm-9">
	<h2>Форма входа</h2>
	<fieldset>
		<legend>Заполнить поля</legend>
		<?php 
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
							);
			echo validation_errors();
			echo form_open('users/login'); 
				$this->table->add_row(form_label('Логин:', 'login'), form_input($login));
				$this->table->add_row(form_label('Пароль:', 'pass'), form_password($pass));
				$this->table->add_row(form_submit('', 'Войти'));
				echo $this->table->generate();
		?>
			</form>
		
	</fieldset>
</article>
