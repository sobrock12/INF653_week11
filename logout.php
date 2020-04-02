<?php session_start();?>

<!DOCTYPE html>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
    </head>

    <body>
    <header>
        <h1>--------Zippy Used Autos--------</h1><hr>
    </header>

    <main>

    <div id="user_welcome">

        <h2>Thank you for signing out, <?php echo ($_SESSION['user']); ?>.</h2>
        <a href="index.php">Click here</a> to view our vehicle list.

<?php include 'view/footer.php';?>

<?php

    unset($_SESSION['user']);

    $_SESSION = array();
    session_destroy();
    
    $name = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
    
?>