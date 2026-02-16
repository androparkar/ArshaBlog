<?php
require_once('../admin-includes/connection.php');
require_once('../admin-includes/constants.php');

switch ($_REQUEST['reqType']) {

    case "blog_category": {
            $category_name = $_POST['blog_cat_name'];
            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `blog_categories`(`blog_cat_name`) VALUES (?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 's', $category_name);
                    if (mysqli_stmt_execute($stmt)) {
                        echo 'Succesfully inserted';
                    } else {
                        echo "Error inserting record: " . mysqli_stmt_error($stmt) . "\n";
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            break;
        }

    case "blog": {
            $title = $_POST['blog_title'];
            $author = $_POST['blog_author'];
            $category = $_POST['blog_category'];
            $description = $_POST['blog_text'];
            $thumb_fileName =  '';
            $cover_fileName =  '';

            if (isset($_FILES['thumb_image']['tmp_name']) && !empty($_FILES['thumb_image']['tmp_name'])) {
                $response = imageUpload($_FILES['thumb_image'], BLOG_THUMB_DIR);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $thumb_fileName = $response['file_name'];
            }

            if (isset($_FILES['cover_image']['tmp_name']) && !empty($_FILES['cover_image']['tmp_name'])) {
                $response = imageUpload($_FILES['cover_image'], BLOG_DIR);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $cover_fileName = $response['file_name'];
            }
            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `blogs`(`blog_title`, `thumbnail_img`, `cover_img`, `author_id`, `blog_cat_id`, `blog_text`) VALUES (?,?,?,?,?,?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sssiis',  $title, $thumb_fileName, $cover_fileName, $author, $category, $description);
                    if (mysqli_stmt_execute($stmt)) {
                        echo json_encode([
                            'statusCode' => 200,
                            'status' => 'success',
                            'msg' => 'Data saved'
                        ]);
                    } else {
                        echo json_encode([
                            'statusCode' => 500,
                            'status' => 'failed',
                            'msg' => 'Something went wrong',
                            'error' =>  mysqli_stmt_error($stmt) . "\n"
                        ]);
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            break;
        }

    case "author": {
            $name = $_POST['author_name'];
            $email = $_POST['author_email'];
            $phone = $_POST['author_phone'];
            $designation = $_POST['author_designation'];
            $fileName =  '';

            if (isset($_FILES['author_image']['tmp_name']) && !empty($_FILES['author_image']['tmp_name'])) {
                $response = imageUpload($_FILES['author_image'], PROFILE_DIR);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $fileName = $response['file_name'];
            }

            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `authors`(`author_img`, `author_name`, `author_designation`, `email`, `phone`) VALUES (?,?,?,?,?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'ssssi', $fileName, $name, $designation, $email, $phone);
                    if (mysqli_stmt_execute($stmt)) {
                        echo json_encode([
                            'statusCode' => 200,
                            'status' => 'success',
                            'msg' => 'Data saved'
                        ]);
                    } else {
                        echo json_encode([
                            'statusCode' => 500,
                            'status' => 'failed',
                            'msg' => 'Something went wrong',
                            'error' =>  mysqli_stmt_error($stmt) . "\n"
                        ]);
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        break;
    }

    case "teams": {
            $name = $_POST['name'];
            $X = $_POST['X'];
            $linkdin = $_POST['linkdin'];
            $insta = $_POST['instagram'];
            $fb = $_POST['facebook'];
            $designation = $_POST['designation'];
            $description = $_POST['description'];
            $fileName =  '';

            if (isset($_FILES['team_image']['tmp_name']) && !empty($_FILES['team_image']['tmp_name'])) {
                $response = imageUpload($_FILES['team_image'], TEAMS_PROFILE_DIR);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $fileName = $response['file_name'];
            }

            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `teams`(`profile_img`, `member_name`, `member_designation`, `member_description`, `X`, `linkdin`, `instagram`, `facebook`) VALUES (?,?,?,?,?,?,?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'ssssssss', $fileName, $name, $designation, $description, $X, $linkdin, $insta, $fb);
                    if (mysqli_stmt_execute($stmt)) {
                        echo json_encode([
                            'statusCode' => 200,
                            'status' => 'success',
                            'msg' => 'Data saved'
                        ]);
                    } else {
                        echo json_encode([
                            'statusCode' => 500,
                            'status' => 'failed',
                            'msg' => 'Something went wrong',
                            'error' =>  mysqli_stmt_error($stmt) . "\n"
                        ]);
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        break;
    }

    case "services": {
            $title = $_POST['service_title'];
            $description = $_POST['description'];
            $icon = $_POST['service_icon'];
            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `services`(`icon`, `title`, `description`) VALUES (?,?,?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sss', $icon, $title, $description);
                    if (mysqli_stmt_execute($stmt)) {
                        echo json_encode([
                            'statusCode' => 200,
                            'status' => 'success',
                            'msg' => 'Data saved'
                        ]);
                    } else {
                        echo json_encode([
                            'statusCode' => 500,
                            'status' => 'failed',
                            'msg' => 'Something went wrong',
                            'error' =>  mysqli_stmt_error($stmt) . "\n"
                        ]);
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        break;
    }

case 'portfolio': {
    $title = $_POST['project_title'];
    $category = $_POST['project_category'];
    $client = $_POST['project_client'];
    $date = $_POST['project_date'];
    $description = $_POST['description'];

    $stmt = mysqli_prepare($conn, "INSERT INTO `portfolios` (`project_name`, `project_category`, `client`, `project_description`, `project_date`) VALUES (?,?,?,?,?)");

    if (!$stmt) {
        echo json_encode(['statusCode' => 500, 'msg' => 'Prepare failed', 'error' => mysqli_error($conn)]);
        break;
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $title, $category, $client, $description, $date);

    if (!mysqli_stmt_execute($stmt)) {
        echo json_encode(['statusCode' => 500, 'status' => 'failed', 'msg' => 'Something went wrong', 'error' => mysqli_stmt_error($stmt)]);
        mysqli_stmt_close($stmt);
        break;
    }

    $project_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    $errors = uploadMultipleImages('images', PROJECT_DIR, $project_id, $conn);

    if (empty($errors)) {
        echo json_encode(['statusCode' => 200, 'status' => 'success', 'msg' => 'Data saved successfully']);
    } else {
        echo json_encode(['statusCode' => 206, 'status' => 'partial_success', 'msg' => 'Some images failed to upload', 'errors' => $errors]);
    }

    break;
}


    case "pricing": {
            $name = $_POST['plan_name'];
            $cost = $_POST['cost'];
            $f1 = $_POST['feature1'];
            $f2 = $_POST['feature2'];
            $f3 = $_POST['feature3'];
            $f4 = $_POST['feature4'];
            $f5 = $_POST['feature5'];
            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `pricings`(`plan_name`, `cost`, `feature_1`, `feature_2`, `feature_3`, `feature_4`, `feature_5`) VALUES (?,?,?,?,?,?,?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sisssss', $name, $cost, $f1, $f2, $f3, $f4, $f5,);
                    if (mysqli_stmt_execute($stmt)) {
                        echo 'Succesfully inserted';
                    } else {
                        echo "Error inserting record: " . mysqli_stmt_error($stmt) . "\n";
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        break;
    }

    case "faq": {
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            try {
                $stmt = mysqli_prepare($conn, "INSERT INTO `faq`(`question`, `answer`) VALUES (?, ?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'ss', $question, $answer);
                    if (mysqli_stmt_execute($stmt)) {
                        echo 'Succesfully inserted';
                    } else {
                        echo "Error inserting record: " . mysqli_stmt_error($stmt) . "\n";
                    }
                }
                mysqli_stmt_close($stmt);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        break;
    }

    default:
        echo json_encode([
            'statusCode' => 500,
            'status' => 'error',
            'msg' => 'Unknown request type'
        ]);
        break;
}

function imageUpload($file, $uploadDir) {
    $allowed = ['jpg','jpeg','png','gif','webp','bmp','tiff','svg','ico','avif','heic'];
    $maxSize = 10 * 1024 * 1024;
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) return ['error' => 'Invalid file type'];
    if ($file['size'] > $maxSize) return ['error' => 'File too large'];
    if ($file['error'] !== UPLOAD_ERR_OK) return ['error' => "Upload error: {$file['error']}"];

    $newName = uniqid('img_', true) . '.' . $ext;
    $targetPath = rtrim($uploadDir, '/') . '/' . $newName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return ['error' => 'Failed to move uploaded file'];
    }

    return ['file_name' => $newName];
}

function uploadMultipleImages($fieldName, $uploadDir, $project_id, $conn) {
    $errors = [];

    if (empty($_FILES[$fieldName]['name'])) return $errors;

    $stmt = mysqli_prepare($conn, "INSERT INTO `portfolio_images` (`img_name`,`project_id`) VALUES (?,?)");
    if (!$stmt) return ['DB preparation failed for images'];

    $count = count($_FILES[$fieldName]['name']);
    for ($i = 0; $i < $count; $i++) {
        $file = [
            'name'     => $_FILES[$fieldName]['name'][$i],
            'tmp_name' => $_FILES[$fieldName]['tmp_name'][$i],
            'size'     => $_FILES[$fieldName]['size'][$i],
            'error'    => $_FILES[$fieldName]['error'][$i],
        ];

        $result = imageUpload($file, $uploadDir);
        if (isset($result['error'])) {
            $errors[] = "{$file['name']}: {$result['error']}";
            continue;
        }

        mysqli_stmt_bind_param($stmt, 'si', $result['file_name'], $project_id);
        if (!mysqli_stmt_execute($stmt)) {
            $errors[] = "{$file['name']}: DB insert failed";
        }
    }

    mysqli_stmt_close($stmt);
    return $errors;
}
