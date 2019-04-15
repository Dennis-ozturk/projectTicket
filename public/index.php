<?php include_once('../includes/header.php'); ?>
<?php require_once('admin/src/ticket.inc.php'); ?>
<?php
$concert = new Ticket();
$slideshowIndex = 4;
$i = 4;
$concertIndex = 3;
$rows = $concert->getConcerts();

?>
<!-- Slideshow STARTS -->
<?php include_once('src/slideshow.php'); ?>


<div class="wrap">
    <?php
    if (empty($rows)) { } else {
        foreach ($rows as $row) {
            if ($i == 0) {
                break;
            } else { ?>
                <a href="tickets.php?id=<?php echo($row['c_id']); ?>&arena=<?php echo($row['id']); ?>">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/events/<?php echo $row['img']; ?>" class="card-img-top" alt="concert img">
                        <div class="text-content">
                            <p><?php echo $row['concert_name']; ?></p>
                            <p><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                </a>

                <?php
                $i--;
            }
        }
    }
    ?>
</div>

<!-- Subscribe START -->
<div class="subscribe">
    <div class="subscribe-content">
        <a href="register.php">
            <h1>
                Join today!
            </h1>
        </a>
    </div>
</div>
<!-- Subscribe END -->

<!-- Current Concerts STARTS -->
<div class="wrap wrap-content">
    <?php
    if (empty($rows)) { } else {
        foreach ($rows as $row) {
            if ($concertIndex == 0) {
                break;
            } else { ?>
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/events/<?php echo ($row['img']); ?>" class="card-img-top" alt="concert img">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo ($row['concert_name']); ?></h5>
                        <p class="card-text"><?php echo ($row['concert_description']); ?></p>
                        <a href="tickets.php?id=<?php echo($row['c_id']); ?>&arena=<?php echo($row['id']); ?>" class="btn btn-primary">Look for seats</a>
                    </div>
                </div>
                <?php
                $concertIndex--;
            }
        }
    }
    ?>
</div>
<!-- Current Concerts ENDS -->
<?php include_once('../includes/footer.php'); ?>