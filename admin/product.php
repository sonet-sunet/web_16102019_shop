<?php
    $access_free = false;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php');
    $template = [
        'product'=>[]
    ];

    if( isset($_POST['id']) ){
        //произошла отправка формы на измение товара
        $sql_product_update = "UPDATE products 
            SET
                active = '{$_POST['active']}',
                name = '{$_POST['name']}',
                price = '{$_POST['price']}',
                sku = '{$_POST['sku']}',
                photo = '{$_POST['photo']}',
                description = '{$_POST['description']}'
        
            WHERE id = {$_POST['id']}";
        
        $result_product_update = mysqli_query($db, $sql_product_update);

        if( $result_product_update ){
            echo "<div class='alert alert-success' role='alert'>
                Изменение прошло успешно. 
            </div>";
        }else{
            echo "<div class='alert alert-success' role='alert'>
                К сожалению, произошла ошибка
            </div>";
        }
    }
    

    if( isset( $_GET['id'] ) ){
        $sql_product = "SELECT * FROM products WHERE id = {$_GET['id']}";
        $result_product = mysqli_query($db, $sql_product);
        $template['product'] = mysqli_fetch_assoc($result_product);
    }
    
?>

<div class="row">
    <div class="col-12">
        <h1>Редактирование товара</h1>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="id" readonly class="form-control" placeholder="id" value='<?=$template['product']['id']?>'>
            </div>
            <div class="form-group">
                <input type="text" name="active" class="form-control" placeholder="active" value='<?=$template['product']['active']?>'>
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="name" value='<?=$template['product']['name']?>'>
            </div>
            <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="price" value='<?=$template['product']['price']?>'>
            </div>
            <div class="form-group">
                <input type="text" name="sku" class="form-control" placeholder="sku" value='<?=$template['product']['sku']?>'>
            </div>
            <div class="form-group">
                <input type="photo" name="photo" class="form-control" placeholder="photo" value='<?=$template['product']['photo']?>'>
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Описание"><?=$template['product']['description']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>

