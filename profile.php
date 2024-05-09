<?php
    require_once('server/config.php');
    $userLogin = $_COOKIE['UserLogin'];
    $userPassword = $_COOKIE['UserPassword'];
    $sql = "SELECT * FROM `Users` WHERE `Login` = '$userLogin' AND `Password` = '$userPassword'";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();
    $connection->close();

    $userLogin = $_COOKIE['UserLogin'];
    $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
    $sql = "SELECT * FROM `Aboniments` WHERE `UserLogin` = '{$userLogin}'";
    $result = $connect->query($sql);
    $aboniment = $result->fetch_assoc();

    $tarifName = $aboniment['TarifName'];
    $abonimentCode = $aboniment['AbonimentCode'];

    if (!isset($_COOKIE['UserLogin'])) {
        Header('Location: /authorize.php');
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            require('elements/head.php');
        ?>
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <header class="header">
            <div class="container header__container">
                <div class="header__logo">
                    <a href="../"><img class="logo"></a>
                </div>
                <nav class="header__nav">
                    <ul class="default__nav">
                        <li><a class="nav__link smooth-btn" href="../#rates">Тарифы</a></li>
                        <li><a class="nav__link" href="/reviews.php">Отзывы</a></li>
                        <li><a class="nav__link smooth-btn" href="../#footer">Контакты</a></li>
                    </ul>
                    <ul class="user__nav">
                        <?php
                            if (isset($_COOKIE['UserLogin']) && isset($_COOKIE['UserPassword'])) {
                                echo '<li><a class="nav_auth_link" href="/profile.php">Профиль</a></li>';
                                if ($user['Status'] == 1) {
                                    echo '<li><a class="nav_reg_link" href="/admin.php">Админка</a></li>';
                                }
                                echo '<li><a class="nav_exit_link" href="/server/exit.php">Выйти</a></li>';
                            }
                            else {
                                echo '<li><a class="nav_auth_link" href="/authorize.php">Войти</a></li>
                                <li><a class="nav_reg_link" href="/register.php">Регистрация</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <div class="profile__block">
                    <div class="avatar">
                        <img src="assets/icons/mask.png">
                    </div>
                    <div class="info__block">
                        <h3 class="surname"><?=$user['Name']?></h3>
                        <h4 class="login"><?=$user['Login']?></h4>
                        <ul class="info">
                            <li class="email">Почта: <?=$user['Email']?></li>
                            <?php
                                    echo "<li class='tarif'>Тариф: $tarifName</li>
                                    <li class='aboniment'>Код абонимента: $abonimentCode</li>";
                            ?>
                        </ul>
                        <!-- <div class="qr">
                            <img src="assets/images/qr.png">
                        </div> -->
                    </div>
            </div>
        </main>
        <footer class="footer">
            <?php
                require('elements/footer.php');
            ?>
        </footer>
    </body>
</html>