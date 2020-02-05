<?php
    $include_conf = [
        'title'=>'Главная страница',
        'css'=> '/css/main.css',
        'js'=> '/scripts/main.js'
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>
<h1>Главная страница</h1>
<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>
    
