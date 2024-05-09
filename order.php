<?php
    require_once('server/config.php');
    $userLogin = $_COOKIE['UserLogin'];
    $userPassword = $_COOKIE['UserPassword'];
    $sql = "SELECT * FROM `Users` WHERE `Login` = '$userLogin' AND `Password` = '$userPassword'";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();
    $connection->close();

    if (!isset($_COOKIE['UserLogin'])) {
        Header('Location: /authorize.php');
        exit;
    }

    $userLogin = $_COOKIE['UserLogin'];
    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
    $sql = "SELECT `UserLogin` FROM `Aboniments` WHERE `UserLogin` = '{$userLogin}'";
    $result = $connect->query($sql);
    $abon = $result->fetch_assoc();
    $userAbon = $abon['UserLogin'];

    if ($userAbon == $_COOKIE['UserLogin']) {
        Header('Location: /profile.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php
            require('elements/head.php');
        ?>
        <link rel="stylesheet" href="css/order.css">
    </head>
    <body>
        <div class="order__block">
            <div class="order">
                <?php
                    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                    $sql = "SELECT * FROM `Aboniments`";
                    $result = $connect->query($sql);

                    for ($aboniment=array(); $row=$result->fetch_assoc(); $aboniment[]=$row) {

                    }

                    $count = count($aboniment) + 1;
                    $connect->close();

                    $id = $_GET['id'];

                    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                    $sql = "SELECT * FROM `Rates` WHERE `Id` = $id";
                    $result = $connect->query($sql);
                    $rate = $result->fetch_assoc();
                    $connect->close();
                ?>

                <h3 class="order_title">Заказ №<?=$count?></h3>
                <img class="order_logo" src="assets/icons/logo.png">
                <ul class="order_list">
                    <li class="order_el">Тариф: <strong><?=$rate['Name']?></strong></li>
                    <li class="order_el">Условия: <strong><?=$rate['Conditions']?></strong></li>
                    <li class="order_el">Срок абонимента: <strong><?=$rate['Days']?> дней</strong></li>
                    <li class="order_el">Цена: <strong><?=$rate['Price']?> Р</strong></li>
                </ul>
                <a class="buy-link" href="server/buy.php?id=<?=$id?>">Подтвердить</a>
            </div>
    </body>

</html>