<?php
    // setcookie('UserLogin', '', time() - 3600 * 24 * 14, '/');
    // setcookie('AbonimentCode', '', time() - 3600 * 24 * 30, '/');

    require_once('server/config.php');
    $userLogin = $_COOKIE['UserLogin'];
    $userPassword = $_COOKIE['UserPassword'];
    $sql = "SELECT * FROM `Users` WHERE `Login` = '$userLogin' AND `Password` = '$userPassword'";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();
    $connection->close();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require ('elements/head.php');
        ?>
    </head>
    <body>
        <header class="header">
            <div class="container header__container">
                <div class="header__logo">
                    <a href="../"><img class="logo"></a>
                </div>
                <nav class="header__nav">
                    <ul class="default__nav">
                        <li><a class="nav__link smooth-btn" href="#rates">Тарифы</a></li>
                        <li><a class="nav__link" href="/reviews.php">Отзывы</a></li>
                        <li><a class="nav__link smooth-btn" href="#footer">Контакты</a></li>
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
        <main class="main" id="main">
            <section class="intro">
                <div class="container">
                    <h2 class="intro__heading">Окунитесь в мир радости и веселья!</h2>
                    <h3 class="intro__subtitle">вместе с <strong>Dolphin Aquapark</strong></h3>
                    <div class="intro__links">
                        <a class="link-primary" href="#rates">Купить абонимент</a>
                        <a class="link" href="#about">Узнать больше</a>
                    </div>
            </section>
            <section class="about" id="about">
            <h2 class="main__title">Наши условия</h2>
                <div class="container">
                    <div class="about__block">
                        <div class="about__card">
                            <img class="about_img" src="assets/images/about1.jpg">
                            <h3 class="about_title">Обширный выбор развлечений</h3>
                            <h5 class="about_subtitle">В аквапарках <strong>Dolphin</strong> имеется большое количество горок, бассейнов и других развлечений</h5>
                        </div>
                        <div class="about__card">
                            <img class="about_img" src="assets/images/about2.jpg">
                            <h3 class="about_title">Отличный персонал аквапарка</h3>
                            <h5 class="about_subtitle">В сети аквапарков <strong>Dolphin</strong> работают квалифицированные специалисты в своих областях</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section class="geolocation">
            <h2 class="main__title special__title">Наши точки</h2>
                <div class="container">
                    <div class="geolocation__block">
                        <div class="geolocation_text">
                            <h3 class="geolocation_title">Адреса сети аквапарков <strong>Dolphin</strong></h3>
                            <form action="">
                                <select>
                                    <?php
                                            $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                            $sqlGeo = "SELECT * FROM `Geo`";
                                            $result = $connect->query($sqlGeo);

                                            while($row=$result->fetch_assoc()) {
                                                echo "<option>$row[Address]</option>";
                                            }

                                            $connect->close();
                                    ?>
                                </select>
                            </form>
                        </div>
                        <div class="geolocation_card">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2a7289cd7c5982ae4636ffea8076f12dbc0eacfdf8d527b38b2c6cea256bf0ea&amp;source=constructor" height="400" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <section class="rates" id="rates">
                <div class="container">
                <h2 class="main__title">Тарифы посещения <strong>Dolphin</strong></h2>
                    <div class="rates__block">
                        <div class="rate__card">
                            <img class="rate_img" src="assets/icons/rate1.png">
                            <h3 class="rate_title">Relax Mini</h3>
                            <h5 class="rate_subtitle">Тариф для комфортного одиночного отдыха</h5>
                            <div class="rate_desc">
                                <ul>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> Набор для купания</li>
                                    <li><img src='assets/icons/close.png' class='cond__icon'> Вход с гостями</li>
                                    <li><img src='assets/icons/close.png' class='cond__icon'> VIP-горки</li>
                                    <li><img src='assets/icons/close.png' class='cond__icon'> Сауна</li>
                                </ul>
                            </div>
                            <a class="rate_link" href="/order.php?id=1" type="submit">Купить</a>
                        </div>
                        <div class="rate__card">
                            <img class="rate_img" src="assets/icons/rate2.png">
                            <h3 class="rate_title">Standart</h3>
                            <h5 class="rate_subtitle">Стандартный тариф для посещения с семьей</h5>
                            <div class="rate_desc">
                                <ul>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> Набор для купания</li>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> Вход с гостями</li>
                                    <li><img src='assets/icons/close.png' class='cond__icon'> VIP-горки</li>
                                    <li><img src='assets/icons/close.png' class='cond__icon'> Сауна</li>
                                </ul>
                            </div>
                            <a class="rate_link" href="/order.php?id=2" type="submit">Купить</a>
                        </div>
                        <div class="rate__card">
                            <img class="rate_img" src="assets/icons/rate3.png">
                            <h3 class="rate_title">Dolphin +</h3>
                            <h5 class="rate_subtitle">Всё включено! Незабываемый отдых по этому тарифу</h5>
                            <div class="rate_desc">
                                <ul>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> Набор для купания</li>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> Вход с гостями</li>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> VIP-горки</li>
                                    <li><img src='assets/icons/success.png' class='cond__icon'> Сауна</li>
                                </ul>
                            </div>
                            <a class="rate_link" href="/order.php?id=3" type="submit">Купить</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer" id="footer">
            <?php
                require('elements/footer.php');
            ?>
        </footer>
    <script type="text/javascript" src="script/links.js"></script>
    </body>
</html>