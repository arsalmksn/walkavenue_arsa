<?php
@session_start();
$tgl_skrg = date("Y-m-d");
$id_pelanggan = $_GET['id_pelanggan'];
$kode_transaksi = $_GET['kode_transaksi'];
// $id_penjualan = $_GET['id_penjualan'];
// $tgl_penjualan = $_GET['tgl_nota_penjualan'];

include "../../lib/koneksi.php";

// Query untuk mendapatkan detail transaksi
// $tgl_penjualan = mysqli_real_escape_string($con, $tgl_penjualan);

$queryNota = mysqli_query($con, "SELECT 
    br.MERK_SEPATU AS nama_produk, 
    pp.kuantitas, 
    br.harga, dp.kode_transaksi,
    (br.harga * pp.kuantitas) AS subtotal,
    pe.nama_pelanggan
FROM 
    penjualan2 pp
JOIN 
    barang br ON pp.id_barang = br.ID_SEPATU
JOIN 
    pelanggan2 pe ON pp.id_pelanggan = pe.id_pelanggan
JOIN 
    detail_penjualan dp ON pp.id_penjualan = dp.no_nota_penjualan
WHERE 
    pp.id_pelanggan = '$id_pelanggan' AND dp.kode_transaksi='$kode_transaksi'");

if (!$queryNota) {
    die("Error pada query nota: " . mysqli_error($con));
}

$pelangganQuery = mysqli_query($con, "SELECT * FROM pelanggan2 WHERE id_pelanggan = '$id_pelanggan'");
if (!$pelangganQuery) {
    die("Error pada query pelanggan: " . mysqli_error($con));
}

$pelanggan = mysqli_fetch_assoc($pelangganQuery);
if (!$pelanggan) {
    die("Data pelanggan tidak ditemukan.");
}

$totalBayar = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembayaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Nota Pembayaran</h3>
            <!-- <p>Tanggal: <?php echo $tgl_penjualan; ?></p> -->
            <p>Nomor Transaksi: TR<?php echo $kode_transaksi; ?></p>
        </div>
        <div class="card-body">
            <p><strong>Nama Pelanggan:</strong> <?php echo $pelanggan['nama_pelanggan']; ?></p>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Kuantitas</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($queryNota) > 0) { 
                    while ($nota = mysqli_fetch_assoc($queryNota)) { 
                        $totalBayar += $nota['subtotal'];
                ?>
                <tr>
                    <td><?php echo $nota['nama_produk']; ?></td>
                    <td>Rp <?php echo number_format($nota['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $nota['kuantitas']; ?></td>
                    <td>Rp <?php echo number_format($nota['subtotal'], 0, ',', '.'); ?></td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data transaksi.</td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right font-weight-bold">Total</td>
                    <td>Rp <?php echo number_format($totalBayar, 0, ',', '.'); ?></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer text-center">
            <p>Terima kasih telah berbelanja di toko kami.</p>
            <button class="btn btn-primary" onclick="window.print()">Cetak Nota</button>
             <a href="../../dashboard.php?module=pelanggan&id_pelanggan=<?php echo $id_pelanggan; ?>&tgl_penjualan=<?php echo $tgl_penjualan; ?>"><div style="
    display: inline-block; 
    padding: 10px 20px; 
    font-size: 16px; 
    text-align: center; 
    color: black; 
    background-color: white; 
    border: 2px solid blue; 
    border-radius: 5px; 
    cursor: pointer; 
    outline: none; 
    transition: background-color 0.3s, color 0.3s;"
  onmouseover="this.style.backgroundColor='blue'; this.style.color='white';"
  onmouseout="this.style.backgroundColor='white'; this.style.color='black';"
  onfocus="this.style.outline='2px solid blue';"
  onblur="this.style.outline='none';">Kembali</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
