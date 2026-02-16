<?php
require_once('../admin-includes/connection.php');
$id = $_REQUEST['id'];
$status = $_REQUEST['status'];
$updquery = "UPDATE `pricings` SET `status`= $status WHERE `id` = $id";
$updateSql = mysqli_query($conn, $updquery);