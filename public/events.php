<?php include_once('../includes/header.php'); ?>
<?php require_once('admin/src/ticket.inc.php'); ?>
<?php
$concert = new Ticket();
$i = 4;
$rows = $concert->getConcerts();
?>

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