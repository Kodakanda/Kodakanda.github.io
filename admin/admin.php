<?php
  $sql = "SELECT * FROM orders INNER JOIN order_types ON orders.order_type_id = order_types.id";
  $res = $dbInterface->db->query($sql);
  $ordersTable = '';
  $orders = $res->fetchAll();
  // debug($orders);
?>

    <table>
      <tr>
        <th>#</th>
        <th>Клиент</th>
        <th>Телефон клиента</th>
        <th>Тип заказа</th>
        <th>Комментарий</th>
        <th>Приблизительная стоимость</th>
        <th>Дата создания заказа</th>
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
        </tr>
      <?php endforeach; ?>
    </table>
