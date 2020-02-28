<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header_conf.php');
    $response = [
        'count'=> 0
        
    ];

    if( isset($_GET['id']) ){
        $id = $_GET['id'];
        $size = $_GET['size_id'];
        if( isset( $_SESSION['basket'] ) ){
            $is_find = false;
            foreach($_SESSION['basket'] as $basketKey => $basketItem){
                if( $basketItem['id'] == $id ){
                    $_SESSION['basket'][$basketKey]['count']++;
                    
                    $is_find = true;
                    break;
                }

            }
            if( !$is_find ){
                $_SESSION['basket'][] = [
                    'id'=> $id,
                    'count'=> 1,
                    'size_id'=> $size
                    
                ];        
            }
        }else{
            $_SESSION['basket'] = [];
            $_SESSION['basket'][] = [
                'id'=> $id,
                'count'=> 1,
                'size_id'=>$size
                
            ];
        }
    }

    echo json_encode($response);

    // $_SESSION=[
    //     'basket'=>[
    //         [
    //             'id'=> 64,
    //             'count'=>3
    //         ],
    //         [
    //             'id'=>37,
    //             'count'=>1
    //         ],
    //         [
    //             'id'=>20,
    //             'count'=>1
    //         ]
    //     ]
    // ];
?>