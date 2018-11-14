<article class="col-sm-9">
	<section class="row no-gutters justify-content-center">
		<?php foreach ($cats as $cat): ?>
			<div class="col-sm-6 col-md-4 col-lg-3 items-row">
				<div class="cat">
					<a href="<?php echo "items/index/".$cat->id;?>">
						<div class="cat-title"><?php echo $cat->brand;?></div>
						<div class="cat-img"><img src="<?php echo base_url()."assets/img/logo/".$cat->img; ?>" alt=""></div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</article>