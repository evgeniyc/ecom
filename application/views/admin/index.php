<article class="col-12">
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
			<?php	echo anchor('cats/create', 'Добавить категорию').'&nbsp';
					echo anchor('cats/upload', 'Изменить изображение').'&nbsp';
					echo anchor('cats/update', 'Редактировать категорию').'&nbsp';
					echo anchor('cats/delete', 'Удалить категорию'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление моделями</legend>
			<?php	echo anchor('items/create', 'Добавить модель').'&nbsp';
					echo anchor('items/update', 'Редактировать модель').'&nbsp';
					echo anchor('items/editimg', 'Редактировать изображение').'&nbsp';
					echo anchor('items/charact', 'Добавить характеристики').'&nbsp';
					echo anchor('items/updatecharact', 'Редактировать характеристики').'&nbsp';
					echo anchor('items/delete', 'Удалить модель'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление заказами</legend>
			<?php	echo anchor('orders/index', 'Все заказы').'&nbsp';
					echo anchor('orders/orders_user', 'Заказы по пользователю').'&nbsp';
					echo anchor('orders/orders_status', 'Заказы по статусу').'&nbsp';
					echo anchor('users/edit', 	'Редактировать заказ').'&nbsp';
					echo anchor('users/delete', 'Удалить заказ'); ?>
		</fieldset>
	</section>
</article>
