<?php
    require_once('config.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM `Rates` WHERE `Id` = '$id'";
    $result = $connection->query($sql);
    $rate = $result->fetch_assoc();
    $connection->close();

    $userLogin = $_COOKIE['UserLogin'];
    $abonimentCode = rand(100000000, 999999999);
    $tarifName = $rate['Name'];
    $buyDate = date("Y-m-d");
    $datePlus = strtotime('+1 MONTH', strtotime($buyDate));
    $closeDate = date('Y-m-d', $datePlus);

    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
    $sql = "INSERT INTO `Aboniments`(`UserLogin`, `AbonimentCode`, `TarifName`, `BuyDate`, `CloseDate`) VALUES ('{$userLogin}','{$abonimentCode}','{$tarifName}','{$buyDate}','{$closeDate}')";
    $connect->query($sql);
    $connect->close();

    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
    $sql = "UPDATE `Users` SET `AbonimentCode` = '{$abonimentCode}' WHERE `Login` = '{$userLogin}'";
    $connect->query($sql);
    $connect->close();

    Header('Location: ../profile.php');
    
    

?>