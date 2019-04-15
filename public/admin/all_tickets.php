<?php include('includes/header.php'); ?>
<?php include('src/ticket.inc.php'); ?>
<?php
$ticket = new Ticket();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $rows = $ticket->selectAllTickets($id);
}
?>

<div class="dashboard">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Concert name</th>
                <th scope="col">Ticket Code</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            foreach ($rows as $row) { ?>
                <tr>
                    <th scope="row"><?php echo ($i) ?></th>
                    <td><?php echo ($row['concert_name']); ?></td>
                    <td><?php echo ($row['ticket_code']); ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>