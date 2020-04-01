<?php
    $dsn = 'mysql:host=zy4wtsaw3sjejnud.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=u26sv8lv0m5wz55b';
    $username = 'iqahukqx0bz5wzz6';
    $password = 'x5v8ho7v0b6fdled';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
