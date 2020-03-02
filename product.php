<?php
    $include_conf = [
        'title'=>'Карточка товара',
        'css'=> '/css/product.css',
        'js'=> '/scripts/product.js'
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    $template = [];

    if( isset( $_GET['id'] ) ){
        $id = $_GET['id'];
        $sql_product = "SELECT * FROM products WHERE id = {$id}";
        $result_product = mysqli_query($db, $sql_product);
        $template = mysqli_fetch_assoc($result_product);

        $template['sizes'] = [];

        $sql_sizes = "SELECT sizes.id, sizes.size, sizes_products.quantity  FROM sizes
        INNER JOIN sizes_products on sizes_products.size_id = sizes.id
        WHERE sizes_products.product_id = {$id}";
        $result_sizes = mysqli_query($db, $sql_sizes);

        $count_rows_sizes = mysqli_num_rows($result_sizes);
        for( $i = 0; $i < $count_rows_sizes; $i++ ){
            $template['sizes'][] = mysqli_fetch_assoc($result_sizes);    
        } 

        // while( $row = mysqli_fetch_assoc($result_sizes) ){
        //     $template['sizes'][] = $row;   
        // }

        // Запрос в БД за размерами и заполнение $template['sizes']

        d($template);


    }
?>
<div class="product">
    <div class="product-photo" style="background-image: url(<?=$template['photo']?>)"></div>
    <h1 class="product-h1"><?=$template['name']?></h1>
    <div class="product-sku">Артикул: <?=$template['sku']?></div>
    <div class="product-price"><?=$template['price']?> руб.</div>
    <p class="product-description"><?=$template['description']?></p>
    <div class="product-sizes">
        <h2 class="product-sizes-h2" style = "text-align: center;">Размеры:</h2>
        <div style = "display: flex; justify-content: center; align-items: center;">
            <?php for($i = 0; $i < $count_rows_sizes; $i++): ?>
                <?php if($template['sizes'][$i]['quantity']):?>
                    <div>
                        <a href="" style = "text-decoration: none; color: blue;" class="exist">[<?=$template['sizes'][$i]['size']?>]</a>&ensp;
                    </div>
                <?php endif;?> 
                <?php if(!$template['sizes'][$i]['quantity']):?>
                    <div>
                        <a href="" style = "text-decoration: none; color: black; cursor: default;" class="no-exist">[<?=$template['sizes'][$i]['size']?>]</a>&ensp;
                    </div>
                <?php endif;?> 
            <?php endfor;?>
        </div>
        <div class="product-sizes-box">
            <div class="product-sizes-box-item no-exist"></div>
        </div>
    </div>
    <div class="product-addtocart" data-product-id="<?=$template['id']?>">Добавить в коризну</div>
</div>
<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>
    
