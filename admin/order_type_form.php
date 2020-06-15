<?php

	$order_type_name = "";
	$order_type_approx_price = "";
	$errors = [];
	$success = ['status' => false];

	$action = (isset($_GET['id'])) ? 'Изменить' : 'Создать';

	if (isset($_POST['order_type']) && isset($_POST['approx_price'])) {
		$order_type_name = trim($_POST['order_type']);
		$order_type_approx_price = $_POST['approx_price'];
		if (empty($order_type_name) || mb_strlen($order_type_name) < 2 || mb_strlen($order_type_name) > 25) {
			$errors['order_type_name'] = 'Название типа заказа должно быть от 2 до 25 символов!';
		}
		if (!is_numeric($order_type_approx_price) || $order_type_approx_price <= 0) {
			$errors['order_type_approx_price'] = 'Стоимость должна быть больше 0!';
		}
		if (empty($errors)) {
			$data = [
				'order_type_name' => $order_type_name,
				'order_type_approx_price' => $order_type_approx_price
			];
			if (isset($_GET['id'])) {
				$sth = $dbInterface->db->prepare("UPDATE order_types SET order_type = :order_type_name, approx_price = :order_type_approx_price WHERE id = :id");
				$data['id'] = $_GET['id'];
				$success = [
					'status' => true,
					'msg' => 'Сохранено!'
				];
			} else {
				$sth = $dbInterface->db->prepare("INSERT INTO order_types (order_type, approx_price) VALUES (:order_type_name, :order_type_approx_price)");
				$success = [
					'status' => true,
					'msg' => 'Новый тип заказа успешно добавлен!'
				];
				$is_new = true;
				$order_type_name = "";
				$order_type_approx_price = "";
			}
			$sth->execute($data);
		}
	}

	if (isset($_GET['id']) && empty($errors) && !$is_new) {
		if (isset($_GET['delete'])) {
			$sth = $dbInterface->db->prepare("DELETE FROM order_types WHERE id = ?");
			$sth->execute([$_GET['id']]);
			header("Location: /order_types");
		} else {
			$sth = $dbInterface->db->prepare("SELECT * FROM order_types WHERE id = ?");
			$sth->execute([$_GET['id']]);
			$order_type = $sth->fetch(PDO::FETCH_ASSOC);
			if (empty($order_type)) {
				$errors['not_found'] = 'Тип заказа не найден';
			} else {
				$order_type_name = $order_type['order_type'];
				$order_type_approx_price = $order_type['approx_price'];
			}
		}
	}

?>
<html>
	<div>
		<form method="POST">
			<?php if (!isset($errors['not_found'])): ?>
				<?php if (!empty($errors)):?> <span class="form_error">Проверьте форму на ошибки!</span> <?php endif;?>
				<?php if ($success['status']):?> <span class="form_success"><?= $success['msg'];?></span> <?php endif;?>
				<label for="type">Название типа заказа <span class="form_required">*</span></label>
				<?php if (isset($errors['order_type_name'])):?><span class="error"><?=$errors['order_type_name'];?></span><?php endif;?>
				<input id="type" type="text" required value="<?= $order_type_name;?>" name="order_type"/>
				<label for="price">Приблизительная стоимость категории <span class="form_required">*</span></label>
				<?php if (isset($errors['order_type_approx_price'])):?><span class="error"><?=$errors['order_type_approx_price'];?></span><?php endif;?>
				<input type="text" id="price" value="<?= $order_type_approx_price;?>" required name="approx_price"/>
				<input type="submit" value="<?= $action; ?> тип заказа"/>
			<?php else: ?>
				<Br>
				<span class="form_error"><?= $errors['not_found'];?></span>
				<Br>
			<?php endif; ?>
		</form>
	</div>
</html>
<style>
	form {
		display: flex;
		flex-direction: column;
		width: 50%;
		margin: auto;
	}
	form input {
		margin-top: 5px;
	}
	.form_required, .form_error {
		color: red;
		font-weight: bold;
	}
	.form_success {
		color: green;
		font-weight: bold;
	}
	.error {
		color: red;
	}
</style>