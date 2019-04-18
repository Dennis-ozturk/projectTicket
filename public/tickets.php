<?php include_once('../includes/header.php'); ?>
<?php require_once('admin/src/ticket.inc.php'); ?>
<?php
$ticket = new Ticket();
//Get id from url and check if visitor is logged in
if (isset($_GET['id']) && isset($_SESSION['user'])) {
    //Regex that only allows a-z A-Z and 0-9 nothing else
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
    $arenaId = $_GET['arena'];
    $tickets = $ticket->selectAllTickets($id, $arenaId);
    ?>
    <form action="" method="post" class="ticketData" id="ticketData" target="formData">
        <div class="wrap-product-price">
            <div class="column title">
                <h6 id="eventName"><?php echo $tickets[0]['concert_name']; ?></h6>
            </div>

            <div class="column title">
                <h6>Stadium: <?php echo $tickets[0]['name']; ?></h6>
            </div>

            <div class="column title">
                <h6>Total Seats: <?php echo $tickets[0]['capacity']; ?></h6>
            </div>

            <div class="column title">
                <h6 id="eventPrice"><?php echo $tickets[0]['price_each']; ?></h6>
            </div>

            <div class="column">
                <input class="checkout-btn" type="submit" name="check">
            </div>
        </div>

        <div class="arena">
            <div class="row-1">
                <?php
                $rows = $ticket->selectAllTickets($id, $arenaId);
                $i = $tickets[0]['capacity'];
                $half = $tickets[0]['capacity'] / 2;
                // If there is no tickets do nothing
                if (empty($rows)) { } else {
                    //If there is tickets display them
                    foreach ($rows as $row) {
                        //Making sure that it prints out half the tickets at top and half at bottom
                        if ($i > $half) { ?>
                            <div class="round">
                                <input type="checkbox" class="ticket" id="top_checbox<?php echo ($i) ?>" name="tickets[]" value="<?php echo ($row['ticket_code']); ?>" />
                                <label for="top_checbox<?php echo ($i) ?>"></label>
                            </div>
                            <?php
                            $i--;
                        } elseif ($i === $half) { ?>
                            <div class="round">
                                <input type="checkbox" class="ticket" id="top_checbox<?php echo ($i) ?>" name="tickets[]" value="<?php echo ($row['ticket_code']); ?>" />
                                <label for="top_checbox<?php echo ($i) ?>"></label>
                            </div>

                            <div class="arena-stage">
                                <h1><?php echo $tickets[0]['name']; ?></h1>
                            </div>
                            <?php
                            $i--;
                        } elseif ($i < $half) { ?>
                            <div class="round">
                                <input type="checkbox" class="ticket" id="bottom_checkbox<?php echo ($i) ?>" name="tickets[]" value="<?php echo ($row['ticket_code']); ?>" />
                                <label for="bottom_checkbox<?php echo ($i) ?>"></label>
                            </div>
                            <?php
                            $i--;
                        }
                    }
                }
                ?>
            </div>
    </form>
    <iframe name="formData" style="display:none;"></iframe>

    <?php
    if (isset($_POST['check'])) {
        $all_tickets = $_POST['tickets'];
        print_r($all_tickets);
    }
    ?>
    </div>
<?php } else { ?>
    <h1>You need to register before purchase a ticket </h1>
    <?php
    header('refresh: 3; url=register.php');
}
?>

<?php include_once('../includes/footer.php'); ?>