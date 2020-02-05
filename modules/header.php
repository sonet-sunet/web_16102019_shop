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
                <?php foreach($template['catalogs'] as $catalog): ?>
                    <a href="/catalog.php?id=<?=$catalog['id']?>" class="header-nav-a"><?=$catalog['name']?></a>
                <?php endforeach;?>
            </nav>
            <div class='header-userbasket'>
                <div class="header-userbasket-user"></div>
                <div class="header-userbasket-basket">
                    <a href="/basket.php" class="header-userbasket-basket-a">Корзина</a>
                </div>
            </div>
        </header>