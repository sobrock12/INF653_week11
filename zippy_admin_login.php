<?php include 'view/zippy_admin_header.php'; ?>
<?php include 'model/database.php'; ?>
<?php include 'model/admin_db.php'; ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $error_username = '';
    $error_password = '';
    
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if (empty($username)) {
        $error_username = 'Username field is empty!';
    }

    if (empty($password)) {
        $error_password = 'Password field is empty!';
    }

    if (empty($error_username) && empty($error_password)) {
        if (is_valid_admin_login($username, $password)) {
            $lifetime = 60 *60 * 24 * 365;
            $path = '/';
            session_set_cookie_params($lifetime, $path);
            session_start();
            $_SESSION['is_valid_admin'] = true;
            header("Location: zippy_admin_index.php");
        } else {
            $error_username = 'Invalid Login! Please check credentials and try again.';
        }
    }
}
?>

<main>

    
<div id="centered_form">

    <h2>Admin Login</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="admin_login">
            <label>Username:</label>
            <input type="text" name="username" max="255" required>

            <?php if(!empty($error_username)) { ?>
            <div id="errormessage"> <?php echo $error_username?> 
            </div>
            <?php } ?>

            <br>


            <label>Password:</label>
            <input type="text" name="password" max="255" required>
            
            <?php if(!empty($error_password)) { ?>
            <div id="errormessage"> <?php echo $error_password?> 
            </div>
            <?php } ?>
            
            <br>

            <input type="submit" value="Login"><br>
        </form>

</div>

</main>

<?php include 'view/footer.php';?>