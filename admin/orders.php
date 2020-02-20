<?php
    $access_free = false;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php'); 
    $template = [
        'orders'=>[]
    ];

    $sql_order = "SELECT * FROM orders ORDER BY date_create DESC";
    $result_order = mysqli_query($db, $sql_order);
    while($row = mysqli_fetch_assoc($result_order)){
        $template['orders'][] = $row;
    }
    d($template);
?>

<div class="row">
    <div class="col-12">
        <h1>Заказы</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th>Дата и время заказа</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($template['orders'] as $order_item): ?>
                    <tr>
                        <td><?=$order_item['id']?></td>
                        <td><?=$order_item['full_price']?> руб.</td>
                        <td><?=$order_item['status']?></td>
                        <td><?=$order_item['date_create']?></td>
                        <td>
                            <a href="/admin/detail_order.php?id=<?=$order_item['id']?>" class="btn btn-primary">Подробнее</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>

        </table>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>

