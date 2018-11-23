<article class="col-sm-9">
	<h3>Панель управления</h3>
	<section class="row">
		<fieldset>
			<legend>Управление пользователями</legend>
			<?php	echo anchor('users/index', 'Все пользователи').'&nbsp';
					echo anchor('users/create', 'Добавить пользователя').'&nbsp';
					echo anchor('users/edit', 'Редактировать пользователя').'&nbsp';
					echo anchor('users/delete', 'Удалить пользователя').'&nbsp'; ?>
		</fieldset>
		<fieldset>
			<legend>Управление категориями</legend>
			<?php	echo anchor('cats/index', 'Все категории').'&nbsp';
					echo anchor('cats/create', 'Добавить категорию').'&nbsp';
					echo anchor('cats/edit', 'Редактировать категорию').'&nbsp';
					echo anchor('cats/delete', 'Удалить категорию'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление позициями</legend>
			<?php	echo anchor('items/index', 'Все позиции').'&nbsp';
					echo anchor('items/create', 'Добавить позицию').'&nbsp';
					echo anchor('items/update', 'Редактировать позицию').'&nbsp';
					echo anchor('items/delete', 'Удалить позицию'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление заказами</legend>
			<?php	echo anchor('orders/index', 'Все заказы').'&nbsp';
					echo anchor('orders/index', 'Заказы по пользователю').'&nbsp';
					echo anchor('orders/index', 'Заказы по статусу').'&nbsp';
					echo anchor('users/edit', 'Редактировать заказ').'&nbsp';
					echo anchor('users/delete', 'Удалить заказ'); ?>
		</fieldset>
	</section>
</article>
