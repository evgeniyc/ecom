<article class="col-sm-9">
	<h3>Модель <?php echo $model; ?></h3>
	<div id="item" class="row">
		<div id="item_img" class="sm-6">
			<img src="<?php echo base_url()."assets/img/items/".$item->img; ?>" alt="">
		</div>
		<div id="item_descr" class="sm-6">
			<?php echo $item->descr; ?><
		</div>
	</div>
	<div id="item-charact" class="row"><?php echo $item-charact; ?></div>
</article>
