<?php 
    $access_free = true;
    
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php'); 
    if( isset($_POST['email']) ){
        $sql_manager = "SELECT * FROM managers 
        WHERE email = '{$_POST['email']}' AND pass = '{$_POST['pass']}'";

        $result_manager = mysqli_query($db, $sql_manager);
        $data_manager = mysqli_fetch_assoc($result_manager);

        if( !$data_manager ){
            echo "<div class='alert alert-danger' role='alert'>
                Мы вас не нашли. Логин или пароль не верен
            </div>";
        }elseif( $data_manager['access'] == 'NO' ){
            echo "<div class='alert alert-warning' role='alert'>
                Ваш доступ еще не подтвердили. Попробуйте позже.
            </div>";    
        }elseif( $data_manager['access'] == 'YES' ){
            echo "<div class='alert alert-success' role='alert'>
                Вы успешно авторизировались. 
            </div>";

            $_SESSION['manager'] = [
                'id' => $data_manager['id'],
                'email'=> $data_manager['email'],
                'fio' => $data_manager['fio']
            ];
        }

    }
?>

<div class="row">
    <div class="col-6">
        <h1>Авторизация</h1>
        <form method="POST">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-primary">Авторизация</button>
        </form>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>