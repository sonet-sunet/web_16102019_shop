<?php
    $access_free = false;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php');
    
    $template = [
        'catalogs'=>[]
    ];

    $sql_catalogs = "SELECT * FROM catalogs";
    $result_catalogs = mysqli_query($db, $sql_catalogs);
    while($row = mysqli_fetch_assoc($result_catalogs)){
        $template['catalogs'][] = $row;
    }

    if( isset($_POST['name']) ){
        d($_POST);

        d($_FILES);
        $photo = '';

        if( isset($_FILES['photo']) ){
            $relativepath = '/images/catalog/'.$_FILES['photo']['name'];
            $newpath = $_SERVER['DOCUMENT_ROOT'].$relativepath;
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $newpath)){
                $photo = $relativepath;
            }else{
                echo 'Произошла ошибка при загрузке файла';
            }
        }

        $sql_newproduct = "INSERT INTO products 
                  (id, active, name, price, photo, sku, description)
            VALUE (NULL, '{$_POST['active']}', '{$_POST['name']}', {$_POST['price']}, '{$photo}',
            '{$_POST['sku']}', '{$_POST['description']}')
            ";
        $result_newproduct = mysqli_query($db, $sql_newproduct);

        if( $result_newproduct ){
            $product_id = mysqli_insert_id($db); // получаем идентификатор добавленного товара

            foreach($_POST['catalogs'] as $catalog_id){
                $sql_catalogs_products = "INSERT INTO catalogs_products 
                    (id, product_id, catalog_id)
                    VALUE (NULL, {$product_id}, {$catalog_id})
                ";
                $result_catalogs_products = mysqli_query($db, $sql_catalogs_products);    
            }

            echo 'Товар добавлен';
        }
    }
    // d($template);
?>

<!-- Тут нужно реализовать добавление товара в БД -->
<div class="row">
    <div class="col-12">
        <h1>Добавление товара</h1>
        <form enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <input type="text" name="active" class="form-control" placeholder="active">
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="price">
            </div>
            <div class="form-group">
                <input type="text" name="sku" class="form-control" placeholder="sku">
            </div>
            <div class="form-group">
                <label>
                    <input type="file" name="photo" class="form-control-file">
                </label>
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Описание"></textarea>
            </div>

            <?php foreach($template['catalogs'] as $catalog_item): ?>
                <div class="form-check">
                    <label class="form-check-label">
                        <input name='catalogs[]' value='<?=$catalog_item['id']?>' class="form-check-input" type="checkbox"> <?=$catalog_item['name']?>
                    </label>
                </div>
            <?php endforeach;?>
            <button type="submit" class="btn btn-primary">Добавить товар</button>
        </form>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>