<?php require_once('../../db/config.php'); ?>
<?php session_start(); ?>
<?php require_once('src/user.inc.php'); ?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
</head>

<body class="admin_page">
    <h1>Admin panel</h1>
    <form action="" method="POST" class="form">

        <span>Username</span>
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <br>
        <span>Password</span>
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <br>
        <input type="submit" name="sub" value="Submit">
    </form>
    <?php 
    if (isset($_POST['sub'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $object = new User();
        $object->getAllUsers($username, $password);
    }
    ?>
</body>
</html> 