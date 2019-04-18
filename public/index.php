<?php include_once('../includes/header.php'); ?>
<?php require_once('admin/src/ticket.inc.php'); ?>
<?php
$concert = new Ticket();
$slideshowIndex = 4;
$i = 4;
$concertIndex = 3;
$rows = $concert->getConcerts();
?>
<!-- Slideshow -->
<?php include_once('src/slideshow.php'); ?>


<div class="wrap">
    <?php
    // If there is no events display nothing else loop all events
    if (empty($rows)) { } else {
        foreach ($rows as $row) {
            if ($i == 0) {
                break;
            } else { ?>
                <a href="tickets.php?id=<?php echo ($row['c_id']); ?>&arena=<?php echo ($row['id']); ?>">
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

<!-- Current Concerts  -->
<div class="wrap wrap-content">
    <?php
    // Same thing as above but with different style and html
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
                        <a href="tickets.php?id=<?php echo ($row['c_id']); ?>&arena=<?php echo ($row['id']); ?>" class="btn btn-primary">Look for seats</a>
                    </div>
                </div>
                <?php
                $concertIndex--;
            }
        }
    }
    ?>
</div>
<?php include_once('../includes/footer.php'); ?>