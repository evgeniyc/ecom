<article class="col-sm-9">
	<h2>Мои заказы</h2>
	<div id="item-charact" class="row">
		<div id="charact" class="col-xs-12">
			<h4><center>Пользователь <?php echo $this->session->name; ?></center></h4>
			<?php 	
				$template = array('table_open'  => '<table class="table-bordered" cellpadding=5>');
				$this->table->set_template($template);
				$this->table->set_heading('id', 'Идентификатор', 'Кол-во', 'Цена', 'Дата создания', 'id пользователя', 'Статус', 'Оплата');
				echo $this->table->generate($orders); ?>
		</div>
	</div>
	<div class="row">
	<?php echo 	form_open('orders/liqpay');
					echo form_label('Введите сумму для оплаты:', 'amount');
					echo form_input('amount');
					
					echo form_label('Введите номер заказа:', 'order_id');
					echo form_input('order_id');
					
					echo form_label('Содержание заказа:', 'order_descr');
					echo form_input('order_descr');
					
					echo form_button('button', 'Подготовить к оплате', array('id' => 'pay_prepare', 'onClick'=>'send()') );?>
				</form>
	</div>
	<div id="pay_place" class="row"></div>
</article>
<script>
	function send()
	{
		var data = 
		{
			'amount' : $("[name = amount]").val(),
			'order_id' : $("[name = order_id]").val(),
			'order_descr' : $("[name = order_descr]").val()};
		$("#pay_place").load("<?php echo base_url().'orders/prepare';?>", data);
	}
	
</script>
