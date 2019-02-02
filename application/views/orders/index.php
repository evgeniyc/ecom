<article class="col-sm-9">
	<h2>Все заказы</h2>
	<div id="item-charact" class="row">
		<div id="charact" class="col-xs-12">
			<h4><center>Заказы</center></h4>
			<?php 	
				$template = array('table_open'  => '<table class="table-bordered" cellpadding=5>');
				$this->table->set_template($template);
				$this->table->set_heading('id', 'Модель', 'Кол-во', 'Цена', 'Дата создания', 'id пользователя', 'Статус');
				echo $this->table->generate($orders); ?>
		</div>
	</div>
	<fieldset>
		<legend>Сортировка заказов</legend>
		
		<?php	echo validation_errors();
				echo form_open('orders'); ?>
				<table>
					<tr>
						<td>
				<?php		echo form_label('Идентификатор пользователя:&nbsp;', 'id'); ?>
						</td>
						<td>
				<?php		$data = array(
								'name' => 'id',
								'maxlength' => '5',
								'size' => '5',
								'value' => set_value('id'),
							);
							echo form_input($data)?>
						</td>
					</tr>
					<tr>
						<td>
					<?php	echo form_label('Статус:&nbsp;', 'status');?>
						</td>
						<td>
					<?php	$options[''] = 'Все';
							$options['new'] = 'new';
							$options['processing'] = 'processing';
							$options['done'] = 'done';
							echo form_dropdown('status', $options);?>
						</td>
					</tr>
				</table>
				<?php echo form_submit('', 'Фильтровать');?>
		</form>
	</fieldset>
</article>