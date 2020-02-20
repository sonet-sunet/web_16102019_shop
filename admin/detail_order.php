<?php
    $access_free = false;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php'); 
    $template = [
        'order'=>[],
        'payment'=>[],
        'users'=>[],
        'delivery'=>[],
        'order_items'=>[]
    ];
    if( isset( $_GET['id'] ) ){

        if( isset( $_GET['change_status'] ) ){
            $sql_update_order = "UPDATE orders 
            SET
                status = '{$_GET['change_status']}'
            WHERE id = {$_GET['id']}
            ";
            $result_update_order = mysqli_query($db, $sql_update_order);
        }

        $sql_order = "SELECT * FROM orders WHERE id = {$_GET['id']}";
        $result_order = mysqli_query($db, $sql_order);
        $data_order = mysqli_fetch_assoc($result_order);
        $template['order'] = $data_order;
        
        $sql_payment = 
            "SELECT * FROM payments WHERE id = {$data_order['payment_id']}";
        
        $result_payment = mysqli_query($db, $sql_payment);
        $template['payment'] = mysqli_fetch_assoc($result_payment);

        $sql_user = "SELECT * FROM users WHERE id = {$data_order['user_id']}";
        $result_user = mysqli_query($db, $sql_user);
        $template['users'] = mysqli_fetch_assoc($result_user);

        $sql_delivery = "SELECT * FROM deliveries WHERE id = {$data_order['delivery_id']}";
        $result_delivery = mysqli_query($db, $sql_delivery);
        $template['delivery'] = mysqli_fetch_assoc($result_delivery);
        

        /*

        
        */
        $sql_order_items = "SELECT products.name, sizes.size, order_items.quantity, order_items.price 
        FROM `order_items` 
        INNER JOIN sizes_products ON order_items.sizes_products_id = sizes_products.id
        INNER JOIN products ON sizes_products.product_id = products.id
        INNER JOIN sizes on sizes_products.size_id = sizes.id
        
        WHERE order_items.order_id = {$data_order['id']}";

        $result_order_items = mysqli_query($db, $sql_order_items);

        while( $row  = mysqli_fetch_assoc($result_order_items) ){
            $template['order_items'][] = $row;
        }
        d($template);
    }
?>

<div class="row">
    <div class="col-12">
        <h1>Заказ # <?=$template['order']['id']?></h1>
    </div>
</div>
<div class="row justify-content-between">
    <table class="col-5 table table-striped">
        <thead>
            <th>Название</th>
            <th>Значение</th>
        </thead>
        <tbody>
            <tr>
                <td>Номер заказа</td>
                <td><?=$template['order']['id']?></td>
            </tr>
            <tr>
                <td>Итоговая стоимость</td>
                <td><?=$template['order']['full_price']?> руб.</td>
            </tr>
            <tr>
                <td>Статус</td>
                <td><span class="btn btn-warning"><?=$template['order']['status']?></span></td>
            </tr>
            <tr>
                <td>Дата заказа</td>
                <td><?=$template['order']['date_create']?></td>
            </tr>
            <tr>
                <td>ФИО</td>
                <td><?=$template['users']['first_name']. ' '.$template['users']['last_name']?></td>
            </tr>
            <tr>
                <td>Адрес</td>
                <td>
                    <?=$template['users']['city']. ', '.$template['users']['address'].', '.$template['users']['postcode']?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <a href="mailto:<?=$template['users']['email']?>"><?=$template['users']['email']?></a>
                </td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td>
                    <a href="tel:<?=$template['users']['phont']?>"><?=$template['users']['phone']?></a>
                </td>
            </tr>
            <tr>
                <td>Способ доставки</td>
                <td>
                    <?=$template['delivery']['name']?>
                </td>
            </tr>
            <tr>
                <td>Стоимость доставки</td>
                <td>
                    <?=$template['delivery']['delivery_price']?>
                </td>
            </tr>
            <tr>
                <td>Способ оплаты</td>
                <td>
                    <?=$template['payment']['name']?>
                </td>
            </tr>
        </tbody>
    <table>
    <table class="col-6 table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Название</th>
                    <th>Размер</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($template['order_items'] as $order_item): ?>
                    <tr>
                        <td><?=$order_item['name']?></td>
                        <td><?=$order_item['size']?></td>
                        <td><?=$order_item['quantity']?></td>
                        <td><?=$order_item['price']?> руб.</td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</div>
<div class="row">
    <div class="col-12">
        <h2>Измение статуса</h2>
        <a class="btn btn-primary" href="/admin/detail_order.php?id=<?=$template['order']['id']?>&change_status=delivery">Отправить в доставку</a>
        <a class="btn btn-success" href="/admin/detail_order.php?id=<?=$template['order']['id']?>&change_status=done">Доставлен</a>
        <a class="btn btn-danger" href="/admin/detail_order.php?id=<?=$template['order']['id']?>&change_status=cancel">Отмена</a>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>

