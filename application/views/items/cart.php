<article class="col-sm-9">
	<h2>Корзина покупателя</h2><br>
<p>
	Чтобы изменить количество заказываемого товара измените число в поле ввода и нажмите кнопку "Обновить". Для удаления всей позиции просто подставьте 0.
</p>
<?php echo form_open('/items/cartUpdate'); ?>

<table cellpadding="5" style="width:100%" border="1">

<tr>
        <th>Количетво</th>
        <th>Модель</th>
        <th style="text-align:right">Цена</th>
        <th style="text-align:right">Общая сумма</th>
</tr>

<?php $i = 1; ?>

<?php 	foreach ($this->cart->contents() as $items):
			echo form_hidden($i.'[rowid]', $items['rowid']); ?>
			<tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td><?php echo $items['name']; ?>
                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                            <p><?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
										<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                               <?php endforeach; ?>
                            </p>
                    <?php endif; ?>
                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?> грн.</td>
			</tr>
			<?php $i++; ?>
<?php 	endforeach; ?>
			<tr>
				<td colspan="2"> </td>
				<td class="right"><strong>Итого:</strong></td>
				<td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?> грн.</td>
			</tr>
</table><br>

<p><?php echo form_submit('', 'Обновить'); ?></p>
</form>
<a href="items/order"><button>Оформить заказ</button></a><a href="items/zorder"> <button>Удалить все</button></a>
</article>