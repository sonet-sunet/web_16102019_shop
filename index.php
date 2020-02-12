<?php
    $include_conf = [
        'title'=>'Главная страница',
        'css'=> '/css/main.css',
        'js'=> '/scripts/main.js'
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
?>
<div class="wrapper">
    <div class="main-top">
        <h1 class="h1 uppercase center">новые поступления весны</h1>
        <h2 class="h2 cursive center">Мы подготовили для Вас лучшие новинки сезона</h2>
        <div class="button uppercase center">посмотреть новинки</div>
    </div>



    <div class="main-center">
        <div class="cards">


            <div class="cards-left wrap">
                <div class="cards-item long pic">
                    <a class = "to-catalog" href="">
                        <h3 class="h3 uppercase center">джинсовые куртки</h3>
                        <text class="card-item-text cursive uppercase center">new arrival</text>
                    </a>
                </div>

                <div class="cards-item square pic"></div>
            </div>


            <div class="cards-center wrap">
                <div class="cards-item square news bgc-light-gray ">
                    <p class = "center cursive color-white warning">
                        Каждый сезон мы подготавливаем для Вас исключительно лучшую модную одежду. Следите за нашими новинками.
                    </p>
                </div> 

                <div class="cards-item square pic"></div>

                <div class="cards-item square pic">
                    <a class = "to-catalog" href="">
                        <h3 class="h3 uppercase center color-white">Джинсы </h3>
                        <p class="card-item-text cursive lowercase center color-white">от 3200 руб.</p>
                    </a>
                </div>

                <div class="cards-item square news bgc-light-gray center">
                    <p class = "center cursive color-white warning">
                        Самые низкие цены в Москве.
                    </p>
                    <p class = "center cursive color-white">
                        Нашли дешевле? Вернем разницу.
                    </p>
                </div> 

                <div class="cards-item square bgc-dark-gray ">
                    <a class = "to-catalog" href="">
                        <h3 class="h3 uppercase center arrow color-white">аксессуары </h3>
                    </a>
                </div>

                <div class="cards-item square pic">
                    <a class = "to-catalog" href="">
                        <h3 class="h3 uppercase">спортивная одежда</h3>
                        <p class="card-item-text cursive lowercase">от 590 руб.</p>
                    </a>
                </div>
            </div>


            <div class="cards-right wrap">
                <div class="cards-item square bgc-dark-gray">
                    <a class = "to-catalog" href="">
                        <h3 class="h3 uppercase center arrow color-white">элегантная обувь</h3>
                        <p class="card-item-text cursive uppercase color-white">ботинки, кроссовки</p>
                    </a>
                </div>

                <div class="cards-item long pic">
                    <a class = "to-catalog" href="">                   
                        <h3 class="h3 uppercase center color-white">детская одежда</h3>
                        <p class="card-item-text cursive uppercase color-white">new arrival</p>
                    </a>
                </div>
            </div>


        </div>
    </div>



    <div class="main-bottom">

    </div>
</div>


<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>
    
