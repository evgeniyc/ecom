<article class="col-12">
	<h3>Панель управления</h3>
	<section class="row">
		<fieldset>
			<legend>Управление пользователями</legend>
			<?php	echo anchor('users/index', '<button>Все</button>').'&nbsp';
					echo anchor('users/create', '<button>Добавить</button>').'&nbsp';
					echo anchor('users/edit', '<button>Редактировать</button>').'&nbsp';
					echo anchor('users/delete', '<button>Удалить</button>').'&nbsp'; ?>
		</fieldset>
		<fieldset>
			<legend>Управление категориями</legend>
			<?php	echo anchor('cats/create', '<button>Добавить</button>').'&nbsp';
					echo anchor('cats/upload', '<button>Изменить</button>').'&nbsp';
					echo anchor('cats/update', '<button>Редактировать</button>').'&nbsp';
					echo anchor('cats/delete', '<button>Удалить</button>'); ?>
		</fieldset>
		<fieldset>
			<legend>Управление моделями</legend>
<<<<<<< HEAD
			<?php	echo anchor('items/create', '<button>Добавить</button>').'&nbsp';
					echo anchor('items/update', '<button>Редактировать</button>').'&nbsp';
					echo anchor('items/editimg', '<button>Изображение</button>').'&nbsp';
					echo anchor('items/charact', '<button>Характеристики</button>').'&nbsp';
					echo anchor('items/updatecharact', '<button>Редактировать характеристики</button>').'&nbsp';
					echo anchor('items/delete', '<button>Удалить</button>'); ?>
=======
			<?php	echo anchor('items/create', 'Добавить модель').'&nbsp';
					echo anchor('items/update', 'Редактировать модель').'&nbsp';
					echo anchor('items/editimg', 'Редактировать изображение').'&nbsp';
					echo anchor('items/charact', 'Добавить характеристики').'&nbsp';
					echo anchor('items/updatecharact', 'Редактировать характеристики').'&nbsp';
					echo anchor('items/delete', 'Удалить модель'); ?>
>>>>>>> 1cc5254f9b3b65006eb7e1d77cea78d66c87972f
		</fieldset>
		<fieldset>
			<legend>Управление заказами</legend>
			<?php	echo anchor('orders/index', '<button>Все</button>').'&nbsp';
					echo anchor('orders/orders_user', '<button>По пользователю</button>').'&nbsp';
					echo anchor('orders/orders_status', '<button>По статусу</button>').'&nbsp';
					echo anchor('users/edit', 	'<button>Редактировать</button>').'&nbsp';
					echo anchor('users/delete', '<button>Удалить</button>'); ?>
		</fieldset>
	</section>
</article>
