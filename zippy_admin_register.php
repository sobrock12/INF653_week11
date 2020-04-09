<?php include 'view/zippy_admin_header.php'; ?>
<?php include 'model/database.php'; ?>
<?php include 'model/admin_db.php'; ?>
<?php require_once('util/valid_admin.php'); ?>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $error_username = '';
    $error_password = '';
    $error_confirm_password = '';
    
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $confirm_password = filter_input(INPUT_POST, 'confirm_password');

    if (empty($username)) {
        $error_username = 'Username field is empty!';
    }

    $username_length = strlen($username);
    if ($username_length < 6) {
        $error_username = 'Username must be at least 6 characters!';
    }

    if (!empty($username)) {
        global $db;
        $query = 'SELECT username FROM administrators 
                    WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $existing_username = $statement->fetch();
        $statement->closeCursor();
    
        if (!empty($existing_username)) {
            $error_username = 'Username already exists!';
        }
    }

    if (empty($password)) {
        $error_password = 'Password field is empty!';
    }

    if (!preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,255})/", $password)) {
        $error_password = 'Password must contain one upper & lowercase letter, one number, and be at least 8 characters long!';
    }

    if ($password != $confirm_password) {
        $error_confirm_password = 'The passwords you entered did not match!';
    }

    if (empty($error_username) && empty($error_password) && empty($error_confirm_password)) {
        add_admin($username, $password);
        header("Location: zippy_admin_index.php");
    }

}
?>

<main>

    
<div id="centered_form">

    <h2>Register a new admin user</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="admin_register">
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

            <label>Confirm Password:</label>
            <input type="text" name="confirm_password" max="255" required>
            
            <?php if(!empty($error_confirm_password)) { ?>
            <div id="errormessage"> <?php echo $error_confirm_password?> 
            </div>
            <?php } ?>

            <br>

            <input type="submit" value="Register"><br>
        </form>

</div>

</main>

<?php include 'view/footer.php';?>