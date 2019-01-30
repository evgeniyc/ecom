<article class="col-sm-9">
	<h2>Форма входа</h2>
	<fieldset>
		<legend>Заполнить поля</legend>
		
		<?php	echo validation_errors();
				echo form_open('users/login'); 
					$data1 = array(
						'name' => 'login',
						'maxlength' => '16',
						'size' => '16',
						'value' => set_value('login'),
					);
					$data2 = array(
						'name' => 'pass',
						'maxlength' => '16',
						'size' => '16',
					);
					
					$this->table->add_row(form_label('Логин:&nbsp;', 'login'), form_input($data1));
					$this->table->add_row(form_label('Пароль:&nbsp;', 'pass'), form_password($data2));
					$this->table->add_row(form_submit('', 'Войти'));
					echo $this->table->generate();?>
				</form>
	</fieldset>
</article>
