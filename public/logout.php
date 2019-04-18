<?php
include_once('../includes/header.php');
include_once('src/user.inc.php');
$logout = new User();
$logout->exit();
