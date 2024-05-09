<?php
    setcookie('UserLogin', '', time() - 3600 * 24 * 14, '/');
    Header('Location: ../');
?>