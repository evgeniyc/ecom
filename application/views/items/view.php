<article class="col-sm-9">
	<h2>Категория <?php echo $cat; ?></h2>
	<h3>Модель <?php echo $item->model; ?></h3>
	<div id="item" class="row">
		<div id="item_img" class="col-sm-6">
			<img src="<?php echo base_url()."assets/img/items/".$item->thumb; ?>" alt="">
		</div>
		<div id="item_descr" class="col-sm-6">
			<h4>Описание модели:</h4>
	<?php 	echo $item->descr.'<br>';?>
					
			<br><span id="item-price">Цена: <?php echo $item->price.' грн.'; ?></span><br><br>
			
	<?php	echo form_label('Количество: ', 'qty');
			$data = array(
				'id' => 'qty',
				'name' => 'qty',
                'maxlength' => '3',
				'size' => '3',
				'value' => '1',
			);
			echo form_input($data) ;?>
			<button id="buy" onClick="send()">Добавить в корзину</button></a><br>
			<a href="<?php echo base_url().'orders/create';?>"><button id="buy">Оформить заказ</button></a>
			<a href="/ci"><button id="buy">На главную</button></a><br>
			<div id="result"></div>
		</div>
			
	</div>
	<div id="item-charact" class="row">
		<div id="charact" class="col-xs-12">
			<h4><center>Характеристики</center></h4>
			<?php 	
				$template = array('table_open'  => '<table class="table-bordered" cellpadding=5>');
				$this->table->set_template($template);
				$this->table->set_heading('Размеры', 'Диагональ', 'Тип дисплея', 'Размер камеры', 'Емкость батареи', 'Вес');
				$this->db->select('dims, disp, disp_type, cam_size, bat, weight');
				$query = $this->db->get_where('charact', array('id' => $item->id));
				echo $this->table->generate($query); ?>
		</div>
	</div>
</article>
<script>
function send()
		{
			var data = {};
			data.id = "<?php echo $item->id;?>";
			data.qty = $("#qty").val();
			data.name = "<?php echo $item->model;?>";
			data.price = "<?php echo $item->price;?>";
			$("#result").load("/ci/items/resp", data);
		}
</script>