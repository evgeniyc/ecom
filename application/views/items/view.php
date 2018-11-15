<article class="col-sm-9">
	<h2>Категория <?php echo $cat; ?></h2>
	<h3>Модель <?php echo $item->model; ?></h3>
	<div id="item" class="row">
		<div id="item_img" class="col-sm-6">
			<img src="<?php echo base_url()."assets/img/items/".$item->thumb; ?>" alt="">
		</div>
		<div id="item_descr" class="col-sm-6">
			<h4>Описание модели:</h4>
			<?php echo $item->descr; ?>
		</div>
	</div>
	<div id="item-charact" class="row"><?php //echo $item-charact; ?></div>
</article>
