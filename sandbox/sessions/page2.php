<?php 
    session_start();
    echo $_SESSION['message'];
    echo "Это страница №2";

    if( isset($_SESSION['count']) ){
        $_SESSION['count']++;
    }else{
        $_SESSION['count'] = 1;    
    }

    echo "<div>Кол-во: {$_SESSION['count']}<div>";
?>