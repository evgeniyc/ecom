<article class="col-sm-9">
	<h2>Мои заказы</h2>
	<div id="item-charact" class="row">
		<div id="charact" class="col-xs-12">
			<h4><center>Пользователь <?php echo $this->session->login; ?></center></h4>
			<?php 	
				$template = array('table_open'  => '<table class="table-bordered" cellpadding=5>');
				$this->table->set_template($template);
				$this->table->set_heading('id', 'Модель', 'Кол-во', 'Цена', 'Дата создания', 'Статус', 'Оплата');
				echo $this->table->generate($orders); ?>
		</div>
	</div>
	<div>
	<?php echo 	form_open('orders/prepare');
					echo form_fieldset('Данные для оплаты через LiqPay');
					echo form_label('Введите номер заказа из первого столбца:&nbsp;', 'order_id');
					echo form_input('order_id').'<br>';
					
					echo form_label('Комментарий к заказу:&nbsp;', 'order_descr');
					echo form_input('order_descr').'<br>';
					
					echo form_button('button', 'Подготовить к оплате', array('id' => 'pay_prepare', 'onClick'=>'send()') );
					echo form_fieldset_close();?>
				</form>
	</div>
	<div id="pay_place"></div>
</article>
<script>
	function send()
	{
		var data = 
		{
			'amount' : $("[name = amount]").val(),
			'order_id' : $("[name = order_id]").val(),
			'order_descr' : $("[name = order_descr]").val()};
		$("#pay_place").load("<?php echo base_url();?>orders/prepare", data);
	}
	
</script>
