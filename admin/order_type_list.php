<?php
$sql = "SELECT * FROM order_types";
$res = $dbInterface->db->query($sql);
$ordersTable = '';
$order_types = $res->fetchAll();
?>
	<br>
		<div style="padding-left:100px;"><a style="height:25px;" title="Добавить" class='button' href="/order_type_edit">Добавить новый тип заказа</a></div>
	<hr>
	<table class="orders-table">
		<tr>
			<th>#</th>
			<th>Тип заказа</th>
			<th>Приблизительная стоимость</th>
			<th>Действие</th>
		</tr>
		<?php foreach($order_types as $type): ?>
			<tr>
				<td><?= $type[0] ?></td>
				<td><?= $type['order_type'] ?></td>
				<td><?= $type['approx_price'] ?></td>
				<td>
					<a title="Изменить" class='button' href="/order_type_edit?id=<?= $type[0] ?>">&#10000;</a>
					<a title="Удалить" onclick="return confirm('Удалить тип заказа?')" class='button remove' href="/order_type_edit?delete=true&id=<?= $type[0] ?>">&#10006;</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<style>
	.remove {
		background-color: #B22222;
	}
	.button {
		font: bold 11px Arial;
		text-decoration: none;
		padding: 2px 6px 2px 6px;
		border-top: 1px solid #CCCCCC;
		border-right: 1px solid #333333;
		border-bottom: 1px solid #333333;
		border-left: 1px solid #CCCCCC;
	}
	.orders-table{
		margin: auto;
	}
	.orders-table th{
		width: 5%;
	}
	.orders-table td{
		text-align: center;
	}
</style>
