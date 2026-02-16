<?php
require_once('../admin-includes/connection.php');

$type = $_POST['reqType'] ?? null;
$response = [
    'statusCode' => 500,
    'status' => 'failed',
    'msg' => 'Something went wrong',
    'data' => null
];

function fetch($conn, $query, $singleRow = false)
{
    $result = mysqli_query($conn, $query);
    if (!$result) return false;

    if ($singleRow) {
        return mysqli_fetch_assoc($result) ?: [];
    } else {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}


switch ($type) {

    case 'blog_category':
        $data = fetch($conn, "SELECT * FROM `blog_categories`");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'blog':
        $data = fetch($conn, "SELECT blogs.*, `author_name`, `blog_cat_name` FROM `blogs` INNER JOIN `authors` ON blogs.author_id = authors.author_id INNER JOIN `blog_categories` ON blogs.blog_cat_id = blog_categories.blog_cat_id;");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'author':
        $data = fetch($conn, "SELECT * FROM `authors`");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'teams':
        $data = fetch($conn, "SELECT * FROM `teams`");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'portfolio':
        $data = fetch($conn, "SELECT * FROM `portfolios`");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'services':
        $data = fetch($conn, "SELECT * FROM `services`");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'faq':
        $data = fetch($conn, "SELECT * FROM `faq`");
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'pricing':
        $data = fetch($conn, "SELECT * FROM `pricings`");
        $response = [
            'statusCode' => 200,
            'status' => 'success',
            'msg' => empty($data) ? 'No data found' : 'Data loaded',
            'data' => $data
        ];

        break;

    case 'pages':
        $data = fetch($conn, "SELECT * FROM `pages`", true);
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'about_us':
        $data = fetch($conn, "SELECT * FROM `about_us`", true);
        if ($data !== false) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;
}

echo json_encode($response);
