<?php
@session_start();
$username_customer = $_SESSION['username_customer'];
$password_customer = $_SESSION['password_customer'];
$nama_pelanggan = $_SESSION['nama_pelanggan'];
$id_pelanggan = $_SESSION['id_pelanggan'];
?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title> Walk Avenue </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" href="upload/app.png">
      <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> -->
      <!-- CSS here -->
      <link rel="stylesheet" href="assets/css/preloader.css">
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/css/meanmenu.css">
      <link rel="stylesheet" href="assets/css/animate.css">
      <link rel="stylesheet" href="assets/css/owl-carousel.css">
      <link rel="stylesheet" href="assets/css/swiper-bundle.css">
      <link rel="stylesheet" href="assets/css/backtotop.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/flaticon/flaticon.css">
      <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
      <link rel="stylesheet" href="assets/css/default.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->
    

    <!-- preloader start -->

    
    <?php include_once "include/header.php";
    if ($_GET['module'] == 'pelanggan') {  //module home
        include "pelanggan/home/pelanggan.php";  
    } elseif ($_GET['module'] == 'product') {   //module modal data diri
        include "pelanggan/product/product_detail.php";
    } elseif ($_GET['module'] == 'cart') {  //module faq
        include "pelanggan/product/cart.php";
    } elseif ($_GET['module'] == 'checkout') {  //module faq
        include "pelanggan/product/checkout.php";
    } elseif ($_GET['module'] == 'profile') {  //module faq
        include "pelanggan/home/profile.php";
    } elseif ($_GET['module'] == 'about') {  //module faq
        include "pelanggan/home/about.php";
    } elseif ($_GET['module'] == 'nota') {  //module faq
        include "pelanggan/home/nota.php";
    } elseif ($_GET['module'] == 'riwayat') {  //module faq
        include "pelanggan/home/riwayat.php";
   
        include "page_404.php";
    }
    ;
    ?>
    
    
    <?php include_once "include/footer.php"; ?>

      
   </body>
</html>
