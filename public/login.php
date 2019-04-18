<?php include_once('../includes/header.php'); ?>
<?php include_once('src/user.inc.php'); ?>
<?php $login = new User(); ?>
<!-- Login form -->
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
if (isset($_POST['login'])) {
    $email =  filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $login->getAllUsers($email, $password);
}
?>