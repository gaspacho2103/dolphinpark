<?php
    $id = $_GET['id'];
    require_once('../config.php');
    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
    $sql = "DELETE FROM `Aboniments` WHERE `Id` = '$id'";
    $connect->query($sql);
    $connect->close();
    Header('Location: ../../admin.php');
?>