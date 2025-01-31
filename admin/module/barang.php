<?php
include "../lib/koneksi.php";

if (isset($_POST["ubah"])) {
    // periksa login
    if (empty($username_admin) and empty($password_admin)) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=login/index.php><b>LOGIN</b></a></center>";
    } else {
        $ID_SEPATU = $_POST['ID_SEPATU'];
        $MERK_SEPATU = $_POST['MERK_SEPATU'];

        $queryEdit = mysqli_query($con, "UPDATE barang SET MERK_SEPATU='$MERK_SEPATU' WHERE ID_SEPATU='$ID_SEPATU'");
        if ($queryEdit) {
            echo "<script>alert('Data Admin berhasil diubah'); window.location = 'dashboard.php?module=barang';</script>";
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
        $ID_SEPATU = $_POST['ID_SEPATU'];
        $queryHapus = mysqli_query($con, "DELETE FROM barang WHERE ID_SEPATU='$ID_SEPATU'");
        if ($queryHapus) {
            echo "<script>alert('Data Admin berhasil dihapus'); window.location = 'dashboard.php?module=barang';</script>";
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
        $MERK_SEPATU = mysqli_real_escape_string($con, $_POST['MERK_SEPATU']);
        $NO_SEPATU = mysqli_real_escape_string($con, $_POST['NO_SEPATU']);
        $harga = mysqli_real_escape_string($con, $_POST['harga']);
        $STOK = mysqli_real_escape_string($con, $_POST['STOK']);
        $ID_SUPPLIER = mysqli_real_escape_string($con, $_POST['ID_SUPPLIER']);
        $variasi = mysqli_real_escape_string($con, $_POST['variasi']);
        $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
        // Foto barang?
        $querySimpan = mysqli_query($con, "INSERT INTO barang (MERK_SEPATU, NO_SEPATU, harga, STOK, ID_SUPPLIER, variasi, deskripsi) VALUES ('$MERK_SEPATU', '$NO_SEPATU', '$harga', '$STOK', '$ID_SUPPLIER', '$variasi', '$deskripsi')");
        if ($querySimpan) {
            echo "<script>alert('Data Admin berhasil disimpan'); window.location = 'dashboard.php?module=barang';</script>";
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
                <h4 class="card-title">Tabel Barang</h4>
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
                            <th><center>No</center></th>
                            <th><center>MERK_SEPATU</center></th>
                            <th><center>UKURAN SEPATU</center></th>
                            <th><center>Harga</center></th>
                            <th><center>STOK</center></th>
                            <th><center>ID_SUPPLIER</center></th>
                            <th><center>Variasi</center></th>
                            <th><center>Deskripsi</center></th>
                            <th><center>Foto barang</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kueriPrakerin = mysqli_query($con, "SELECT * FROM barang");
                            while ($arsa = mysqli_fetch_array($kueriPrakerin)) {
                                $editModalID = "editModal" . $arsa['ID_SEPATU'];
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
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
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#<?php echo $editModalID; ?>">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" name="ID_SEPATU" value="<?php echo $arsa['ID_SEPATU']; ?>">
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
                                                    <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="ID_SEPATU" value="<?php echo $arsa['ID_SEPATU']; ?>">
                                                        <div class="mb-3">
                                                            <label for="MERK_SEPATU" class="form-label">Merk Sepatu</label>
                                                            <input type="text" class="form-control" id="MERK_SEPATU" name="MERK_SEPATU" value="<?php echo $arsa['MERK_SEPATU']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="NO_SEPATU" class="form-label">Ukuran Sepatu. Ex. 42</label>
                                                            <!-- <input type="text" class="form-control" id="NO_SEPATU" name="NO_SEPATU" value="<?php echo $arsa['NO_SEPATU']; ?>" required> -->
                                                            <select name="NO_SEPATU" class="form-control" >
                                                                <?php
                                                                for ($ukuran = 30; $ukuran <= 48; $ukuran++) {
                                                                    echo "<option value='$ukuran'>$ukuran</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $arsa['harga']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="STOK" class="form-label">Stok</label>
                                                            <input type="text" class="form-control" id="STOK" name="STOK" value="<?php echo $arsa['STOK']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="ID_SUPPLIER" class="form-label">ID Supplier</label>
                                                            <input type="text" class="form-control" id="ID_SUPPLIER" name="ID_SUPPLIER" value="<?php echo $arsa['ID_SUPPLIER']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="variasi" class="form-label">Variasi</label>
                                                            <input type="text" class="form-control" id="variasi" name="variasi" value="<?php echo $arsa['variasi']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $arsa['deskripsi']; ?></textarea>
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
                    <button type="button" class="btn btn-sm btn-de-primary " data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Barang</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Barang Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Merk Sepatu</label>
                        <input type="text" name="MERK_SEPATU" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Sepatu</label>
                        <!-- <input type="text" name="NO_SEPATU" class="form-control" required> -->
                        <select name="NO_SEPATU" class="form-control" >
                            <?php
                            for ($ukuran = 30; $ukuran <= 48; $ukuran++) {
                                echo "<option value='$ukuran'>$ukuran</option>";
                            }
                            ?>
                        </select>
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
