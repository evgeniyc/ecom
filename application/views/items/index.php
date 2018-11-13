<article class="col-sm-9">
	<h3>Все модели производителя <?php echo $cat; ?></h3>
	<section class="row no-gutters justify-content-center">
		<?php foreach ($items as $item): ?>
			<div class="product-wrapper">
				<div class="product">
					<a href="../item/view">
						<div id="item-title"><?php echo $item->model;?></div>
						<div id="item-img"><img src="<?php echo base_url()."assets/img/items/".$item->img; ?>" alt=""></div>
						<div id="item-descr"><?php echo $item->descr; ?></div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</article>
