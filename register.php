<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require ('elements/head.php');
        ?>
        <link rel="stylesheet" href="css/window.css">
    </head>
    <body>
            <form class="register" action="server/reg.php" method="post">
                <h2 class="reg__title">Регистрация</h2>
                <div class="form__group">
                    <input class="form__input" type="text" name="name" placeholder=" ">
                    <label class="form__label">Введите имя и фамилию</label>
                </div>
                <div class="form__group">
                    <input class="form__input" type="text" name="login" placeholder=" ">
                    <label class="form__label">Придумайте логин</label>
                </div>
                <div class="form__group">
                    <input class="form__input" type="email" name="email" placeholder=" ">
                    <label class="form__label">Введите Email</label>
                </div>
                <div class="form__group">
                    <input class="form__input" type="text" name="password" placeholder=" ">
                    <label class="form__label">Придумайте пароль</label>
                </div>
                <button type="submit" class="regButton">Отправить</button><br>
                <a class="authPage" href="/authorize.php">У меня уже есть аккаунт</a>
            </form>
    </body>
</html>