<article class="col-sm-9">
	<h3>Это вывод категории $cat</h3>
	<section class="row no-gutters justify-content-center">
		<?php foreach ($items as $item): ?>
			<div id="items-row" class="col-sm-6 col-md-4 col-lg-3">
				<div id="item">
					<a href="../item/view">
						<div id="item-title"><?php echo $item->model;?></div>
						<div id="item-img"><img src="<?php echo base_url()."assets/img/items/".$item->img; ?>" alt=""></div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</article>
