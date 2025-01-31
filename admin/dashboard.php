<?php
@session_start();
$ID_ADMIN = $_SESSION['ID_ADMIN'];
$username_admin = $_SESSION['username_admin'];
$password_admin = $_SESSION['password_admin'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="utf-8" />
        <title> | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        App favicon
        <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <meta charset="utf-8" />
                <title>Dashboard Admin - WalkAvenue</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="../upload/app.png">

                <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />

         <!-- App css -->
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body id="body" class="dark-sidebar">
        <!-- leftbar-tab-menu -->
        <div class="left-sidebar">
            <!-- LOGO -->
            <div class="brand">
                <a href="index.html" class="logo">
                    <span>
                        <img src="../upload/logo.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="../upload/nama.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>
            <div class="sidebar-user-pro media border-end">                    
                <div class="position-relative mx-auto">
                    <img src="assets/images/users/user-45.png" alt="user" class="rounded-circle thumb-md">
                    <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
                </div>
                <div class="media-body ms-2 user-detail align-self-center">
                    <h5 class="font-14 m-0 fw-bold"><?php echo $username_admin; ?> </h5>  
                    <p class="opacity-50 mb-0"><?php echo $password_admin; ?></p>          
                </div>                    
            </div>
          
            <!-- Tab panes -->
    
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <div class="menu-body navbar-vertical">
                    <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                        <!-- Navigation -->
                        <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span><br><span class="font-10 text-secondary fw-normal">Unique Dashboard</span></li>                    


                          
                            <li class="nav-item">
                                
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?module=Administrator"><i class="ti ti-brand-hipchat menu-icon"></i><span>Administrator</span></a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?module=barang"> <i class ="ti ti-headphones menu-icon"></i><span>Barang</span></a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?module=detail_penjualan"><i class="ti ti-calendar menu-icon"></i><span>Detail Penjualan</span></a>
                            </li><!--end nav-item-->
                          
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?module=pelanggan"><i class="ti ti-currency-bitcoin menu-icon"></i><span>Pelanggan</span></a>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?module=penjualan"><i class="ti ti-file-invoice menu-icon"></i><span>Penjualan</span></a>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?module=supplier"><i class="ti ti-file-invoice menu-icon"></i><span>Supplier</span></a>
                                    
                            </li><!--end nav-item-->
                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">W<span>alkAvenue</span></li> 
                            <li class="nav-item">

                        </ul>
                        <ul class="navbar-nav tab-pane" id="Extra" role="tabpanel">
                            <li>
                                <div class="update-msg text-center position-relative">
                                    <button type="button" class="btn-close position-absolute end-0 me-2" aria-label="Close"></button>
                                    <img src="assets/images/speaker-light.png" alt="" class="" height="110">
                                    <h5 class="mt-0">Mannat Themes</h5>
                                    <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                                    <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
                                </div>
                            </li>
                        </ul><!--end navbar-nav--->
                    </div><!--end sidebarCollapse-->
                </div>
            </div>    
        </div>
        <!-- end left-sidenav-->
        <!-- end leftbar-menu-->

        <!-- Top Bar Start -->
        <!-- Top Bar Start -->
        <div class="topbar">            
            <!-- Navbar -->
            <nav class="navbar-custom" id="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img src="assets/images/users/user-45.png" alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                                <div>
                                    <small class="d-none d-md-block font-11">Admin</small>
                                    <span class="d-none d-md-block fw-semibold font-12"><?php echo $username_admin; ?><i
                                            class="mdi mdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="dashboard.php?module=profile"><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="login/logout.php"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                        </div>
                    </li><!--end topbar-profile-->
                    <li class="notification-list">
                        <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
                            <i class="ti ti-settings ti-spin"></i>
                        </a>
                    </li>   
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                            <i class="ti ti-menu-2"></i>
                        </button>
                    </li> 
                    <li class="hide-phone app-search">
                        <form role="search" action="#" method="get">
                            <input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">
                            <button type="submit"><i class="ti ti-search"></i></button>
                        </form>
                    </li>                       
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Unikit</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                        </li><!--end nav-item-->
                                       
                                    </ol>
                                </div>
                                <h4 class="page-title">Admin</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                </div><!-- container -->
                <?php 
    if ($_GET['module'] == 'pelanggan') {  //module home
        include "module/pelanggan.php";  
    } elseif ($_GET['module'] == 'Administrator') {   //module modal data diri
        include "module/administrator.php";
    } elseif ($_GET['module'] == 'barang') {  //module faq
        include "module/barang.php";
    } elseif ($_GET['module'] == 'detail_penjualan') {  //module faq
        include "module/detail_penjualan.php";
    } elseif ($_GET['module'] == 'penjualan') {  //module faq
        include "module/penjualan.php";
    } elseif ($_GET['module'] == 'supplier') {  //module faq
        include "module/supplier.php";
    } elseif ($_GET['module'] == 'percobaan') {  //module faq
        include "login/percobaan.php";
    } elseif ($_GET['module'] == 'profile') {  //module faq
        include "module/profile.php";
    } else {
        include "page_404.php";
    }
    ;
    ?>



                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">  
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->               
                    </div><!--end offcanvas-body-->
                </div>
                <!--end Rightbar/offcanvas-->
                 <!--end Rightbar-->
                 
                <!--Start Footer-->
                <!-- Footer Start -->
                <footer class="footer text-center text-sm-start">
                    &copy; <script>
                        document.write(new Date().getFullYear());
                        </script>
                </footer>
            </div>
        </div>

        <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="assets/pages/analytics-index.init.js"></script>
        <script src="assets/plugins/datatables/simple-datatables.js"></script>
        <script src="assets/pages/datatable.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        ?>
    </body>
    <!--end body-->
</html>