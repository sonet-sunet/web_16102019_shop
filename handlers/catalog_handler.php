<?php 
    //бекенд каталога
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header_conf.php');
    $response = [
        'products'=>[],
        'pagination'=>[
            'nowPage'=> 1,
            'countPage'=> 1
        ],
        'filters' => []
    ];

    $products_on_page = 3;
    $now_page = 1;
    $response['pagination']['countPage'] = 0;

    if( isset( $_GET['now_page'] ) ){
        $now_page = (int) $_GET['now_page'];
    }

    if( isset( $_GET['id']) ){
        $id = $_GET['id'];
        $sql = "SELECT products.* FROM products
        INNER JOIN catalogs_products ON products.id = catalogs_products.product_id";
        if (isset($_GET['sizes']) && ($_GET['sizes']!= '1')){
            $sql = $sql." INNER JOIN sizes_products ON products.id = sizes_products.product_id
            INNER JOIN sizes ON sizes.id = sizes_products.size_id
            WHERE catalogs_products.catalog_id  = {$id} AND sizes.size = {$_GET['sizes']}";
         }else{
            $sql = $sql." WHERE catalogs_products.catalog_id = {$id}";
        }

        if( isset($_GET['prices']) && ($_GET['prices']!= '1') ){
            $sql= $sql." AND products.price {$_GET['prices']}";
        }
        if( isset($_GET['categories']) && ($_GET['categories']!= '1') ){
            $sql= $sql." AND products.name LIKE '%{$_GET['categories']}%'";
        }

        $result = mysqli_query($db, $sql);

        $count_products = mysqli_num_rows($result);
        $count_page = ceil($count_products / $products_on_page);

        $response['pagination']['countPage'] = $count_page;
        $response['pagination']['nowPage'] = $now_page;

        $after_row = ($now_page - 1) * $products_on_page;

        $sql_products = $sql." LIMIT {$after_row}, {$products_on_page}";

        $result_products = mysqli_query($db, $sql_products);
    
        while( $row = mysqli_fetch_assoc($result_products) ){
            $response['products'][] = $row;    
        }

        $sql_filter_categories = "SELECT DISTINCT categories.* FROM categories INNER JOIN categories_products ON categories.id = categories_products.categories_id INNER JOIN catalogs_products ON catalogs_products.catalog_id = {$_GET['id']} AND categories_products.product_id = catalogs_products.product_id";
        $result_filter_categories = mysqli_query($db, $sql_filter_categories);
    
        while( $row = mysqli_fetch_assoc($result_filters) ){
            $response['filters']['categories'] = $row;   
        }
    }

    

    // sleep(3);
    echo json_encode($response);

?>