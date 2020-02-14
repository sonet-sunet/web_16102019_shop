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
                <div class="cards-item long pic" style ="background-image: url(/images/1.jpg);">
                    <a class = "to-catalog" href="">
                        <h3 class="h3 uppercase center color-white" >джинсовые куртки</h3>
                        <p class="card-item-text cursive uppercase center color-white">new arrival</p>
                    </a>
                </div>
                <div class="cards-item square pic" style ="background-image: url(/images/5.jpg);"></div>
            </div>
                <div class="cards-center wrap">
                    <div class="cards-item square news bgc-light-gray ">
                        <svg class="svg-icon eye" viewBox="0 0 20 20">
							<path fill="white" d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
						</svg>
                        <p class = "center cursive color-white warning">
                            Каждый сезон мы подготавливаем для Вас исключительно лучшую модную одежду. Следите за нашими новинками.
                        </p>
                    </div> 

                    <div class="cards-item square pic" style ="background-image: url(/images/3.jpg);"></div>

                    <div class="cards-item square pic" style ="background-image: url(/images/2.jpg);">
                        <a class = "to-catalog" href="">
                            <h3 class="h3 uppercase center color-white">Джинсы </h3>
                            <p class="card-item-text cursive lowercase center color-white">от 3200 руб.</p>
                        </a>
                    </div>

                    <div class="cards-item square news bgc-light-gray center">
                        <svg class="svg-icon eye" viewBox="0 0 20 20">
							<path fill="white" d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
						</svg>
                        <p class = "center cursive color-white warning">
                            Самые низкие цены в Москве.
                        </p>
                        <p class = "center cursive color-white">
                            Нашли дешевле? Вернем разницу.
                        </p>
                    </div> 

                    <div class="cards-item square bgc-dark-gray ">
                        <a class = "to-catalog" href="">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="white" d="M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0
                                L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109
                                c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483
                                c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788
                                S18.707,9.212,18.271,9.212z"></path>
                            </svg>
                            <h3 class="h3 uppercase center arrow color-white">аксессуары </h3>
                        </a>
                    </div>

                    <div class="cards-item square pic" style ="background-image: url(/images/6.jpg);">
                        <div class="dark"></div>
                        <a class = "to-catalog" href="">
                            <h3 class="h3 uppercase center color-white">спортивная одежда</h3>
                            <p class="card-item-text center cursive lowercase color-white">от 590 руб.</p>
                        </a>
                    </div>
                </div>
            <div class="cards-right wrap">
                <div class="cards-item square bgc-dark-gray">
                    <a class = "to-catalog" href="">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path fill="white" d="M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0
                        L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109
                        c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483
                        c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788
                        S18.707,9.212,18.271,9.212z"></path>
                    </svg>
                        <h3 class="h3 uppercase center arrow color-white">элегантная обувь</h3>
                        <p class="card-item-text cursive center uppercase color-white">ботинки, кроссовки</p>
                    </a>
                </div>
                <div class="cards-item long pic" style ="background-image: url(/images/4.jpg);">
                    <a class = "to-catalog" href="">                   
                        <h3 class="h3 uppercase center color-white">детская<br> одежда</h3>
                        <p class="card-item-text cursive uppercase center color-white">new arrival</p>
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
    
