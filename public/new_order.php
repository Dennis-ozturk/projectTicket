<?php
$values = $_POST['data'];
foreach($values as $key => $value){
    echo $key . " : " . $value;
}