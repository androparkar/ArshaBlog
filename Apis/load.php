<?php
require_once('../includes/connection.php');

$reqType = $_POST['reqType'] ?? null;
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


switch ($reqType) {

    case 'blog_category': {
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
        }

    case 'category_item': {
            $query = "
            SELECT bc.blog_cat_id, bc.blog_cat_name, COUNT(b.blog_id) AS blog_count 
            FROM `blog_categories` bc 
            INNER JOIN blogs b ON bc.blog_cat_id = b.blog_cat_id 
            GROUP BY bc.blog_cat_id, bc.blog_cat_name;
        ";
            $data = fetch($conn, $query);
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

    case 'author_item': {
            $data = fetch($conn, "SELECT DISTINCT a.author_id, a.author_name FROM authors a INNER JOIN blogs b ON a.author_id = b.author_id");
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

    case 'blog': {
            $limit = $_POST['limit'];
            $page = $_POST['page_id'];
            $offset = ($page - 1) * $limit;
            $cat_id = intval($_POST['category_id']);
            $auth_id = intval($_POST['author_id']);
            $search_token = isset($_POST['search_token']) ? trim($_POST['search_token']) : '';

            // queries
            $rowQuery = "SELECT * FROM `blogs`";
            $mainQuery = "
                SELECT b.*, a.author_name, bc.blog_cat_name
                FROM `blogs` b 
                LEFT JOIN `authors` a ON b.author_id = a.author_id 
                LEFT JOIN `blog_categories` bc ON b.blog_cat_id = bc.blog_cat_id
                ";

            if (isset($search_token) && !empty($search_token)) {
                $mainQuery .= "
                    WHERE (b.blog_title LIKE '%$search_token%' 
                    OR a.author_name LIKE '%$search_token%')
                ";
            } else {
                $mainQuery .= "
                    WHERE b.blog_title LIKE '%$search_token%' 
                ";
            }

            if ($cat_id > 0) {
                $mainQuery .= "
                    AND b.blog_cat_id = $cat_id
                ";
                $rowQuery .= "WHERE blog_cat_id = $cat_id";
            }

            if ($auth_id > 0) {
                $mainQuery .= "
                AND b.author_id = $auth_id
                ";
                $rowQuery .= " WHERE author_id = $auth_id";
            }

            $mainQuery .= "
                ORDER by `updated_at` DESC
                LIMIT {$offset},{$limit}
            ";



            $data = fetch($conn, $mainQuery);
            $rows = mysqli_num_rows(mysqli_query($conn, $rowQuery));
            if ($data !== false) {
                $response = [
                    'statusCode' => 200,
                    'status' => 'success',
                    'msg' => empty($data) ? 'No data found' : 'Data loaded',
                    'data' => $data,
                    'row' => $rows
                ];
            }
            break;
        }

    case 'blog_recent': {
            $limit = $_POST['limit'];
            $offset = 7;
            $data = fetch($conn, "SELECT * FROM `blogs` ORDER by `updated_at` DESC LIMIT {$offset},{$limit};");
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

    case 'blog_item': {
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $mainQuery = "
                SELECT b.*, a.author_name, bc.blog_cat_name
                FROM `blogs` b 
                LEFT JOIN `authors` a ON b.author_id = a.author_id 
                LEFT JOIN `blog_categories` bc ON b.blog_cat_id = bc.blog_cat_id
                WHERE `blog_id` = $id;
                ";
            $data = fetch($conn, $mainQuery, true);

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

    case 'author': {
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
        }

    case 'teams': {
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
        }

    case 'portfolio': {
            $query = "
                SELECT p.id, p.project_name, p.project_category, p.client, 
                    p.project_description, p.project_date, pi.img_name
                FROM portfolios p
                LEFT JOIN portfolio_images pi 
                    ON pi.project_id = p.id
                ORDER BY p.id
            ";

            $rows = fetch($conn, $query);

            if ($rows !== false) {
                // Group images under each project
                $projects = [];
                foreach ($rows as $row) {
                    $id = $row['id'];
                    if (!isset($projects[$id])) {
                        $projects[$id] = [
                            'id' => $id,
                            'project_name' => $row['project_name'],
                            'project_category' => $row['project_category'],
                            'client' => $row['client'],
                            'project_description' => $row['project_description'],
                            'project_date' => $row['project_date'],
                            'images' => []
                        ];
                    }
                    if (!empty($row['img_name'])) {
                        $projects[$id]['images'][] = $row['img_name'];
                    }
                }

                $response = [
                    'statusCode' => 200,
                    'status' => 'success',
                    'msg' => empty($projects) ? 'No data found' : 'Data loaded',
                    'data' => array_values($projects) // reset numeric keys
                ];
            }
            break;
        }

        // case 'portfolio': {
        //         $query= "
        //             SELECT p.id, p.project_name, p.project_category, p.client, p.project_description, p.project_date, pi.img_name
        //             FROM portfolios p
        //             LEFT JOIN portfolio_images pi ON pi.project_id = p.id;
        //         ";
        //         $data = fetch($conn, $query);
        //         if ($data !== false) {
        //             $response = [
        //                 'statusCode' => 200,
        //                 'status' => 'success',
        //                 'msg' => empty($data) ? 'No data found' : 'Data loaded',
        //                 'data' => $data
        //             ];
        //         }
        //         break;
        //     }

    case 'services': {
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
        }

    case 'faq': {
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
        }

    case 'pricing': {
            $data = fetch($conn, "SELECT * FROM `pricings`");
            $response = [
                'statusCode' => 200,
                'status' => 'success',
                'msg' => empty($data) ? 'No data found' : 'Data loaded',
                'data' => $data
            ];

            break;
        }

    case 'pages': {
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
        }

    case 'about_us': {
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

    case 'project_image': {
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $data = fetch($conn, "SELECT * FROM `portfolio_images` WHERE `project_id` = $id");
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
}

echo json_encode($response);
