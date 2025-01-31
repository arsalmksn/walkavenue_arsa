<?php
@session_start();
$ID_ADMIN = $_SESSION['ID_ADMIN'];
include "../lib/koneksi.php";

if (isset($_POST["ubah"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=login/index.php><b>LOGIN</b></a></center>";
    } else {
        // menangkap variabel nama admin yang dikirim oleh form edit
        $ID_ADMIN = $_SESSION['ID_ADMIN'];
        $username_admin = $_POST['username_admin'];
        $nama_admin = $_POST['nama_admin'];
        $alamat_admin = $_POST['alamat_admin'];
        $no_telp_admin = $_POST['no_telp_admin'];
        $queryEdit = mysqli_query($con, "UPDATE administrator SET username_admin='$username_admin', nama_admin='$nama_admin', no_telp_admin='$no_telp_admin',alamat_admin='$alamat_admin' WHERE ID_ADMIN='$ID_ADMIN'");
        if ($queryEdit) {
            echo "<script>alert ('Data Admin berhasil diubah'); window.location = 'dashboard.php?module=profile&ID_ADMIN=$ID_ADMIN';</script>";
        } else {
            echo "<script>alert ('Data Admin gagal diubah'); window.location = 'dashboard.php?module=profile&ID_ADMIN=$ID_ADMIN';</script>";
        }
    }
}
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
                <title>Walk avenue Admin</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="assets/images/favicon.ico">

       

        <link href="assets/plugins/tobii/tobii.min.css" rel="stylesheet" type="text/css" />

         <!-- App css -->
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body id="body" class="dark-sidebar">


        <!-- Top Bar Start -->
        <!-- Top Bar Start -->
      
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                           
                            <div class="card-body p-0">  
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">                      
                                                                <h4 class="card-title">Personal Information</h4>                      
                                                            </div><!--end col-->                                                       
                                                        </div>  <!--end row-->                                  
                                                    </div><!--end card-header-->
                                                    <div class="card-body">                  
                                                    <form method="post">
                                                        <?php
                                                        $no = 1;
                                                         $queryAdmin = mysqli_query($con, "SELECT * FROM administrator WHERE ID_ADMIN='$ID_ADMIN'");
                                                        while ($admin = mysqli_fetch_array($queryAdmin)) {
                                                         ?>     
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama Admin</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" name="nama_admin" type="text" value="<?php echo $admin['nama_admin']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Username Admin</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" name="username_admin"type="text" value="<?php echo $admin['username_admin']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" name="alamat_admin" type="text" value="<?php echo $admin['alamat_admin']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">No Telp</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="las la-phone"></i></span>
                                                                    <input type="text" class="form-control" name="no_telp_admin" value="<?php echo $admin['no_telp_admin']; ?>" placeholder="Phone" aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                                <button type="submit" name="ubah" class="btn btn-de-primary">Submit</button>
                                                                <button type="button" class="btn btn-de-danger">Cancel</button>
                                                            </div>
                                                        </div>  
                                                        <?php
                                                                }
                                                                ?>                                                  
                                                    </div>        
                                                 </form>                                   
                                                </div>
                                            </div> <!--end col--> 
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Change Password</h4>
                                                    </div><!--end card-header-->
                                                    <div class="card-body"> 
                                                    <form method="post" action="module/aksi_editpassword.php">
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password Lama</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" name="password_admin" type="password" placeholder="Password">
                                                                <a href="#" class="text-primary font-12">Forgot password ?</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Password Baru</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" name="password_baru_admin" type="password" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Konfirmasi Password</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" name="konfirmasi_password" type="password" placeholder="Re-Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                                <button type="submit" class="btn btn-de-primary">Change Password</button>
                                                                <button type="button" class="btn btn-de-danger">Cancel</button>
                                                            </div>
                                                        </div>   
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div> <!-- end col -->                                                                              
                                        </div><!--end row-->
                                    </div>
                                </div>        
                            </div> <!--end card-body-->                            
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->

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
                        document.write(new Date().getFullYear())
                    </script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Walk Avenue</span>
                </footer>
                <!-- end Footer -->                
                <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <script src="assets/plugins/tobii/tobii.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script>
        const tobii = new Tobii()
    </script>

</body>

</html>