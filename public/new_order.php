<?php
$data = $_POST['data'];
$newArray = [];

foreach ($data as $key => $value) {
    $newArray[$key] = $value;
}

setcookie('cookie', serialize($newArray), time() + 3600);
