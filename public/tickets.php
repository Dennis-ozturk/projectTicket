<?php include_once('../includes/header.php'); ?>
<?php require_once('admin/src/ticket.inc.php'); ?>
<?php
$ticket = new Ticket();
if (isset($_GET['id'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
    $arenaId = $_GET['arena'];
    $tickets = $ticket->selectAllTickets($id, $arenaId);
}
?>
<div class="wrap-product-price">
    <div class="column title">
        <h6><?php echo $tickets[0]['concert_name']; ?></h6>
    </div>

    <div class="column title">
        <h6>Stadium: <?php echo $tickets[0]['name']; ?></h6>
    </div>

    <div class="column title">
        <h6>Total Seats: <?php echo $tickets[0]['capacity']; ?></h6>
    </div>

    <div class="column title">
        <h6>Price: <?php echo $tickets[0]['price_each']; ?>kr</h6>
    </div>

    <div class="column checkout-btn">
        <a href="checkout.php">Continue to checkout</a>
    </div>
</div>

<div class="arena">
    <form action="" method="post">
        <div class="top row-1">

            <?php for ($i = 0; $i < 364; $i++) { ?>
                <div class="round">
                    <input type="checkbox" id="top_checbox<?php echo ($i) ?>" />
                    <label for="top_checbox<?php echo ($i) ?>"></label>
                </div>
            <?php } ?>
        </div>

        <div class="arena-stage">
            <h1>(Arena Name)</h1>
        </div>

        <div class="round bottom">
            <?php for ($i = 0; $i < 364; $i++) { ?>
                <div class="round">
                    <input type="checkbox" id="bottom_checkbox<?php echo ($i) ?>" />
                    <label for="bottom_checbox<?php echo ($i) ?>"></label>
                </div>
            <?php } ?>
        </div>
    </form>

</div>

<?php include_once('../includes/footer.php'); ?>