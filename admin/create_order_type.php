<?php
  if(isset($_POST['order_type']) && isset($_POST['approx_price'])){
    $orderType = $_POST['order_type'];
    $approxPrice = $_POST['approx_price'];
    $sql = "INSERT INTO order_types (order_type, approx_price) VALUES ('$orderType', $approxPrice)";
    $result = $dbInterface->db->query($sql);
    if($result)
      echo 'SUCCESS';
    else
      echo 'FAILED';
  }
?>
<html>
  <head>
  </head>
  <body>
    <div>
      <form method="POST">
        Order Type
        <input type="text" name="order_type"/>
        Approx price
        <input type="text" name="approx_price"/>
        <input type="submit"/>
      </form>
    </div>
  </body>




</html>