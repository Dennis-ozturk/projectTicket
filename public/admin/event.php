<?php include('includes/header.php'); ?>
<?php require_once('src/event.inc.php'); ?>
<?php
$concert = new Concert();
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $concert->delete($id);
}
?>
<div class="dashboard">
    <?php include_once('new_event.php'); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Seats</th>
                <th scope="col">Location</th>
                <th scope="col">Price each</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $rows = $concert->getConcerts();
            $i = 1;
            if (empty($rows)) { } else {
                foreach ($rows as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo ($i) ?></th>
                        <td><?php echo ($row['c_id']); ?></td>
                        <td><?php echo ($row['concert_name']); ?></td>
                        <td><?php echo ($row['concert_type']); ?></td>
                        <td><?php echo ($row['capacity']); ?></td>
                        <td><?php echo ($row['name']); ?></td>
                        <td><?php echo ($row['price_each']); ?></td>
                        <td><?php echo ($row['starting_date']); ?></td>
                        <td><?php echo ($row['starting_time']); ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="edit_event.php?id=<?php echo ($row['c_id']); ?>">Edit</a>
                            <a class="btn btn-sm btn-danger" href="event.php?del=<?php echo ($row['c_id']); ?>">Delete</a>
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