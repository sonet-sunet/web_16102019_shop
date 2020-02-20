<?php
    $access_free = false;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php'); 
    $template = [
        'products'=>[]
    ];

    $sql_products = "SELECT * FROM products";
    $result_products = mysqli_query($db, $sql_products);

    while( $row = mysqli_fetch_assoc($result_products) ){
        $template['products'][] = $row;
    }
    
?>
<div class="row">
    <div class="col-12">
        <h1>Товары</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>active</th>
                    <th>name</th>
                    <th>price</th>
                    <th>sku</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $template['products'] as $productItem ): ?>
                    <tr>
                        <td><?=$productItem['id']?></td>
                        <td><?=$productItem['active']?></td>
                        <td><?=$productItem['name']?></td>
                        <td><?=$productItem['price']?></td>
                        <td><?=$productItem['sku']?></td>
                        <td>
                            <a href="/admin/product.php?id=<?=$productItem['id']?>" class='btn btn-primary'>Изменить</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>

