<?php include_once('../includes/header.php'); ?>
<?php include_once('src/user.inc.php'); ?>
<?php $register = new User(); ?>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="firstName">Firstname</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter firstname">
        </div>

        <div class="form-group">
            <label for="lastName">Lastname</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter lastname">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
        </div>

        <button type="submit" name="register" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 
if(isset($_POST['register'])){
    
    $fields = [
        ':firstname' =>  filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING),
        ':lastname' => filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING),
        ':email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING),
        ':password' => filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING),
        ':address' => filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING),
    ];
    $register->checkUserExists($fields);
}
?>
<?php include_once('../includes/footer.php'); ?>