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
                <h2 class="mb-5">Новые данные абонимента</h2>
                <form method="post" class="mt-2">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Логин пользователя</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="login">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Название тарифа</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tarif">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Дата покупки</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="buydate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Дата окончания</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="closedate">
                        </div>
                    </div>
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-5 d-grid">
                            <button type="submit" class="btn btn-primary">Изменить</button>
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
        $id = $_GET['id'];
        $login = $_POST['login'];
        $tarif = $_POST['tarif'];
        $buydate = $_POST['buydate'];
        $closedate = $_POST['closedate'];

        require_once('../config.php');
        $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
        $sql = "UPDATE `Aboniments` SET `UserLogin`='$login',`TarifName`='$tarif',`BuyDate`='$buydate',`CloseDate`='$closedate' WHERE `Id` = '$id'";
        $connect->query($sql);
        $connect->close();
    }
?>