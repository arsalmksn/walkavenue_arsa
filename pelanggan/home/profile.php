<?php
@session_start();
$id_pelanggan = $_SESSION['id_pelanggan'];
include "lib/koneksi.php";

if (isset($_POST["ubah"])) {
    if (empty($username_customer) and empty($password_customer)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=login/index.php><b>LOGIN</b></a></center>";
    } else {
        // menangkap variabel nama admin yang dikirim oleh form edit
        $id_pelanggan = $_SESSION['id_pelanggan'];
        $username_customer = $_POST['username_customer'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $no_telp_pelanggan = $_POST['no_telp_pelanggan'];
        $alamat_pelanggan = $_POST['alamat_pelanggan'];
        $queryEdit = mysqli_query($con, "UPDATE pelanggan2 SET username_customer='$username_customer', nama_pelanggan='$nama_pelanggan', no_telp_pelanggan='$no_telp_pelanggan',alamat_pelanggan='$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'");
        if ($queryEdit) {
            echo "<script>alert ('Data pelanggan berhasil diubah'); window.location = 'dashboard.php?module=profile&id_pelanggan=$id_pelanggan';</script>";
        } else {
            echo "<script>alert ('Data pelanggan gagal diubah'); window.location = 'dashboard.php?module=profile&id_pelanggan=$id_pelanggan';</script>";
        }
    }
}

if (isset($_POST["fotos"])) {
    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        die("File foto tidak valid.");
    }

    $namaFile = basename($_FILES['foto']['name']);
    $ukuranFile = $_FILES['foto']['size'];
    $tipeFile = mime_content_type($_FILES['foto']['tmp_name']);
    $tmpFile = $_FILES['foto']['tmp_name'];

    // Validasi tipe file
    $allowedTypes = ['image/jpeg', 'image/png'];
    if (!in_array($tipeFile, $allowedTypes)) {
        die("Hanya file gambar (JPEG/PNG) yang diperbolehkan.");
    }

    // Validasi ukuran file
    $maxSize = 2 * 1024 * 1024; // 2MB
    if ($ukuranFile > $maxSize) {
        die("Ukuran file terlalu besar. Maksimum 2MB.");
    }

    // Upload file
    $uploadDir = "../upload/";
    $path = $uploadDir . $namaFile;

    if (move_uploaded_file($tmpFile, $path)) {
        $sql_update_foto = "UPDATE pelanggan2 SET foto = ? WHERE id_pelanggan = ?";
        $stmt_update_foto = $conn->prepare($sql_update_foto);
        $stmt_update_foto->bind_param("si", $namaFile, $id_pelanggan);
        if ($stmt_update_foto->execute()) {
            echo "<script>alert('Foto profil berhasil diubah.'); window.location = 'dashboard.php?module=profile';</script>";
        } else {
            echo "<script>alert('Gagal mengubah foto profil.'); window.location = 'dashboard.php?module=profile';</script>";
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>

       
        <!-- account-area-start -->
        <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="basic-login mb-50">
                            <h5>Ganti</h5>
                            <form method="post" action="login/aksi_editpassword.php?id_pelanggan=$id_pelanggan">
                            <label for="pass">Password Lama  <span>*</span></label>
                            <input id="pass" type="password" name="password_customer"  placeholder="Enter password...">
                                <label for="pass">Password Baru <span>*</span></label>
                                <input id="pass" type="password" name="password_baru_customer" placeholder="Enter password...">
                                <label for="pass">Konfirmasi Password<span>*</span></label>
                                <input id="pass" type="password" name="konfirmasi_password" placeholder="Enter password...">
                               
                                <button class="btn btn-primary" name="ganti" type="submit">Simpan
                                  
                                </button>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="basic-login">
                            <h5>Profile</h5>
                            <form method="post">
                            <?php
                            $no = 1;
                            $queryAdmin = mysqli_query($con, "SELECT * FROM pelanggan2 WHERE id_pelanggan='$id_pelanggan'");
                            while ($admin = mysqli_fetch_array($queryAdmin)) {
                                ?>
                                <label for="name">Nama <span>*</span></label>
                                <input id="name" name="nama_pelanggan" type="text" value="<?php echo $admin['nama_pelanggan']; ?>">
                                <label for="phone">No Telp <span>*</span></label>
                                <input id="phone" name="no_telp_pelanggan" type="text" value="<?php echo $admin['no_telp_pelanggan']; ?>">
                                <label for="name">Alamat <span>*</span></label>
                                <input id="name" name="alamat_pelanggan" type="text" value="<?php echo $admin['alamat_pelanggan']; ?>">
                                <label for="username">Username <span>*</span></label>
                                <input id="username" name="username_customer" type="text" value="<?php echo $admin['username_customer']; ?>">
                                <!-- <label for="userpass">Password <span>*</span></label> 
                                <input id="userpass" type="password" placeholder="Enter password...">-->
                                
                                <!-- <a href="login.html" class="tp-in-btn w-100">Register</a> -->
                                <button class="btn btn-success"  name="ubah" type="submit">Simpan
                                  
                                  </button>
                                  
                            </form>
                        </div>
                    </div>
                    <?php
                            }
                            ?>
                </div>
            </div>
        </div>
        <!-- account-area-end -->

       