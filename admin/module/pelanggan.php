<?php
include "../lib/koneksi.php";

if (isset($_POST["ubah"])) {
    // periksa login
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=login/index.php><b>LOGIN</b></a></center>";
    } else {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];

        $queryEdit = mysqli_query($con, "UPDATE pelanggan2 SET nama_pelanggan='$nama_pelanggan' WHERE id_pelanggan='$id_pelanggan'");
        if ($queryEdit) {
            echo "<script>alert('Data Admin berhasil diubah'); window.location = 'dashboard.php?module=pelanggan2';</script>";
        } else {
            echo "<script>alert('Data Admin gagal diubah');</script>";
        }
    }
}

if (isset($_POST["hapus"])) {
    // periksa login
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $id_pelanggan = $_POST['id_pelanggan'];
        $queryHapus = mysqli_query($con, "DELETE FROM pelanggan2 WHERE id_pelanggan='$id_pelanggan'");
        if ($queryHapus) {
            echo "<script>alert('Data Admin berhasil dihapus'); window.location = 'dashboard.php?module=pelanggan2';</script>";
        } else {
            echo "<script>alert('Data Admin gagal dihapus');</script>";
        }
    }
}

if (isset($_POST["tambah"])) {
    // periksa login
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../login.php><b>LOGIN</b></a></center>";
    } else {
        $nama_pelanggan = mysqli_real_escape_string($con, $_POST['nama_pelanggan']);
        $alamat_pelanggan = mysqli_real_escape_string($con, $_POST['alamat_pelanggan']);
        $no_telp_pelanggan = mysqli_real_escape_string($con, $_POST['no_telp_pelanggan']);
        $username_customer= mysqli_real_escape_string($con, $_POST['username_customer']);
        $password_customer = mysqli_real_escape_string($con, $_POST['password_customer']);
       
        // Foto barang?
        $querySimpan = mysqli_query($con, "INSERT INTO barang (nama_pelanggan, alamat_pelanggan, no_telp_pelanggan, username_customer, password_customer) VALUES ('$nama_pelanggan', '$alamat_pelanggan','$no_telp_pelanggan', '$username_customer', '$password_customer')");
        if ($querySimpan) {
            echo "<script>alert('Data Admin berhasil disimpan'); window.location = 'dashboard.php?module=pelanggan2';</script>";
        } else {
            echo "<script>alert('Data Admin gagal disimpan');</script>";
        }
    }
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tabel pelanggan</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                <div class="row mb-3">
                         <div class="col d-flex justify-content-end">
                            <div class="input-group w-auto">
                                <span class="input-group-text">
                                     <i class="fa fa-search"></i> <!-- Ikon search -->
                                </span>
                               <input type="text" id="searchInput" class="form-control" placeholder="Cari data...">
                            </div>
                         </div>
                    </div>
                    <table class="table" id="datatable_2">
                        <thead class="thead-light">
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Nama pelanggan</center></th>
                            <th><center>Alamat Pelanggan</center></th>
                            <th><center>No Telp</center></th>
                            <th><center>Username</center></th>
                            <th><center>Password</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kueriPrakerin = mysqli_query($con, "SELECT * FROM pelanggan2");
                            while ($arsa = mysqli_fetch_array($kueriPrakerin)) {
                                $editModalID = "editModal" . $arsa['id_pelanggan'];
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $arsa['nama_pelanggan']; ?></td>
                                <td><?php echo $arsa['alamat_pelanggan']; ?></td>
                                <td><?php echo $arsa['no_telp_pelanggan']; ?></td>
                                <td><?php echo $arsa['username_customer']; ?></td>
                                <td><?php echo $arsa['password_customer']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#<?php echo $editModalID; ?>">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" name="id_pelanggan" value="<?php echo $arsa['id_pelanggan']; ?>">
                                            <button class="btn btn-danger" type="submit" name="hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="<?php echo $editModalID; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit pelanggan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_pelanggan" value="<?php echo $arsa['id_pelanggan']; ?>">
                                                        <div class="mb-3">
                                                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $arsa['nama_pelanggan']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
                                                            <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" value="<?php echo $arsa['alamat_pelanggan']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="no_telp_pelanggan" class="form-label">No Telp</label>
                                                            <input type="text" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan" value="<?php echo $arsa['no_telp_pelanggan']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username_customer" class="form-label">username_customer</label>
                                                            <input type="text" class="form-control" id="username_customer" name="username_customer" value="<?php echo $arsa['username_customer']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password_customer" class="form-label">Password</label>
                                                            <input type="text" class="form-control" id="password_customer" name="password_customer" value="<?php echo $arsa['password_customer']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary" name="ubah">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                    <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                    <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                    <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                    <button type="button" class="btn btn-sm btn-de-primary " data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah pelanggan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah pelanggan -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah pelanggan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_pelanggan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="no_telp_pelanggan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username_customer" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password_customer" class="form-control" required>
                    </div>
                    
                   <!-- // <div class="form-group"> 
                        <label>Foto pelanggan</label>
                        <input type="file" name="foto_barang" class="form-control" required>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
