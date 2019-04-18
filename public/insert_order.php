<?php
include_once('../includes/header.php');
include_once('src/order.inc.php');
$order = new Order();
$data = unserialize($_COOKIE['cookie'], ["allowed_classes" => false]);
$user = $_SESSION['user'];

if (!empty($data)) {
    $order->insertOrder($data, $user);
} else {
    header("location: /");
}

// setcookie("cookie", "", time()-3600);
