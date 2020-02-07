<?php 
    $access_free = true;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php'); 

    if( isset($_POST['fio']) ){
        $sql_manager = "INSERT INTO managers (id, fio, email, pass) VALUES
        (NULL, '{$_POST['fio']}', '{$_POST['email']}', '{$_POST['pass']}')";
        $result_manager = mysqli_query($db, $sql_manager);

        if( $result_manager ){
            echo "<div class='alert alert-success' role='alert'>
                Вы успешно зарегестрировались. Ожидайте подтверждения заявки на регистрацию.
            </div>";
        }else{
            echo "<div class='alert alert-danger' role='alert'>
               Произошла ошибка при регистрации. Попробуйте снова или не пробуйте. 
            </div>";   
        }

    }
?>

<div class="row">
    <div class="col-6">
        <h1>Регистрация</h1>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="fio" class="form-control" placeholder="ФИО">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
        </form>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>