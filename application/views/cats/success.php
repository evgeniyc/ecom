<article class="col-sm-9">
	<h2>Данные успешно сохранены!</h2>
	<p><?php echo anchor('cats/create', 'Создать категорию'); ?></p>
	<p><?php echo anchor('cats/update', 'Редактировать категорию'); ?></p>
	<p><?php echo anchor('cats/upload', 'Редактировать изображение'); ?></p>
	<?php if(isset($resp));?>
</article>