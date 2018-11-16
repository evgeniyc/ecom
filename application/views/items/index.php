<article class="col-sm-9">
	<h3>Все модели производителя <?php echo $cat; ?></h3>
	<section class="row no-gutters justify-content-center">
		<?php foreach ($items as $item): ?>
			<div class="col-sm-6 col-md-4 col-lg-3 items-row">
				<div class="item">
					<a href="/ci/item/view/<?php echo $item->id; ?>">
						<div class="item-title"><?php echo $item->model;?><span><?php echo $item->price;?>грн.</span></div>
						<div class="item-img"><img src="<?php echo base_url()."assets/img/items/".$item->img; ?>" alt=""></div>
						<div class="item-descr"><?php echo $item->descr; ?></div>
					</a>
					<div class="buttons">
						<button class="buy">Купить</button>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</article>
