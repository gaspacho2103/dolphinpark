<?php
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $password = md5($password);

    $cookie_time = time() * 60 * 14;

    require_once('config.php');

    $sql = "SELECT * FROM `Users` WHERE `Login` = '{$login}' AND `Password` = '{$password}'";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();
    if ($user['Id'] != 0) {
        setcookie('UserLogin', $user['Login'], time() + 3600 * 24 * 14, '/');
        setcookie('UserPassword', $user['Password'], time() + 3600 * 24 * 14, '/');
        Header('Location: ../');
    } else echo 'Неверно введен логин или пароль';

    $connection->close();
?>