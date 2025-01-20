<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Riptures</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/lightgallery.min.css">    
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">

            <div class="col-6 col-xl-2 d-flex align-items-center" data-aos="fade-down">
                <img src="assets/images/lg.jpg" alt="Logo" style="width: 60px; height: auto; margin-right: 10px;">
                <h1 class="mb-0"><a href="dashboard.php" class="text-white h2 mb-0">Riptures</a></h1>
            </div>
                            <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
                    <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li class="active"><a href="dashboard.php">Home</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="input.php">Tambah Foto</a></li>
                            <li><a href="albumm.php">Tambah Album</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
                    <div class="d-none d-xl-inline-block">
                        <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0">
                            <?php if (!isset($_SESSION['UserID'])) { ?>
                                <li><a href="login.php" class="btn btn-primary">Login</a></li>
                            <?php } else { ?>
                                <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
                        <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                            <span class="icon-menu h3"></span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </header>
