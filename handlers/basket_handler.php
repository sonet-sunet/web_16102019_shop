<?php 
// comment
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header_conf.php');
    // d($_SESSION);

    $response = [
        'products'=>[],
        'basketInfo'=>[
            'count'=> 0,
            'finalPrice'=> 0
        ]
    ];

    if( isset( $_SESSION['basket'] ) ){
        // Условия на проверки запросов на удаление товаров или изменения их кол-ва

        if( isset($_GET['delete']) && $_GET['delete'] == 'yes' ){
            foreach( $_SESSION['basket'] as $basketKey => $basketItem ){
                if( $_GET['id'] == $basketItem['id'] ){
                    //unset
                    unset( $_SESSION['basket'][$basketKey] );
                    break;
                }
            }
        }elseif(isset($_GET['change']) && $_GET['change'] == 'yes'){
            foreach( $_SESSION['basket'] as $basketKey => $basketItem ){
                if( $_GET['id'] == $basketItem['id'] ){
                    //unset
                    $_SESSION['basket'][$basketKey]['count'] = $_GET['count'];
                    break;
                }
            }    
        }

        $product_ids = [];
        foreach($_SESSION['basket'] as $basketItem){
            $product_ids[] = $basketItem['id'];  
        }

        // d($product_ids);
        /**
         * explode - берет строку и по разделителю превращает ее в массив
         * implode - берет массив и по разделителю превращает его встроку
         * 
         */
        if( !empty( $product_ids ) ){
            $sql_products = "SELECT * FROM products 
            WHERE id IN (".implode(',', $product_ids).")";
        
            $result_products = mysqli_query($db, $sql_products);

            while($row = mysqli_fetch_assoc($result_products)){
                foreach($_SESSION['basket'] as $basketItem){
                    if( $basketItem['id'] == $row['id'] ){
                        $row['count'] = $basketItem['count'];
                        $row['fullPrice'] = $basketItem['count'] * $row['price'];
                        break;
                    }
                }
                // d($row);
                $response['basketInfo']['count'] += $row['count'];
                $response['basketInfo']['finalPrice'] += $row['fullPrice'];
                $response['products'][] = $row;
            }
        }
    }

    echo json_encode($response);
?>