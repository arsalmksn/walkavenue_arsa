<?php
// Koneksi ke database
include('../lib/koneksi.php');

function hitungTotalPembelian($jumlahList, $hargaSatuanList)
{
    $total = 0;

    foreach ($jumlahList as $key => $jumlah) {
        $hargaSatuan = $hargaSatuanList[$key];
        $subTotal = $jumlah * $hargaSatuan;
        $total += $subTotal;
    }

    return $total;
}

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = date('Y-m-d'); // Ambil tanggal saat ini

    // Data dari form
    $jumlahList = $_POST['jumlah'];
    $hargaSatuanList = $_POST['harga_satuan'];

    // Hitung total pembelian
    $totalPembelian = hitungTotalPembelian($jumlahList, $hargaSatuanList);

    echo "Total Penjualan: Rp " . number_format($totalPembelian, 2, ',', '.');

    // Proses transaksi seperti menyimpan ke database dapat dilanjutkan di sini
    try {
        $con->begin_transaction();

        foreach ($_POST['id_penjualan'] as $key => $id_penjualan) {
            $jumlah = (int)$jumlahList[$key];
            $hargaSatuan = (float)$hargaSatuanList[$key];
            $subTotal = $jumlah * $hargaSatuan;

            // Query untuk menyimpan data penjualan
            $query_insert = "INSERT INTO penjualan2 (id_penjualan, jumlah, harga_satuan, sub_total, tanggal)
                             VALUES ('$id_penjualan', '$jumlah', '$hargaSatuan', '$subTotal', '$tanggal')";

            if (!$con->query($query_insert)) {
                throw new Exception("Error saat menyimpan data penjualan: " . $con->error);
            }

            // Query untuk memperbarui stok
            $query_update_stok = "UPDATE obat SET stok = stok - $jumlah WHERE id_penjualan = '$id_penjualan' AND stok >= $jumlah";

            if (!$con->query($query_update_stok)) {
                throw new Exception("Stok tidak cukup untuk obat ID $id_penjualan atau error dalam update: " . $con->error);
            }

            // Query untuk mencatat log stok
            $query_insert_log = "INSERT INTO stok_log (id_penjualan, tanggal, perubahan_stok, keterangan)
                                 VALUES ('$id_penjualan', '$tanggal', -$jumlah, 'Penjualan')";

            if (!$con->query($query_insert_log)) {
                throw new Exception("Error saat mencatat log stok: " . $con->error);
            }
        }

        $con->commit();
        echo "Penjualan berhasil ditambahkan. Total: Rp " . number_format($totalPembelian, 2, ',', '.');
    } catch (Exception $e) {
        $con->rollback();
        echo $e->getMessage();
    }
}

// Query untuk mengambil data nama_obat dan id_penjualan dari tabel obat, diurutkan berdasarkan nama_obat
$query_obat = "SELECT id_penjualan, nama_obat, harga FROM obat ORDER BY nama_obat ASC";
$result_obat = $con->query($query_obat);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #total_pembelian {
            margin-bottom: 15px;
            /* Jarak bawah input total pembelian */
        }

        .form-row.mt-3 {
            margin-top: 20px;
            /* Jarak atas antara input total dan tombol */
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="m-0 font-weight-bold text-primary">Tambah Penjualan</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <div id="obat-container">
                                            <div class="form-row mb-4 obat-item">
                                                <label for="id_penjualan" class="col-sm-2 col-form-label">Nama Obat</label>
                                                <div class="col-sm-10 mb-3">
                                                    <select class="form-control custom-select" name="id_penjualan[]" required>
                                                        <option value="" disabled selected>Pilih Obat</option>
                                                        <?php while ($row = $result_obat->fetch_assoc()) : ?>
                                                            <option value="<?= $row['id_penjualan'] ?>" data-harga="<?= $row['harga'] ?>">
                                                                <?= $row['nama_obat'] ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                                <div class="col-sm-4 mb-3">
                                                    <input type="number" class="form-control" name="jumlah[]" required>
                                                </div>
                                                <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="harga_satuan[]" readonly required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="total_pembelian" class="col-form-label">Total Pembelian</label>
                                            <input type="text" class="form-control form-control-sm" id="total_pembelian" readonly>
                                        </div>

                                        <div class="form-row mt-3">
                                            <div class="col-sm-12 text-right">
                                                <button type="button" class="btn btn-secondary" onclick="tambahObat()">Tambah Obat</button>
                                                <button type="submit" class="btn btn-primary">Simpan Penjualan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function tambahObat() {
                    const container = document.getElementById('obat-container');
                    const item = document.querySelector('.obat-item').cloneNode(true);
                    item.querySelectorAll('input').forEach(input => input.value = '');
                    container.appendChild(item);
                }

                document.addEventListener('change', function(e) {
                    if (e.target.matches('[name="id_penjualan[]"]')) {
                        const harga = e.target.selectedOptions[0].getAttribute('data-harga');
                        e.target.closest('.form-row').querySelector('[name="harga_satuan[]"]').value = harga;
                    }
                });

                document.addEventListener('input', function() {
                    let total = 0;
                    document.querySelectorAll('.obat-item').forEach(item => {
                        const jumlah = parseFloat(item.querySelector('[name="jumlah[]"]').value) || 0;
                        const hargaSatuan = parseFloat(item.querySelector('[name="harga_satuan[]"]').value) || 0;
                        total += jumlah * hargaSatuan;
                    });
                    document.getElementById('total_pembelian').value = `Rp ${total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }).replace("Rp", "")}`;
                });
            </script>

            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="js/sb-admin-2.min.js"></script>
        </div>
    </div>
</body>

</html>