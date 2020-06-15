<?php
  $sql = "SELECT * FROM orders INNER JOIN order_types ON orders.order_type_id = order_types.id";
  $res = $dbInterface->db->query($sql);
  $ordersTable = '';
  $orders = $res->fetchAll();
?>

<table class="orders-table">
  <tr>
    <th>#</th>
    <th>Клиент</th>
    <th>Телефон клиента</th>
    <th>Тип заказа</th>
    <th>Комментарий</th>
    <th>Приблизительная стоимость</th>
    <th>Дата создания заказа</th>
    <th>Выполнен</th>
  </tr>
  <?php foreach($orders as $order): ?>
    <tr>
      <td><?= $order[0] ?></td>
      <td><?= $order['client_name'] ?></td>
      <td><?= $order['phone_number'] ?></td>
      <td><?= $order['order_type'] ?></td>
      <td><?= $order['comment'] ?></td>
      <td><?= $order['approx_price'] ?></td>
      <td><?= $order['order_datetime'] ?></td>
      <td><input type="checkbox" id="is_comlpeted" <?= $order['is_completed'] == 1 ? 'checked' : false ?> /></td>
    </tr>
  <?php endforeach; ?>
</table>
<style>

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
