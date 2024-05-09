<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require ('elements/head.php');
        ?>
        <link rel="stylesheet" href="css/window.css">
    </head>
    <body>
            <form class="authorize" action="server/auth.php" method="post">
                <h2 class="auth__title">Авторизация</h2>
                <div class="form__group">
                    <input class="form__input" type="text" name="login" placeholder=" ">
                    <label class="form__label">Введите логин</label>
                </div>
                <div class="form__group">
                    <input class="form__input" type="email" name="email" placeholder=" ">
                    <label class="form__label">Введите Email</label>
                </div>
                <div class="form__group">
                    <input class="form__input" type="text" name="password" placeholder=" ">
                    <label class="form__label">Введите пароль</label>
                </div>
                <button type="submit" class="authButton">Войти</button><br>
                <a class="regPage" href="/register.php">У меня нет аккаунта</a>
            </form>
    </body>
</html>