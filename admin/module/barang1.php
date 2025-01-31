<?php
include "../lib/koneksi.php";

if (isset($_POST["ubah"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=login/index.php><b>LOGIN</b></a></center>";
    } else {
        // menangkap variabel nama admin yang dikirim oleh form edit
        $ID_SEPATU = $_POST['ID_SEPATU'];
        $MERK_SEPATU = $_POST['MERK_SEPATU'];
    
        $queryEdit = mysqli_query($con, "UPDATE barang SET MERK_SEPATU='$MERK_SEPATU' WHERE ID_SEPATU='$ID_SEPATU'");
        if ($queryEdit) {
            echo "<script>alert ('Data Admin berhasil diubah'); window.location = 'dashboard.php?module=barang&MERK_SEPATU=$MERK_SEPATU&ID_SEPATU=$ID_SEPATU';</script>";
        } else {
            echo "<script>alert ('Data Admin gagal diubah'); window.location = 'dashboard.php?module=barang&MERK_SEPATU=$MERK_SEPATU=$ID_SEPATU';</script>";
        }
    }
}
if (isset($_POST["hapus"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $ID_SEPATU = $_POST['ID_SEPATU'];
        $queryHapus = mysqli_query($con, "DELETE FROM barang WHERE ID_SEPATU='$ID_SEPATU'");
        if ($queryHapus) {
            echo "<script>alert ('Data Admin berhasil dihapus'); window.location = 'dashboard.php?module=barang&MERK_SEPATU=$MERK_SEPATU&ID_SEPATU=$ID_SEPATU'';</script>";
        } else {
            echo "<script>alert ('Data Admin gagal dihapus'); window.location = 'dashboard.php?module=barang&MERK_SEPATU=$MERK_SEPATU&ID_SEPATU=$ID_SEPATU'';</script>";
        }
    }
}
if (isset($_POST["tambah"])) {
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../login.php><b>LOGIN</b></a></center>";
    } else {
        // Tangkap data dari form
        $MERK_SEPATU = mysqli_real_escape_string($con, $_POST['MERK_SEPATU']);
    $NO_SEPATU = mysqli_real_escape_string($con, $_POST['NO_SEPATU']);
    $harga = mysqli_real_escape_string($con, $_POST['harga']);
    $STOK = mysqli_real_escape_string($con, $_POST['STOK']);
    $ID_SUPPLIER = mysqli_real_escape_string($con, $_POST['ID_SUPPLIER']);
    $variasi = mysqli_real_escape_string($con, $_POST['variasi']);
    $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
        // Jalankan query tambah
        $querySimpan = mysqli_query($con, "INSERT INTO barang (MERK_SEPATU, NO_SEPATU, harga, STOK, ID_SUPPLIER, variasi, deskripsi, foto_barang) VALUES ('$MERK_SEPATU', '$NO_SEPATU', '$harga', '$STOK', '$ID_SUPPLIER', '$variasi', '$deskripsi', '$foto_barang')");
        if ($querySimpan) {
            echo "<script>alert('Data Admin berhasil disimpan'); window.location = 'dashboard.php?module=barang&MERK_SEPATU=$MERK_SEPATU&ID_SEPATU=$ID_SEPATU';</script>";
        } else {
            echo "<script>alert('Data Admin gagal disimpan'); window.location = 'dashboard.php?module=barang&MERK_SEPATU=$MERK_SEPATU&ID_SEPATU=$ID_SEPATU';</script>";
        }
    }
}
?>   
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Barang </h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_2">
                                        <thead class="thead-light">
                                        <thead>
                                <tr>
                                    
                                    <th width="80">
                                        <center>No</center>
                                    </th>
                                
                                    <th width="30">
                                        <center>MERK_SEPATU</center>
                                    </th>
                                    <th width="20">
                                        <center>NO_SEPATU</center>
                                    </th>
                                    <th width="30">
                                        <center>Harga</center>
                                    </th>
                
                                    <th width="20">
                                        <center>STOK</center>
                                    </th>
                                    <th width="20">
                                        <center>ID_SUPPLIER</center>
                                    </th>
                                    <th width="20">
                                        <center>Variasi</center>
                                    </th>
                                    <th width="20">
                                        <center>Deskripsi</center>
                                    </th>
                                    <th width="20">
                                        <center>Foto barang</center>
                                    </th>
                                    <th width="20">
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                $no = 1;
                                $kueriPrakerin = mysqli_query($con, "SELECT * FROM barang");
                                while ($arsa = mysqli_fetch_array($kueriPrakerin)) {
                                ?>
                                    <tr>
                                        <td width="10"><?php echo $no++; ?></td>
                                        <td><?php echo $arsa['MERK_SEPATU']; ?></td>
                                        <td><?php echo $arsa['NO_SEPATU']; ?></td>
                                        <td><?php echo $arsa['harga']; ?></td>
                                        <td><?php echo $arsa['STOK']; ?></td>
                                        <td><?php echo $arsa['ID_SUPPLIER']; ?></td>
                                        <td><?php echo $arsa['variasi']; ?></td>
                                        <td><?php echo $arsa['deskripsi']; ?></td>
                                        <td><center><img src="../upload/<?php echo $arsa['foto_barang']; ?>" height="40" width="40"></center></td>  
                                        <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="ID_SEPATU" value="<?php echo $arsa['ID_SEPATU']; ?>">
                                                <button class="btn btn-danger" type="submit" name="hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                        </td>
                                    </tr>

                                   
                                    </form>
                                <?php }  ?>
                            </tbody>
                                    </table>
                                    <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                                    <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                                    <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                                    <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Barang </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
 <!-- Modal Edit -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="ID_SEPATU" value="<?php echo $arsa['ID_SEPATU']; ?>">
                                                    
                                                    
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">NO SEPATU</label>
                                                        <input type="text" class="form-control" id="NO_SEPATU" name="NO_SEPATU" value="<?php echo htmlspecialchars($arsa['ID_SEPATU']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Harga</label>
                                                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($arsa['ID_SEPATU']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Supplier</label>
                                                        <input type="text" class="form-control" id="ID_SUPPLIER" name="ID_SUPPLIER" value="<?php echo htmlspecialchars($arsa['ID_SEPATU']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Stok</label>
                                                        <input type="text" class="form-control" id="STOK" name="STOK" value="<?php echo htmlspecialchars($arsa['ID_SEPATU']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Variasi</label>
                                                        <input type="text" class="form-control" id="variasi" name="variasi" value="<?php echo htmlspecialchars($arsa['ID_SEPATU']); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="level" class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($arsa['ID_SEPATU']); ?>" required>
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
                               
                        </tbody>
                   ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Merk Sepatu</label>
                        <input type="text" name="MERK_SEPATU" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Sepatu</label>
                        <input type="text" name="NO_SEPATU" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="STOK" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>ID Supplier</label>
                        <input type="text" name="ID_SUPPLIER" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Variasi</label>
                        <input type="text" name="variasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Barang</label>
                        <input type="file" name="foto_barang" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
