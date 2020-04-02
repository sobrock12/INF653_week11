<?php session_start(); ?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>


<?php if (!isset($_SESSION['user'])) { ?>
<div id="register_link"><h2><a href="register.php">Register</a></div></h2>
<?php } ?>

<?php if (isset($_SESSION['user'])) { ?>
<div id="register_link"><h2>Welcome <?php echo ($_SESSION['user']); ?>! (<a href="logout.php">Sign Out</a>)</h2>
<?php } ?>

    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
</head>

<!-- the body section -->
<body>
    <header>
        <h1>--------Zippy Used Autos--------</h1><hr>
    </header>

<div id="centered">
    <h2>Looking for a vehicle? Search our inventory here!</h2>
</div>