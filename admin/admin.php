<?php
/////будет убрано
  require('../db.php');
  $dbInterface = new DBInterface();
/////////
  $sql = "SELECT * FROM orders";
  $res = $dbInterface->db->query($sql);
  echo var_dump($res);
  $ordersTable = null;
  while($order = $res->fetchArray(SQLITE3_ASSOC)){
    $id = $order['id'];
    $clientName = $order['client_name'];
    $clientPhone = $order['phone_number'];
    $orderType = $order['order_type_id']; //заменится на тип заказа
    $comment = $order['comment'];
    $orderApproxPrice = 0; //заменится на приблизительную стоимость
    $orderDate = $order['order_datetime'];
    $ordersTable += "<tr>
                      <td>$id</td>
                      <td>$clientName</td>
                      <td>$clientPhone</td>
                      <td>$orderType</td>
                      <td>$comment</td>
                      <td>$orderApproxPrice</td>
                      <td>$orderDate</td>
                    </tr>";
  }
?>
<html>
  <head>
  </head>
  <body>
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
      <?= $ordersTable ?>
    </table>
  </body>
</html>