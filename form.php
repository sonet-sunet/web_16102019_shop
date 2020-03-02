<?php
        $include_conf = [
            'title'=>'Обработка запроса',
            'css'=> '/css/style.css',
            'js'=> '/scripts/form.js'
        ];
    include($_SERVER['DOCUMENT_ROOT'].'/modules/header.php');
    // function d($ar){
    //         echo "<pre>";
    //         print_r($ar);
    //         echo "</pre>";
    //     };
?>
<!-- <section> -->
    <?php

        // d($_POST);        

        if(isset($_POST['mail'])){
            echo "
                 <div class='success-container' style = 'background-color:#cee3ef;'>
                     <div class='success-img'></div>
                     <div class='form-success-message'>
                         <div class='form-success-message-text'>Спасибо за Вашу заявку!</div>
                         Менеджер напишет вам на почту: {$_POST['mail']}
                     </div>
                 </div>
             ";
             $sql_client = "INSERT INTO `clients` (`id`, `email`, `create_date`) 
             VALUE (NULL, '{$_POST['mail']}', NOW())";

            $result_client = mysqli_query($db, $sql_client);
            if($result_client){
                echo "
                    успешно
                ";
            }else{
                echo 'К сожалению у нас технические трудности, позвоните или напишите нам для отправления заявки.';
            }
        }else{
            echo "
                <div class='success-container' style = 'background-color:#cee3ef;'>
                    <div class='form-success-message'>
                        <div class='form-success-message-text'>Форма не была отправлена
                    </div>
                </div>
            "; 
        }
    ?>
<!-- </section> -->
<?php
   include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'); 
?>