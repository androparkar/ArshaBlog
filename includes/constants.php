<?php
function base_url($path = '')
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    // $script = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $projectRoot = '/workspace/Arsha';
    return $protocol . $host . $projectRoot . ltrim($path, '/');
}
function base_dir()
{
    $imageRoot = "/workspace/Arsha";
    return $_SERVER['DOCUMENT_ROOT'] . $imageRoot;
}

// URL FOR IMAGE LOADING 
define("BASE_URL", base_url());
define("ASSET_URL", BASE_URL . "/assets/img/uploads/");
define('BLOG_URL', ASSET_URL . 'blog_images/');
define('PROFILE_URL', ASSET_URL . 'profile_images/');
define('PROJECT_URL', ASSET_URL . 'project_images/');
define('PROJECT_THUMB_URL', ASSET_URL . 'project_thumbnail/');
define('SERVICE_URL', ASSET_URL . 'service_images/');
define('BLOG_THUMB_URL', ASSET_URL . 'blog_thumbnail/');
define("TEAMS_PROFILE_URL", ASSET_URL . "teams_profile_images/");

// DIRECTORY FOR IMAGE MANUPULATION 
define("BASE_DIR", base_dir());
define("ASSET_DIR", BASE_DIR . "/assets/img/uploads/");
define('BLOG_DIR', ASSET_DIR . 'blog_images/');
define('PROFILE_DIR', ASSET_DIR . 'profile_images/');
define('PROJECT_DIR', ASSET_DIR . 'project_images/');
define('PROJECT_THUMB_DIR', ASSET_DIR . 'project_thumbnail/');
define('SERVICE_DIR', ASSET_DIR . 'service_images/');
define('BLOG_THUMB_DIR', ASSET_DIR . 'blog_thumbnail/');
define('TEAMS_PROFILE_DIR', ASSET_DIR . 'teams_profile_images/');
