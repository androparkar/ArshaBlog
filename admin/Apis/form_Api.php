<?php
require_once('../admin-includes/connection.php');

if ($_REQUEST['reqType'] === "pages") {

    $teams = mysqli_real_escape_string($conn, $_REQUEST['teams']);
    $services = mysqli_real_escape_string($conn, $_REQUEST['services']);
    $portfolio = mysqli_real_escape_string($conn, $_REQUEST['portfolio']);
    $pricing = mysqli_real_escape_string($conn, $_REQUEST['pricing']);
    $faq = mysqli_real_escape_string($conn, $_REQUEST['faq']);
    $contact = mysqli_real_escape_string($conn, $_REQUEST['contact']);

    $row_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pages"));
    if ($row_count > 0) {
        $sql = mysqli_query($conn, "UPDATE pages SET teams='$teams',services='$services',portfolio='$portfolio',pricing='$pricing',faq='$faq',contact='$contact' WHERE id='1'");
    } else {
        $sql = mysqli_query($conn, "INSERT INTO pages( teams, services, portfolio, pricing, faq, contact) VALUES ('$teams','$services','$portfolio','$pricing','$faq','$contact')");
    }
    if ($sql) {
        echo json_encode([
            'statusCode' => 200,
            'status' => 'success',
            'msg' => 'Data saved'
        ]);
    } else {
        echo json_encode([
            'statusCode' => 500,
            'status' => 'failed',
            'msg' => 'Something went wrong'
        ]);
    }
}

if ($_REQUEST['reqType'] === "about_us") {

    $text = mysqli_real_escape_string($conn, $_REQUEST['text']);

    $row_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `about_us`"));
    if ($row_count > 0) {
        $sql = mysqli_query($conn, "UPDATE `about_us` SET `text`='$text' WHERE id='1'");
    } else {
        $sql = mysqli_query($conn, "INSERT INTO `about_us`(`text`) VALUES ('$text')");
    }
    if ($sql) {
        echo json_encode([
            'statusCode' => 200,
            'status' => 'success',
            'msg' => 'Data saved'
        ]);
    } else {
        echo json_encode([
            'statusCode' => 500,
            'status' => 'failed',
            'msg' => 'Something went wrong'
        ]);
    }
}
