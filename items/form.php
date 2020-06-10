<?php
    $order_types_sql = $dbInterface->db->query("SELECT * FROM order_types");
    $order_types = $order_types_sql->fetchAll();
    if (isset($_POST['client_name']) && isset($_POST['order_type_id']) && isset($_POST['client_phone']) && isset($_POST['order_comment'])){
        $errors = [];
        $success = false;
        $client_name = trim($_POST['client_name']);
        $client_phone = trim($_POST['client_phone']);
        $order_comment = trim($_POST['order_comment']);
        $order_type_id = intval($_POST['order_type_id']);
        if (!empty($client_name) && (mb_strlen($client_name) < 2 || mb_strlen($client_name) > 35 || !preg_match('/^[а-яА-Я\sa-zA-Z]+$/u', $client_name))) {
            $errors['client_name'] = 'Укажите настоящее имя!';
        }
        if (empty($client_phone) || !preg_match('/^\+7[0-9]{10}$/', $client_phone)) {
            $errors['client_phone'] = 'Укажите корректный номер телефона!';
        }
        if (!empty($order_comment) && (mb_strlen($order_comment) < 2 || mb_strlen($order_comment) > 150)) {
            $errors['order_comment'] = 'Комментарий должен быть от 2 до 150 символов!';
        }
        if (empty($errors)) {
            $sql = "
                INSERT INTO orders (phone_number, client_name, comment, order_type_id) 
                VALUES (:client_phone, :client_name, :order_comment, :order_type_id)
            ";
            $sth = $dbInterface->db->prepare($sql);
            $sth->execute([
                'client_phone' => $client_phone,
                'client_name' => $client_name,
                'order_comment' => $order_comment,
                'order_type_id' => $order_type_id
            ]);
            $success = true;
            $client_name = "";
            $client_phone = "";
            $order_comment = "";
            $order_type_id = 0;
        }
    }
?>
<p><b>Оформите заказ онлайн!</b></p>
<form class="" method="POST">
    <?php if (!empty($errors)):?> <span class="form_error">Проверьте форму на ошибки!</span> <?php endif;?>
    <?php if ($success):?> <span class="form_success">Ваша заявка принята!</span> <?php endif;?>
    <label for="client-name">Имя<span class="form_required">*</span></label>
    <?php if (isset($errors['client_name'])):?><span class="error"><?=$errors['client_name'];?></span><?php endif;?>
    <input id="client-name" type="text" name="client_name" required value="<?= $client_name; ?>">
    <label for="order-type">Тип заказа</label>
    <select id="order-type" name="order_type_id">
    <?php foreach($order_types as $order_type) :?>
        <option <?php if ($order_type_id == $order_type['id']):?> selected <?php endif;?>value="<?= $order_type['id'];?>"><?= $order_type['order_type'];?></option>
    <?php endforeach;?>
    </select>
    <label for="client-phone">Номер телефона<span class="form_required">*</span></label>
    <?php if (isset($errors['client_phone'])):?><span class="error"><?=$errors['client_phone'];?></span><?php endif;?>
    <input id="client-phone" placeholder="+79001234567" type="phone" name="client_phone" required value="<?= $client_phone; ?>">
    <label for="order-comment">Комментарий<span class="form_required">*</span></label>
    <?php if (isset($errors['order_comment'])):?><span class="error"><?=$errors['order_comment'];?></span><?php endif;?>
    <input id="order-comment" type="textarea" name="order_comment" required value="<?= $order_comment; ?>">
    <input type="submit" value="Отправить">
</form>

<style>
    form {
        display: flex;
        flex-direction: column;
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