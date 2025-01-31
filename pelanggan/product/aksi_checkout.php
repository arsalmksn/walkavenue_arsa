<?php
include "../../lib/koneksi.php";
session_start();

// Ambil ID pelanggan dari session
$id_pelanggan = isset($_SESSION['id_pelanggan']) ? mysqli_real_escape_string($con, $_SESSION['id_pelanggan']) : null;
$id_penjualan = isset($_GET['id_penjualan']) ? mysqli_real_escape_string($con, $_GET['id_penjualan']) : null;
$tgl_penjualan = isset($_GET['tgl_penjualan']) ? mysqli_real_escape_string($con, $_GET['tgl_penjualan']) : null;

if (!$id_pelanggan || !$id_penjualan || !$tgl_penjualan) {
    die("Parameter tidak lengkap.");
}

function buatIdTransaksi($con) {
    $query = "SELECT kode_transaksi FROM detail_penjualan ORDER BY kode_transaksi DESC LIMIT 1";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $number = intval(substr($row['kode_transaksi'], 3));
        $newId = "TRX" . str_pad($number + 1, 4, "0", STR_PAD_LEFT);
    } else {
        $newId = "TRX0001";
    }
    return $newId;
}

$idTransaksiBaru = buatIdTransaksi($con);

$query3 = "
   UPDATE detail_penjualan dp
   JOIN penjualan2 p ON dp.no_nota_penjualan = p.id_penjualan
   JOIN barang s ON p.id_barang = s.ID_SEPATU
   SET 
       dp.harga_penjualan = s.harga * p.kuantitas,
       dp.status_transaksi = 'checkout',
       dp.kode_transaksi = '$idTransaksiBaru'
   WHERE 
       p.id_pelanggan = '$id_pelanggan' 
       AND p.tgl_nota_penjualan = '$tgl_penjualan' 
       AND dp.kode_transaksi IS NULL";

if (mysqli_query($con, $query3)) {
    echo "<script>
         window.location = 'nota.php?module=pelanggan&id_pelanggan=$id_pelanggan&tgl_nota_penjualan=$tgl_penjualan&kode_transaksi=$idTransaksiBaru';
         </script>";
} else {
    echo "Error in Query 3: " . mysqli_error($con);
}
?>
