<?php
    $include_conf = [
        'title'=>'Корзина',
        'css'=> '/css/basket.css',
        'js'=> '/scripts/basket.js'
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    d($_SESSION);
?>
<div class="basket">

</div>
<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>
    
