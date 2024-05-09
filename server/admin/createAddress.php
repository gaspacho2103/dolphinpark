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
                <h2 class="mb-5">Добавление нового адреса</h2>
                <form method="post" class="mt-2">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Адрес</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="address">
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
        $address = $_POST['address'];

        require_once('../config.php');
        $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
        $sql = "INSERT INTO `Geo`(`Address`) VALUES ('{$address}')";
        $connect->query($sql);
        $connect->close();
    }
?>