<?php
require_once('includes/header.php');
require_once('src/event.inc.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $item = new Concert();
    $result = $item->selectOneProduct($id);
}
?>
<div class="container">
    <h4>Edit product</h4>
    <form action="" method="POST">
        <div class="form-group">
            <label for="concertName">Event name</label>
            <input type="text" class="form-control" name="concertName" placeholder="Concert name" value="<?php echo ($result['concert_name']); ?>">
        </div>
        <div class="form-group">
            <label for="price">Price each</label>
            <input type="text" class="form-control" name="price" placeholder="Price each" value="<?php echo ($result['price_each']); ?>">
        </div>
        <div class="form-group">
            <label for="startingDate">Starting date</label>
            <input type="date" class="form-control" name="startingDate" value="<?php echo ($result['starting_date']); ?>">
        </div>
        <div class="form-group">
            <label for="startingTime">Starting time</label>
            <input type="time" class="form-control" name="startingTime" value="<?php echo ($result['starting_time']); ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        <a class="btn btn-danger" href="event.php">Back</a>
    </form>
</div>
<?php

if (isset($_POST['submit'])) {
    $fields = [
        ':concertName' => filter_input(INPUT_POST, 'concertName', FILTER_SANITIZE_STRING),
        ':priceEach' => filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT),
        ':startingDate' => filter_input(INPUT_POST, 'startingDate', FILTER_SANITIZE_STRING),
        ':startingTime' => filter_input(INPUT_POST, 'startingTime', FILTER_SANITIZE_STRING),
    ];
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $editConcert = new Concert();
    $editConcert->edit($fields, $id);
}

?>