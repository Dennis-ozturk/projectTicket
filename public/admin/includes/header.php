<?php require_once('../../db/config.php'); ?>
<?php session_start(); ?>
<?php require_once('src/user.inc.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tickets - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/functions/jquery.slim.min.js"></script>
    <script src="assets/functions/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>
    <!-- HEADER -->
    <?php if ($_SESSION['admin']) : ?>
        <header>
            <nav>
                <!-- MOBILE BTN:DROPDOWN -->
                <label for="toggle"><i class="fas fa-align-justify"></i></label>
                <input type="checkbox" id="toggle">
                <!-- MOBILE/WEB NAVIGATION -->
                <ul class="menu">
                    <li><a href="dashboard">Dashboard</a></li>
                    <li><a href="tickets">Tickets</a></li>
                    <li><a href="events">Events</a></li>
                    <li><a href="orders">Orders</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <?php else : ?>
        <?php header('location: index.php'); ?>
                <?php endif; ?>