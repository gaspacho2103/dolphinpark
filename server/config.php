<?php
    define('SERVERNAME','localhost');
    define('DB_LOGIN','root');
    define('DB_PASSWORD','');
    define('DB_NAME','DolphinPark');

    $connection = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
?>