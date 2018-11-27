<article class="col-12">
	<h3>Панель управления заказами</h3>
	<section class="row">
		<fieldset>
		<legend>Управление заказами</legend>
			<?php	echo anchor('orders/index', 'Все заказы').'&nbsp';
					echo anchor('orders/user', 'Заказы по пользователю').'&nbsp';
					echo anchor('orders/status', 'Заказы по статусу').'&nbsp';
					echo anchor('users/edit', 	'Редактировать заказ').'&nbsp';
					echo anchor('users/delete', 'Удалить заказ'); ?>
		</fieldset>
	</section>
</article>
