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
<div>
  <form method="POST">
    <label for="type">Название типа заказа</label>
    <input id="type" type="text" name="order_type"/>
    <label for="price">Приблизительная стоимость категории</label>
    <input type="text" id="price" name="approx_price"/>
    <input type="submit" value="Создать тип заказа"/>
  </form>
</div>
</html>
<style>
	form{
		display: flex;
    flex-direction: column;
    width: 50%;
    margin: auto;
	}
	form input{
		margin-top: 5px;
	}
</style>