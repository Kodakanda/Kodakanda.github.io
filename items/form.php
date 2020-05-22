<?php
		$order_types_sql = $dbInterface->db->query("SELECT * FROM order_types");
		$order_types = $order_types_sql->fetchAll();

	if(isset($_POST['client_name']) && isset($_POST['order_type_id']) && isset($_POST['client_phone']) && isset($_POST['order_comment'])){
		$clientName = $_POST['client_name'];
		$orderTypeId = $_POST['order_type_id'];
		$clientPhone = $_POST['client_phone'];
		$orderComment = $_POST['order_comment'];
		$sql = "INSERT INTO 
				orders (phone_number, client_name, comment, order_type_id) 
			VALUES 
				('$clientPhone', '$clientName', '$orderComment', $orderTypeId)";
		$dbInterface->db->query($sql);
	}
?>
<p><b>Оформите заказ онлайн!</b></p>
<form class="" method="POST">
	<label for="client-name">Имя</label>
	<input id="client-name" type="text" name="client_name">
	<label for="order-type">Тип заказа</label>
	<select id="order-type" name="order_type_id">
		<?php foreach($order_types as $order_type) :?>
			<option value="<?= $order_type['id'];?>"><?= $order_type['order_type'];?></option>
		<?php endforeach;?>
	</select>
	<label for="client-phone">Номер телефона</label>
  <input id="client-phone" type="phone" name="client_phone">
	<label for="order-comment">Комментарий</label>
  <input id="order-comment" type="textarea" name="order_comment">
  <input type="submit" value="Отправить">
</form>

<style>
form{
	display: flex;
	flex-direction: column;
}
form input{
	margin-top: 5px;
}

</style>