<?php
    if (isset($_POST['order_type']) && isset($_POST['approx_price'])) {
	    $order_type_name = trim($_POST['order_type']);
	    $order_type_approx_price = $_POST['approx_price'];
	    $errors = [];
	    $success = false;
	    if (empty($order_type_name) || mb_strlen($order_type_name) < 2 || mb_strlen($order_type_name) > 25) {
	        $errors['order_type_name'] = 'Название типа заказа должно быть от 2 до 25 символов!';
        }
	    if (!is_numeric($order_type_approx_price) || $order_type_approx_price <= 0) {
		    $errors['order_type_approx_price'] = 'Стоимость должна быть больше 0!';
	    }
	    if (empty($errors)) {
		    $sql = "INSERT INTO order_types (order_type, approx_price) VALUES (:order_type_name, :order_type_approx_price)";
		    $sth = $dbInterface->db->prepare($sql);
		    $sth->execute([
			    'order_type_name' => $order_type_name,
			    'order_type_approx_price' => $order_type_approx_price
		    ]);
		    $success = true;
		    $order_type_name = "";
		    $order_type_approx_price = 0;
        }
    }
?>
<html>
    <div>
        <form method="POST">
            <?php if (!empty($errors)):?> <span class="form_error">Проверьте форму на ошибки!</span> <?php endif;?>
            <?php if ($success):?> <span class="form_success">Новый тип заказа успешно добавлен!</span> <?php endif;?>
            <label for="type">Название типа заказа <span class="form_required">*</span></label>
	        <?php if (isset($errors['order_type_name'])):?><span class="error"><?=$errors['order_type_name'];?></span><?php endif;?>
            <input id="type" type="text" required value="<?= $order_type_name;?>" name="order_type"/>
            <label for="price">Приблизительная стоимость категории <span class="form_required">*</span></label>
	        <?php if (isset($errors['order_type_approx_price'])):?><span class="error"><?=$errors['order_type_approx_price'];?></span><?php endif;?>
            <input type="text" id="price" value="<?= $order_type_approx_price;?>" required name="approx_price"/>
            <input type="submit" value="Создать тип заказа"/>
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