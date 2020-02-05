<?php 
    session_start();
    $_SESSION['message'] = 'Привет, мир!';
    echo "Это страница №1";

    if( isset($_SESSION['count']) ){
        $_SESSION['count']++;
    }else{
        $_SESSION['count'] = 1;    
    }

    echo "<div>Кол-во: {$_SESSION['count']}<div>";
?>