<?php
require_once('../admin-includes/connection.php');
$id = $_REQUEST['id'];
$curStat = $_REQUEST['curStatus'];
$planId = $_REQUEST['plan_id'];
$updateSts = 1;
if ($curStat == 'active') {
    $updateSts = 0;
}
$dbColumn = '';
switch ($id) {
    case 'f1':
        $dbColumn = 'feature_1_sts';
        break;

    case 'f2':
        $dbColumn = 'feature_2_sts';
        break;

    case 'f3':
        $dbColumn = 'feature_3_sts';
        break;

    case 'f4':
        $dbColumn = 'feature_4_sts';
        break;

    case 'f5':
        $dbColumn = 'feature_5_sts';
        break;

    default:
        $dbColumn = '';
}
$updateSql = mysqli_query($conn, "UPDATE `pricings` SET `$dbColumn`= $updateSts WHERE `id` = $planId");