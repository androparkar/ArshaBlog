<?php
require_once('../admin-includes/connection.php');
require_once('../admin-includes/constants.php');

switch ($_REQUEST['reqType']) {
    case "blog_category": {
            $id = $_POST['blog_cat_id'];
            $category_name = $_POST['blog_cat_name'];
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `blog_categories` SET `blog_cat_name`= ? WHERE `blog_cat_id` = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'si', $category_name, $id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo 'Succesfully updated';
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
            $id = $_POST['blog_id'];
            $title = $_POST['blog_title'];
            $author = $_POST['blog_author'];
            $category = $_POST['blog_category'];
            $text = $_POST['blog_text'];
            $thumb_fileName = $_POST['old_thumb_img'];
            $cover_fileName = $_POST['old_cover_img'];
            
            // replace and upload thumbnail image 
            if (isset($_FILES['thumb_image']['tmp_name']) && !empty($_FILES['thumb_image']['tmp_name'])) {
                $response = imageUpload($_FILES['thumb_image'], BLOG_THUMB_DIR, $_POST['old_thumb_img']);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $thumb_fileName = $response['file_name'];
            }

            // replace and upload cover image
            if (isset($_FILES['cover_image']['tmp_name']) && !empty($_FILES['cover_image']['tmp_name'])) {
                $response = imageUpload($_FILES['cover_image'], BLOG_DIR, $_POST['old_cover_img']);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $cover_fileName = $response['file_name'];
            }

            // update data 
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `blogs` SET `blog_title`= ?,`thumbnail_img`= ?,`cover_img`= ?,`author_id`= ?,`blog_cat_id`= ?,`blog_text`= ? WHERE `blog_id` = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sssiisi',  $title, $thumb_fileName, $cover_fileName, $author, $category, $text, $id);
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
            $id = $_POST['author_id'];
            $name = $_POST['author_name'];
            $email = $_POST['author_email'];
            $phone = $_POST['author_phone'];
            $designation = $_POST['author_designation'];
            $fileName = $_POST['old_img'];

            // replace and upload image
            if (isset($_FILES['author_image']['tmp_name']) && !empty($_FILES['author_image']['tmp_name'])) {
                $response = imageUpload('author_image', PROFILE_DIR, $_POST['old_img']);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error']]);
                    exit;
                }
                $fileName = $response['file_name'];
            }
            
            // update data 
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `authors` SET `author_img`= ?,`author_name`= ?,`author_designation`= ?,`email`=?,`phone`= ? WHERE `author_id` = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'ssssii', $fileName, $name, $designation, $email, $phone, $id);
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
            $id = $_POST['id'];
            $name = $_POST['name'];
            $X = $_POST['X'];
            $linkdin = $_POST['linkdin'];
            $insta = $_POST['instagram'];
            $fb = $_POST['facebook'];
            $designation = $_POST['designation'];
            $description = $_POST['description'];
            $fileName =  $_POST['old_img'];

            // replace and upload image
            if (isset($_FILES['team_image']['tmp_name']) && !empty($_FILES['team_image']['tmp_name'])) {
                $response = imageUpload('team_image', TEAMS_PROFILE_DIR, $_POST['old_img']);
                if (isset($response['error'])) {
                    echo json_encode(['statusCode' => 500, 'status' => 'error', 'msg' => $response['error'], 'file' => $response['file']]);
                    exit;
                }
                $fileName = $response['file_name'];
            }
            
            // update data 
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `teams` SET `profile_img`= ?,`member_name`= ?,`member_designation`= ?,`member_description`= ?,`X`= ?,`linkdin`= ?,`instagram`= ?,`facebook`= ? WHERE `id` = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sssssssi', $fileName, $name, $designation, $description, $X, $linkdin, $insta, $fb, $id);
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
            $id = $_POST['service_id'];
            $title = $_POST['service_title'];
            $description = $_POST['description'];
            $icon =  $_POST['service_icon'];
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `services` SET `icon`= ? ,`title`= ? ,`description`= ?  WHERE `id` =  ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sssi', $icon, $title, $description, $id);
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

    case "portfolio": {
            $id          = $_POST['project_id'];
            $title       = $_POST['project_title'];
            $category    = $_POST['project_category'];
            $client      = $_POST['project_client'];
            $date        = $_POST['project_date'];
            $description = $_POST['description'];

            // 1. Update images
            $errors = updatePortfolioImages($id, PROJECT_DIR, $conn);

            // 2. Update data
            $stmt = mysqli_prepare($conn, "UPDATE portfolios SET project_name = ?, project_category = ?, client = ?, project_description = ?, project_date = ? WHERE id = ?");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'sssssi', $title, $category, $client, $description, $date, $id);
                if (mysqli_stmt_execute($stmt)) {
                    echo json_encode([
                        'statusCode' => empty($errors) ? 200 : 206,
                        'status'     => empty($errors) ? 'success' : 'partial_success',
                        'msg'        => empty($errors) ? 'Portfolio updated successfully' : 'Updated with some image errors',
                        'errors'     => $errors
                    ]);
                } else {
                    echo json_encode([
                        'statusCode' => 500,
                        'status'     => 'failed',
                        'msg'        => 'update failed',
                        'error'      => mysqli_stmt_error($stmt)
                    ]);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo json_encode([
                    'statusCode' => 500,
                    'status'     => 'failed',
                    'msg'        => 'Prepare failed',
                    'error'      => mysqli_error($conn)
                ]);
            }

            break;
        }

    case "pricing": {
            $id = $_POST['plan_id'];
            $name = $_POST['plan_name'];
            $cost = $_POST['cost'];
            $f1 = $_POST['feature1'];
            $f2 = $_POST['feature2'];
            $f3 = $_POST['feature3'];
            $f4 = $_POST['feature4'];
            $f5 = $_POST['feature5'];
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `pricings` SET `plan_name`= ?, `cost`= ?, `feature_1`= ?, `feature_2`= ?, `feature_3`= ?, `feature_4`= ?, `feature_5`= ? WHERE `id` = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sssssssi', $name, $cost, $f1, $f2, $f3, $f4, $f5, $id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo 'Succesfully updated';
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
            $id = $_POST['id'];
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            try {
                $stmt = mysqli_prepare($conn, "UPDATE `faq` SET `question`=?,`answer`=? WHERE `id` = ?");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'ssi', $question, $answer, $id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo 'Succesfully updated';
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
}

// regular image uploading and old img removing function
function imageUpload($file, $uploadDir, $oldImg = '')
{
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $maxSize = 10 * 1024 * 1024;
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) return ['error' => 'Invalid file type', 'file' => $file['name']];
    if ($file['size'] > $maxSize) return ['error' => 'File too large', 'file' => $file['name']];
    if ($file['error'] !== UPLOAD_ERR_OK) return ['error' => 'Upload error: ' . $file['error'], 'file' => $file['name']];

    $newName = uniqid('img_', true) . '.' . $ext;
    $targetPath = $uploadDir . $newName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return ['error' => 'Failed to move uploaded file', 'file' => $file['name']];
    }

    // Delete old image if provided
    if (!empty($oldImg)) {
        $oldPath    = $uploadDir . $oldImg;
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
    }

    return ['file_name' => $newName];
}

// portfolio image update(looped)
function updatePortfolioImages(int $project_id, string $uploadDir, mysqli $conn): array
{
    $errors = [];
    $oldImages = [];

    // 1. Delete old images from disk and DB
    $oldImageQuery = mysqli_query($conn, "SELECT img_name FROM portfolio_images WHERE project_id = $project_id");
    while ($row = mysqli_fetch_assoc($oldImageQuery)) {
        $oldImages[] = $row['img_name'];
    }
    mysqli_query($conn, "DELETE FROM portfolio_images WHERE project_id = $project_id");

    // 2. Upload new images
    if (!empty($_FILES['images']['tmp_name'])) {
        $count = count($_FILES['images']['tmp_name']);
        $stmtImg = mysqli_prepare($conn, "INSERT INTO portfolio_images (img_name, project_id) VALUES (?, ?)");
        for ($i = 0; $i < $count; $i++) {
            $file = [
                'name'     => $_FILES['images']['name'][$i],
                'tmp_name' => $_FILES['images']['tmp_name'][$i],
                'size'     => $_FILES['images']['size'][$i],
                'error'    => $_FILES['images']['error'][$i],
            ];

            $result = imageUpload($file, $uploadDir, $oldImages[$i] ?? '');
            if (isset($result['error'])) {
                $errors[] = $result['file'] . ': ' . $result['error'];
                continue;
            }

            mysqli_stmt_bind_param($stmtImg, 'si', $result['file_name'], $project_id);
            if (!mysqli_stmt_execute($stmtImg)) {
                $errors[] = $result['file_name'] . ': DB insert failed';
            }
        }
        mysqli_stmt_close($stmtImg);
    }

    return $errors;
}

