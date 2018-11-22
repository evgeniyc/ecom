<article class="col-sm-9">
	<section>
		<h2>Все пользователи</h2>
			<div id="users">
				<?php 	
				$template = array('table_open'  => '<table class="table-bordered" cellpadding=5>');
				$this->table->set_template($template);
				$this->table->set_heading('id', 'Логин', 'email', 'Статус');
				echo $this->table->generate($users); ?>
				
			</div>
	</section>
</article>