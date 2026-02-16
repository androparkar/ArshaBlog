<?php
require_once('../admin-includes/connection.php');

$type = $_POST['reqType'] ?? null;
$response = [
    'statusCode' => 500,
    'status' => 'failed',
    'msg' => 'Something went wrong',
    'data' => null
];

function fetchEdit($conn, $query)
{
    $result = mysqli_query($conn, $query);
    if (!$result) return null;
    return mysqli_fetch_assoc($result) ? : null ;
}


switch ($type) {

    case 'blog_category':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `blog_categories` WHERE `blog_cat_id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'blog':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT blogs.*, `author_name`, `blog_cat_name` FROM `blogs` INNER JOIN `authors` ON blogs.author_id = authors.author_id INNER JOIN `blog_categories` ON blogs.blog_cat_id = blog_categories.blog_cat_id WHERE `blog_id` = $id;");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'author':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `authors` WHERE `author_id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'teams':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `teams` WHERE `id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'portfolio':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `portfolios` WHERE `id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'services':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `services` WHERE `id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'faq':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `faq` WHERE `id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'pricing':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $data = fetchEdit($conn, "SELECT * FROM `pricings` WHERE `id` = $id");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => 'Data loaded',
                'data' => $data
            ];
        }
        break;
}

echo json_encode($response);
