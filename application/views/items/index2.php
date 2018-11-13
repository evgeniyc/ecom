<article class="col-sm-9">
	<h3>Все модели производителя <?php echo $cat; ?></h3>
	<div class="layout-buttons">
		<span class="active icon icon-list"><i class="fas fa-home"></i></span>
		<span class="icon icon-table"><i class="fas fa-phone"></i></span>
	</div>
	<ul class="products clearfix">
		<?php foreach ($items as $item): ?>
			<li class="product-wrapper">
				<a href="" class="product">
					<div class="product-photo">
						<img src="<?php echo base_url()."assets/img/items/".$item->img; ?>" alt="">
					</div>
					<p><?php echo $item->descr; ?></p>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</article>