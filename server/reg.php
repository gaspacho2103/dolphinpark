<?php
    $name = $_POST['name'];
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = null;

    if (strlen($name) < 12) {
        $error = "Введите корректное имя";
        exit($error);
    }
    if (strlen($email) < 8) {
        $error= "Введите корректный Email";
        exit($error);
    }
    if (strlen($login) < 5) {
        $error = "Логин должен быть более длинным";
        exit($error);
    }
    if(strlen($password) < 6) {
        $error = "Пароль слишком короткий";
        exit($error);
    }
    
    $password = md5($password);

    require_once('config.php');

    $sql = "INSERT INTO `Users`(`Name`, `Login`, `Email`, `Password`, `AbonimentCode`, `Status`) VALUES ('{$name}','{$login}','{$email}','{$password}','0','0')";

    $connection->query($sql);
    $connection->close();

    Header('Location: ../authorize.php');
?>