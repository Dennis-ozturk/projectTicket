<?php include_once('../includes/header.php'); ?>
<?php include_once('src/user.inc.php'); ?>
<?php
$user_tickets = new User();
$rows = $user_tickets->userTickets();
$i = 1;
?>
<br>
<div class="container">
    <form action="" method="post">
        <ul class="list-group">
            <?php
            // Select all tickets and display them
            if (!empty($rows)) {
                foreach ($rows as $row) { ?>
                    <li class="list-group-items">Ticket: <?php echo ($i); ?></li>
                    <li class="list-group-item"><?php echo ($row['location']); ?></li>
                    <li class="list-group-item">Total price: <?php echo ($row['total']); ?>kr</li>
                    <li class="list-group-item">
                        <label><?php echo ($row['ticket_code']); ?></label>
                    </li>
                    <?php
                    $i++; ?>
                    <input class="btn btn-success" type="submit" name="activate" value="activate">
                <?php
            }
        } else {
            echo ("You have no tickets");
        }
        ?>
        </ul>
    </form>
    <?php
    // If active btn is pressed
    if (isset($_POST['activate'])) {
        //Delete the last post item
        array_pop($_POST);
        print_r($_POST);


        $user_tickets->deleteTickets($_POST);
        header("Location: user_tickets.php");
    }
    ?>
</div>
<br>