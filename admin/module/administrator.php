<?php
include "../lib/koneksi.php";
if (isset($_POST["ubah"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=login/index.php><b>LOGIN</b></a></center>";
    } else {
        // menangkap variabel nama admin yang dikirim oleh form edit
        $id_admin = $_POST['id_admin'];
        $username_admin = $_POST['username_admin'];
        $level_user = $_POST['level_user'];
        $queryEdit = mysqli_query($con, "UPDATE administrator SET username_admin='$username_admin', level_user='$level_user' WHERE ID_ADMIN='$id_admin'");
        if ($queryEdit) {
            echo "<script>alert ('Data Admin berhasil diubah'); window.location = 'dashboard.php?module=Administrator&username_admin=$username_admin&password_admin=$password_admin';</script>";
        } else {
            echo "<script>alert ('Data Admin gagal diubah'); window.location = 'dashboard.php?module=Administrator&username_admin=$username_admin&password_admin=$password_admin';</script>";
        }
    }
}
if (isset($_POST["hapus"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $id_admin = $_POST['id_admin'];
        $queryHapus = mysqli_query($con, "DELETE FROM administrator WHERE ID_ADMIN='$id_admin'");
        if ($queryHapus) {
            echo "<script>alert ('Data Admin berhasil dihapus'); window.location = 'dashboard.php?module=Administrator&username_admin=$username_admin&password_admin=$password_admin';</script>";
        } else {
            echo "<script>alert ('Data Admin gagal dihapus'); window.location = 'dashboard.php?module=Administrator&username_admin=$username_admin&password_admin=$password_admin';</script>";
        }
    }
}
if (isset($_POST["tambah"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../login.php><b>LOGIN</b></a></center>";
    } else {
        // Tangkap data dari form
        $username_admin = mysqli_real_escape_string($con, $_POST['username_admin']);
        $password_admin = password_hash($_POST['password_admin'], PASSWORD_DEFAULT);
        $level_user = mysqli_real_escape_string($con, $_POST['level_user']);
        
        // Jalankan query tambah
        $querySimpan = mysqli_query($con, "INSERT INTO administrator (username_admin, password_admin, level_user) VALUES ('$username_admin', '$password_admin', '$level_user')");
        if ($querySimpan) {
            echo "<script>alert('Data Admin berhasil disimpan'); window.location = 'dashboard.php?module=Administrator&username_admin=$username_admin&password_admin=$password_admin';</script>";
        } else {
            echo "<script>alert('Data Admin gagal disimpan'); window.location = 'dashboard.php?module=Administrator&username_admin=$username_admin&password_admin=$password_admin';</script>";
        }
    }
}
?>
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Administrator </h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                <div class="row mb-3">
                                  <div class="col d-flex justify-content-end">
                                      <div class="input-group w-auto"><span class="input-group-text"> <i class="fa fa-search"></i></span><!-- Ikon search -->
                                          <input type="text" id="searchInput" class="form-control" placeholder="Cari data...">
                                         </div>
                                  </div>
                                 </div>
                                    <table class="table" id="datatable_2">
                                        <thead class="thead-light">
                            <tr>
                                <th width="80">
                                    <center>NO</center>
                                </th>
                                <th width="50">
                                    <center>Username</center>
                                </th>
                                <th width="50">
                                    <center>Level</center>
                                </th>
                                <th width="30">
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryAdmin = mysqli_query($con, "SELECT * FROM administrator");
                            while ($admin = mysqli_fetch_array($queryAdmin)) {
                                ?>
                                <tr>
                                    <td>
                                        <center><?php echo $no++; ?></center>
                                    </td>
                                    <td><?php echo htmlspecialchars($admin['username_admin']); ?></td>
                                    <td>
                                        <center><?php echo htmlspecialchars($admin['level_user']); ?></center>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $admin['ID_ADMIN']; ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="id_admin" value="<?php echo $admin['ID_ADMIN']; ?>">
                                                <button class="btn btn-danger" type="submit" name="hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?php echo $admin['ID_ADMIN']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_admin" value="<?php echo $admin['ID_ADMIN']; ?>">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username_admin" value="<?php echo htmlspecialchars($admin['username_admin']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="level" class="form-label">Level</label>
                                                        <select class="form-control" id="level" name="level_user" required>
                                                            <option value="Manager" <?php echo ($admin['level_user'] == 'Manager' ? 'selected' : ''); ?>>Manager</option>
                                                            <option value="Admin" <?php echo ($admin['level_user'] == 'Admin' ? 'selected' : ''); ?>>Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                                    <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                                    <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                                    <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                                    <button type="button" class="btn btn-sm btn-de-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLarge">Tambah Admin</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModalLarge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title m-0" id="myLargeModalLabel">Tambah Admin</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div><!--end modal-header-->
                                            <div class="modal-body">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" id="last-name" name="username_admin" required="required" class="form-control col-md-7 col-xs-12" title="Username Admin. " placeholder="Isikan Username Admin !" maxlength="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" id="last-name" name="password_admin" required="required" class="form-control col-md-7 col-xs-12" title="Password Siswa." placeholder="Isikan Password Admin !" maxlength="20">
                        </div>
                    </div>
                    
                   
                   
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">level_user<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control" name="level_user" title="Pilih salah satu jurusan dibawah.">
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    <!-- </div>
                    <div class="form-group">
                        <label for="foto_siswa" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="file" class="form-control-file" id="foto_siswa" name="foto_siswa" required="required">
                        </div>
                    </div> -->
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-success" name="tambah">Submit</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            </div><!--end modal-footer-->
                                        </div><!--end modal-content-->
                                    </div><!--end modal-dialog-->
                                </div><!--end modal-->
                                <script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("datatable_2");
        tr = table.getElementsByTagName("tr");

        // Looping semua baris tabel kecuali header
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    });
</script>


                                







                       