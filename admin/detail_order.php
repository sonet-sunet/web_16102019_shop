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
        $sql_order = "SELECT * FROM orders WHERE id = {$_GET['id']}";
        $result_order = mysqli_query($db, $sql_order);
        $data_order = mysqli_fetch_assoc($result_order);
        $template['order'] = $data_order;
        
        $sql_payment = 
            "SELECT * FROM payments WHERE id = {$data_order['payment_id']}";
        
        $result_payment = mysqli_query($db, $sql_payment);
        $template['payment'] = mysqli_fetch_assoc($result_payment);

        d($template);

    }
?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>

