<?php include_once('../includes/header.php'); ?>

<div class="wrap-product-price">
    <div class="column title">
        <h6>Fotboll Sverige - Danmark</h6>
    </div>

    <div class="column title">
        <h6>Total seats: 80</h6>
    </div>

    <div class="column title">
        <h6>Available: 70</h6>
    </div>

    <div class="column title">
        <h6>Price per seat: $20</h6>
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
                <input type="checkbox" id="top_checbox<?php echo($i) ?>" />
                <label for="top_checbox<?php echo($i) ?>"></label>
            </div>
            <?php } ?>
        </div>

        <div class="arena-stage">
            <h1>(Arena Name)</h1>
        </div>

        <div class="round bottom">
            <?php for ($i = 0; $i < 364; $i++) { ?>
            <div class="round">
                <input type="checkbox" id="bottom_checkbox<?php echo($i) ?>" />
                <label for="bottom_checbox<?php echo($i) ?>"></label>
            </div>
            <?php } ?>
        </div>
    </form>

</div>

<?php include_once('../includes/footer.php'); ?>