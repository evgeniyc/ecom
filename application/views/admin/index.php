<article class="col-sm-9">
	<h3>Панель управления</h3>
	<section class="row">
		<fieldset>
			<legend>Управление пользователями</legend>
			<?php	echo anchor('users/index', 'Все пользователи');
					echo anchor('users/create', 'Добавить пользователя');
					echo anchor('users/edit', 'Редактировать пользователя');
					echo anchor('users/delete', 'Удалить пользователя'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление категориями</legend>
			<?php	echo anchor('cats/index', 'Все категории');
					echo anchor('cats/create', 'Добавить категорию');
					echo anchor('cats/edit', 'Редактировать категорию');
					echo anchor('cats/delete', 'Удалить категорию'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление позициями</legend>
			<?php	echo anchor('items/index', 'Все позиции');
					echo anchor('items/create', 'Добавить позицию');
					echo anchor('items/edit', 'Редактировать позицию');
					echo anchor('items/delete', 'Удалить позицию'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление заказами</legend>
			<?php	echo anchor('orders/index', 'Все заказы');
					echo anchor('orders/index', 'Заказы по пользователю');
					echo anchor('orders/index', 'Заказы по статусу');
					echo anchor('users/edit', 'Редактировать заказ');
					echo anchor('users/delete', 'Удалить заказ'); ?>
		</fieldset>
	</section>
</article>
