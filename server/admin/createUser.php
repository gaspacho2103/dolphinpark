<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php
            require('../../elements/head.php');
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="row">
            <div class="container w-50 mx-auto mt-5">
                <h2 class="mb-5">Новый пользователь</h2>
                <form method="post" class="mt-2">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Имя</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Логин</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="login">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Пароль</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Статус</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="status">
                        </div>
                    </div>
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-5 d-grid">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                        <div class="col-sm-4 d-grid">
                            <a class="btn btn-outline-primary" href="../../admin.php" role="button">Выйти</a>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $password = md5($password);

        require_once('../config.php');
        $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
        $sql = "INSERT INTO `Users`(`Name`, `Login`, `Email`, `Password`, `AbonimentCode`, `Status`) VALUES ('{$name}','{$login}','{$email}','{$password}','0','{$status}')";
        $connect->query($sql);
        $connect->close();
    }
?>