<?php
include_once('./includes/constants.php');
function activeNavBar($name)
{
  return (basename($_SERVER['PHP_SELF']) == $name) ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Arsha Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'index-page' : 'blog-page' ?>">

  <header id="header" class="header d-flex align-items-center <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'fixed-top' : 'sticky-top' ?>  ">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">Arsha</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <!-- <li><a href="index.php" class="<?php //echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : '' ?>">Home</a></li> -->
          <li><a href="index.php" class="<?= activeNavBar('index.php');?>">Home</a></li>
          <li><a href="about.php" class="<?= activeNavBar('about.php');?>">About</a></li>
          <li><a href="services.php" class="<?= activeNavBar('services.php');?>">Services</a></li>
          <li><a href="portfolio.php" class="<?= activeNavBar('portfolio.php');?>">Portfolio</a></li>
          <li><a href="pricing.php" class="<?= activeNavBar('pricing.php');?>">Pricing</a></li>
          <li><a href="blog.php" class="<?= activeNavBar('blog.php');?>">Blog</a></li>
          <li><a href="faq.php" class="<?= activeNavBar('faq.php');?>">FAQ</a></li>
          <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="./admin/login.php">Login</a></li>
              <!-- <li><a href="./admin/register.php">Resigter</a></li> -->
            </ul>
          </li>
          <li><a href="contact.php" class="<?= activeNavBar('contact.php');?>">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#">Login</a>

    </div>
  </header>
  <main class="main">