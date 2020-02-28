<?php include($_SERVER['DOCUMENT_ROOT'].'/modules/header_conf.php'); ?>
<?php 
    $template = [
        'catalogs'=>[]
    ];

    $sql_nav = "SELECT * FROM catalogs";
    $result_nav = mysqli_query($db, $sql_nav);

    while( $row = mysqli_fetch_assoc( $result_nav ) ){
        $template['catalogs'][] = $row;
    }

    // d($template);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$include_conf['title']?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="<?=$include_conf['css']?>">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <nav class="header-nav">
                
                <div class = 'flex'>
                <a href="/index.php" class="sh flex-el"><img src="/images/icons/logo.jpg" alt=""></a>
                    <?php foreach($template['catalogs'] as $catalog): ?>
                        <a href="/catalog.php?id=<?=$catalog['id']?>" class="header-nav-a flex-el"><?=$catalog['name']?></a>
                    <?php endforeach;?>
                    <a href="/index.php" class="header-userbasket-basket-a flex-el">О нас</a>
                </div>
                
                
                <div class='header-userbasket flex'>
                    <!-- <div class="header-userbasket-user"> -->
                    <img src="/images/icons/account.png" alt="">
                        <a href="#" class="header-userbasket-basket-a flex-el">
                            Войти
                        </a>
                    <!-- </div> -->
                    <img src="/images/icons/bascet.png" alt="">
                    <div class="header-userbasket-basket">
                        <a href="/basket.php" class="header-userbasket-basket-a">Корзина</a>
                    </div>
                </div>                
            </nav>

        </header>