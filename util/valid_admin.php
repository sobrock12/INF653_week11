<?php
require_once('model/database.php');
require_once('model/admin_db.php');


$username = '';
$password = '';

if (!isset($_SESSION['is_valid_admin'])) {
    header("Location: zippy_admin_login.php");
    exit();
}

?>