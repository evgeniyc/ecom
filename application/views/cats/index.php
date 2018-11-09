<article class="col-sm-9">
	<section class="row no-gutters justify-content-center">
		<?php foreach ($cats as $cat): ?>
			<div id="items-row" class="col-sm-6 col-md-4 col-lg-3">
				<div id="item">
					<a href="<?php echo "../items/".$cat->id;?>">
						<div id="item-title"><?php echo $cat->brand;?></div>
						<div id="item-img"><img src="<?php echo base_url()."assets/img/logo/".$cat->img; ?>" alt="<?php echo $cat->img; ?>"></div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</article>
