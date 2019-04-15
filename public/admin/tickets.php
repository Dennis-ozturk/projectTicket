<?php include('includes/header.php'); ?>
<?php include('src/ticket.inc.php'); ?>
<?php
$ticket = new Ticket();
?>

<div class="dashboard">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Concert name</th>
                <th scope="col">Starting date</th>
                <th scope="col">Time starting</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $rows = $ticket->getConcerts();
            $i = 1;
            if (empty($rows)) { } else {
                foreach ($rows as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo ($i) ?></th>
                        <td><?php echo ($row['concert_name']); ?></td>
                        <td><?php echo ($row['starting_date']); ?></td>
                        <td><?php echo ($row['starting_time']); ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="all_tickets.php?id=<?php echo ($row['c_id']); ?>">All tickets</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>