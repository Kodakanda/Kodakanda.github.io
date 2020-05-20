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
	//echo '<pre>'; print_r($dbInterface->db->query("SELECT * from orders")->fetchAll()); die();
?>
<form method="POST">
	<input type="text" name="client_name">
	<select name="order_type_id">
		<?php foreach($order_types as $order_type) :?>
			<option value="<?= $order_type['id'];?>"><?= $order_type['order_type'];?></option>
		<?php endforeach;?>
</select>
  <!-- <input type="number" name="order_type_id"> -->
  <input type="phone" name="client_phone">
  <input type="textarea" name="order_comment">
  <input type="submit">
</form>