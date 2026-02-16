<?php
require_once('../admin-includes/connection.php');

$type = $_POST['reqType'] ?? null;
$response = [
    'statusCode' => 500,
    'status' => 'failed',
    'msg' => 'Something went wrong',
    'data' => null
];

function fetchSelect($conn, $query)
{
    $result = mysqli_query($conn, $query);
    if (!$result) {
        return false;
    } else {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $options = "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            $data[] = $options;
        }
        return $data;
    }
}


switch ($type) {

    case 'portfolio_images':
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $result = mysqli_query($conn, "SELECT * FROM `portfolio_images` WHERE `project_id` = $id");
        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'blog_category':
        $data = fetchSelect($conn, "SELECT `blog_cat_id` AS `id`, `blog_cat_name` AS `name` FROM `blog_categories`");
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
        $data = fetchSelect($conn, "SELECT `author_id` AS `id`, `author_name` AS `name` FROM `authors`");
        if ($data) {
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];
        }
        break;

    case 'pricing':
        $result = mysqli_query($conn, "SELECT `id`, `plan_name`, `cost` FROM `pricings`");
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $options = "<option value='" . $row['id'] . "'>" . $row['plan_name'] . "@ $" . $row['cost'] . "</option>";
            $data[] = $options;
        }
        if ($data) {
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
