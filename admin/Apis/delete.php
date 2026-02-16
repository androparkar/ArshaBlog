<?php
require_once('../admin-includes/connection.php');

$type = $_POST['reqType'] ?? null;

function delete($conn, $query)
{
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return $id;
        } else {
            $error = "Error deleting record: " . mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            return $error;
        }
    }
}

switch ($type) {

    case 'blog_category':
        $response = delete($conn, "DELETE FROM `blog_categories` WHERE `blog_cat_id` = ?");
        echo $response;
        break;

    case 'blog':
        $response = delete($conn, "DELETE FROM `blogs` WHERE `blog_id` = ?");
        echo $response;
        break;

    case 'author':
        $response = delete($conn, "DELETE FROM `authors` WHERE `author_id` = ?");
        echo $response;
        break;

    case 'teams':
        $response = delete($conn, "DELETE FROM `teams` WHERE `id` = ?");
        echo $response;
        break;

    case 'portfolio':
        $response = delete($conn, "DELETE FROM `portfolios` WHERE `id` = ?");
        $response = delete($conn, "DELETE FROM `portfolio_images` WHERE `project_id` = ?");
        echo $response;
        break;

    case 'pricing':
        $response = delete($conn, "DELETE FROM `pricings` WHERE `id` = ?");
        echo $response;
        break;

    case 'services':
        $response = delete($conn, "DELETE FROM `services` WHERE `id` = ?");
        echo $response;
        break;

    case 'faq':
        $response = delete($conn, "DELETE FROM `faq` WHERE `id` = ?");
        echo $response;
        break;
}
