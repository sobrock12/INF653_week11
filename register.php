
<?php 
    if (!isset($firstname)) {
        $firstname = filter_input(INPUT_GET, 'firstname');
    }
?>

<?php if ($firstname != NULL) { ?>

    <?php 
    $lifetime = 60 *60 * 24 * 365;
    $path = '/';
    session_set_cookie_params($lifetime, $path);
    session_start();
    $_SESSION['user'] = $firstname;
    ?>

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

        <h2>Thank you for registering, <?php echo $firstname; ?>!</h2>
        <a href="index.php">Click here</a> to view our vehicle list.

    <?php } ?>


<?php if ($firstname == NULL) { ?>

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

    
    <div id="centered_form">

        <p>Please enter your first name:</p>

            <form action="" method="get" id="firstname">
                <input type="text" name="firstname" max="30" required><br>
                <input type="submit" value="Register"><br>
            </form>

    </div>
    
    </main>

<?php } ?>

<?php include 'view/footer.php'; ?>
