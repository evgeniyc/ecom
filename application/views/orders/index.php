<article class="col-sm-9">
	<h2>Все заказы</h2>
	<div id="item-charact" class="row">
		<div id="charact" class="col-xs-12">
			<h4><center>Заказы</center></h4>
			<?php 	
				$template = array('table_open'  => '<table class="table-bordered" cellpadding=5>');
				$this->table->set_template($template);
				$this->table->set_heading('id', 'Идентификатор', 'Кол-во', 'Цена', 'Дата создания', 'id пользователя', 'Статус');
				echo $this->table->generate($orders); ?>
		</div>
	</div>
</article>