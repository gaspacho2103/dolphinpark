<?php
    if (!isset($_COOKIE['UserLogin'])) {
        Header('Location: /authorize.php');
    }

    require_once('server/config.php');

    $login = $_COOKIE['UserLogin'];

    $sql = "SELECT `Status` FROM `Users` WHERE `Login` = '{$login}'";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();

    if ($user['Status'] == 0) {
        Header('Location: ../');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php
            require ('elements/head.php');
        ?>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
    <header class="header">
            <div class="container header__container">
                <div class="header_logo">
                    <a href="../"><img class="admlogo"></a>
                </div>
            </div>
    </header>
        <main class="admin">
            <div class="fullPage">
                <nav class="navigation">
                    <ul class="nav__ul">
                        <li><a href="?page=company" class="adm-link">Компания</a></li>
                        <li><a href="?page=users" class="adm-link">Пользователи</a></li>
                        <li><a href="?page=aboniments" class="adm-link">Абонименты</a></li>
                        <li><a href="?page=rates" class="adm-link">Тарифы</a></li>
                        <li><a href="?page=reviews" class="adm-link">Отзывы</a></li>
                        <li><a href="?page=addresses" class="adm-link">Адреса</a></li>
                    </ul>
                </nav>
                <div class="pageDisplay">
                    <?php
                        $block = $_GET['page'];

                        switch ($block) {
                            case 'company':
                                $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                $sql = "SELECT * FROM `Company`";
                                $result = $connect->query($sql);
                                
                                echo "<h3 class='tableTitle'>Таблица 'Company'</h3>
                                    <br><table class='table'>
                                    <thead>
                                        <tr>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Telegram</th>
                                            <th>YouTube</th>
                                            <th>Instagram</th>
                                            <th>VK</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                while($row=$result->fetch_assoc()) {
                                echo "
                                            <tr>
                                                <td>$row[Telephone]</td>
                                                <td>$row[Email]</td>
                                                <td>$row[Telegram]</td>
                                                <td>$row[Youtube]</td>
                                                <td>$row[Instagram]</td>
                                                <td>$row[Vkontakte]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm text-light' href='server/admin/updateCompany.php'>Редактирование</a>
                                                </td>
                                            </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            break;
                            case 'users':
                                $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                $sql = "SELECT * FROM `Users`";
                                $result = $connect->query($sql);
                                
                                echo "<h3 class='tableTitle'>Таблица 'Users'</h3>
                                <br><a class='btn btn-success text-light mt-1 mb-3' href='server/admin/createUser.php'>Новый пользователь</a><table class='table'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Login</th>
                                        <th>Email</th>
                                        <th>AbonimentCode</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row=$result->fetch_assoc()) {
                                    echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Name]</td>
                                                <td>$row[Login]</td>
                                                <td>$row[Email]</td>
                                                <td>$row[AbonimentCode]</td>
                                                <td>$row[Status]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm text-light' href='server/admin/updateUser.php?id=$row[Id]'>Редактирование</a>
                                                    <a class='btn btn-danger btn-sm text-light' href='server/admin/deleteUser.php?id=$row[Id]'>Удаление</a>
                                                </td>
                                            </tr>
                                        ";
                                }
                                echo "</tbody>
                                </table>";
                            break;
                            case 'aboniments':
                                $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                $sql = "SELECT * FROM `Aboniments`";
                                $result = $connect->query($sql);
                                
                                echo "<h3 class='tableTitle'>Таблица 'Aboniments'</h3>
                                <br><table class='table'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>UserLogin</th>
                                        <th>AbonimentCode</th>
                                        <th>TarifName</th>
                                        <th>BuyDate</th>
                                        <th>CloseDate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row=$result->fetch_assoc()) {
                                    echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[UserLogin]</td>
                                                <td>$row[AbonimentCode]</td>
                                                <td>$row[TarifName]</td>
                                                <td>$row[BuyDate]</td>
                                                <td>$row[CloseDate]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm text-light' href='server/admin/updateAboniment.php?id=$row[Id]'>Редактирование</a>
                                                    <a class='btn btn-danger btn-sm text-light' href='server/admin/deleteAboniment.php?id=$row[Id]'>Удаление</a>
                                                </td>
                                            </tr>
                                        ";
                                }
                                echo "</tbody>
                                </table>";
                            break;
                            case 'rates':
                                $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                $sql = "SELECT * FROM `Rates`";
                                $result = $connect->query($sql);
                                
                                echo "<h3 class='tableTitle'>Таблица 'Rates'</h3>
                                <br><table class='table'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Conditions</th>
                                        <th>Days</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row=$result->fetch_assoc()) {
                                    echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Name]</td>
                                                <td>$row[Conditions]</td>
                                                <td>$row[Days]</td>
                                                <td>$row[Price]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm text-light' href='server/admin/updateRate.php?id=$row[Id]'>Редактирование</a>
                                                </td>
                                            </tr>
                                        ";
                                }
                                echo "</tbody>
                                </table>";
                            break;
                            case 'reviews':
                                $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                $sql = "SELECT * FROM `Reviews`";
                                $result = $connect->query($sql);
                                
                                echo "<h3 class='tableTitle'>Таблица 'Reviews'</h3>
                                <br><a class='btn btn-success text-light mt-1 mb-3' href='server/admin/createReview.php'>Новый отзыв</a><table class='table'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>UserLogin</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row=$result->fetch_assoc()) {
                                    echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[UserLogin]</td>
                                                <td>$row[Comment]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm text-light' href='server/admin/updateReview.php?id=$row[Id]'>Редактирование</a>
                                                    <a class='btn btn-danger btn-sm text-light' href='server/admin/deleteReview.php?id=$row[Id]'>Удаление</a>
                                                </td>
                                            </tr>
                                        ";
                                }
                                echo "</tbody>
                                </table>";
                            break;
                            case 'addresses':
                                $connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
                                $sql = "SELECT * FROM `Geo`";
                                $result = $connect->query($sql);
                                
                                echo "<h3 class='tableTitle'>Таблица 'Addresses'</h3>
                                <br><a class='btn btn-success text-light mt-1 mb-3' href='server/admin/createAddress.php'>Новый адрес</a><table class='table'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while($row=$result->fetch_assoc()) {
                                    echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Address]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm text-light' href='server/admin/updateAddress.php?id=$row[Id]'>Редактирование</a>
                                                    <a class='btn btn-danger btn-sm text-light' href='server/admin/deleteAddress.php?id=$row[Id]'>Удаление</a>
                                                </td>
                                            </tr>
                                        ";
                                }
                                echo "</tbody>
                                </table>";
                            break;
                            default: echo "";break;
                        }
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>