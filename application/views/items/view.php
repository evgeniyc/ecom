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
	<div id="item-charact" class="row">
		<div id="charact" class="col-xs-12">
			<h4><center>Характеристики</center></h4>
			<?php 	
				$template = array('table_open'  => '<table class="table-bordered">');
				$this->table->set_template($template);
				$this->table->set_heading('Размеры', 'Диагональ', 'Тип дисплея', 'Размер камеры', 'Емкость батареи', 'Вес');
				$this->db->select('dims, disp, disp_type, cam_size, bat, weight');
				$query = $this->db->get_where('charact', array('id' => $item->charact));
				echo $this->table->generate($query); ?>
		</div>
	</div>
</article>
