<?php
    $include_conf = [
        'title'=>'Каталог',
        'css'=> '/css/catalog.css',
        'js'=> '/scripts/catalog.js'
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');

    $template = [
        'catalog'=>[
            'name'=>'Мужчинам',
            'id' => 1
        ]
    ];

   if( isset( $_GET['id']) ){
       
       $id = $_GET['id'];

       $sql_catalog = "SELECT * FROM catalogs WHERE id = {$id}";
       $result_catalog = mysqli_query($db, $sql_catalog);
       $template['catalog'] = mysqli_fetch_assoc($result_catalog);
   }

?>
<div class="catalog" data-catalog-id="<?=$template['catalog']['id']?>">
    <h1 class="catalog-h1"><?=$template['catalog']['name']?></h1>
    <p class="catalog-description">Все товары</p>
    <div class="catalog-filters">
        <form class="catalog-filters-form" method="GET">
            <select class="catalog-filters-form-first" name="firstList">
                <option disabled selected>Категория</option>
            </select>
            <select class="catalog-filters-form-second" name="secondList">
                <option disabled selected>Размер</option>
            </select>
            <select class="catalog-filters-form-third" name="thirdList">
                <option disabled selected>Стоимость</option>
            </select>
        </form>
    </div>
    <div class="catalog-products"></div>
    <div class="catalog-pagination">
        
    </div>
    <div class="catalog-preloader">Загрузка</div>
</div>
<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>
    
