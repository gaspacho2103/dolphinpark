<?php
    require_once('server/config.php');
    $userLogin = $_COOKIE['UserLogin'];
    $userPassword = $_COOKIE['UserPassword'];
    $sql = "SELECT * FROM `Users` WHERE `Login` = '$userLogin' AND `Password` = '$userPassword'";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();
    $connection->close();
?>

<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <?php
        require ('elements/head.php');
        ?>
        <link rel="stylesheet" href="css/reviews.css">
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
                <div class="stat__block">
                    <div class="main__stat">
                        <h3 class="stat_title">Отзывы наших клиентов</h3>
                        <h3 class="stat_sub">Оставьте свой отзыв</h3>
                    </div>
                    <div class="stat__image">
                        <img src="assets/images/aqua.jpg">
                    </div>
                </div>
                <div class="reviews__block">
                    <div class="review__comment">
                        <form class="rev_com" action="server/addReview.php" method="post">
                            <textarea type="text" name="review" placeholder="Напишите о своих впечатлениях" rows="5"></textarea><br>
                            <button type="submit" class="senderRevButton">Отправить</button>
                        </form>
                    </div>
                    <div class="reviews">
                        <?php
                            $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                            $sqlRev = "SELECT * FROM `Reviews` ORDER BY `Id` DESC";
                            $result = $connect->query($sqlRev);

                            for ($review=array(); $row=$result->fetch_assoc(); $review[]=$row) {

                            }
                            
                            foreach($review as $k=>$v) {
                                $nickname = $v['UserLogin'];
                                $text = $v['Comment'];

                                echo "<div class='review__card'>
                                <div class='avatar'>
                                    <img src='assets/icons/diver.png'>
                                </div>
                                <div class='rev_content'>
                                    <h4 class='nickname'>$nickname</h4>
                                    <p class='rev_desc'>
                                    $text
                                    </p>
                                </div>
                                </div>";
                            }

                            $connect->close();
                        ?>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <?php
                require ('elements/footer.php');
            ?>
        </footer>
    </body>