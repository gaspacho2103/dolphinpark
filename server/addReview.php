<?php
    require_once ('config.php');

    if (!isset($_COOKIE['UserLogin'])) {
        Header('Location: ../Authorize.php');
        exit;
    }
    else {
        $userLogin = $_COOKIE['UserLogin'];
        $comment = $_POST['review'];
        $sql = "INSERT INTO `Reviews`(`UserLogin`, `Comment`) VALUES ('{$userLogin}','{$comment}')";
        $connection->query($sql);
        $connection->close();

        Header('Location: ../reviews.php');
    }
?>