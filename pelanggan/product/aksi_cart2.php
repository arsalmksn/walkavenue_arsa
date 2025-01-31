<?php
include "../../lib/koneksi.php";
@session_start();

// Ambil ID pelanggan dari session
$id_pelanggan = $_SESSION['id_pelanggan'];

// Ambil ID barang dari parameter URL
$id_barang = $_GET['ID_SEPATU'];

// Tentukan waktu sekarang
date_default_timezone_set('Asia/Jakarta');
$tgl_nota_penjualan = date('Y-m-d');

// Insert data ke tabel penjualan2
// mysqli_query($con, "INSERT INTO penjualan2 (id_pelanggan, id_barang, tgl_nota_penjualan) VALUES ('$id_pelanggan', '$id_barang', '$tgl_nota_penjualan')");

// Redirect ke halaman dashboard
// echo "<script>
//     window.location = '../../dashboard.php?module=cart&id_pelanggan=$id_pelanggan&ID_SEPATU=$id_barang&tgl_nota_penjualan=$tgl_nota_penjualan';
// </script>";
$id_pelanggan = $_SESSION['id_pelanggan'];
    $id_barang = $_GET['ID_SEPATU'];
$sql_cek = "SELECT kuantitas FROM penjualan2 WHERE id_pelanggan = '$id_pelanggan' AND id_barang = '$id_barang'";
$stmt_cek = $con->prepare($sql_cek);
$result = $stmt_cek->get_result();
if ($id_pelanggan AND $id_barang) {
    // Jika data ditemukan, update jumlah_produk
    $row = $result->fetch_assoc();
    $kuantitas = $row['kuantitas'] + 1;
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $id_barang = $_GET['ID_SEPATU'];
    $sql_update = "UPDATE penjualan2 SET kuantitas = $kuantitas WHERE id_pelanggan = '$id_pelanggan' AND id_barang = '$id_barang'";
    
} else {
    $query1 = "INSERT INTO penjualan2 (id_pelanggan, id_barang, tgl_nota_penjualan) VALUES ('$id_pelanggan', '$id_barang', '$tgl_nota_penjualan')";

// Eksekusi query pertama dan cek keberhasilan
    if (mysqli_query($con, $query1)) {
    // Jika query pertama berhasil, eksekusi query kedua
    $kueripenjualan = mysqli_query($con, "SELECT * FROM penjualan2 where id_pelanggan='$id_pelanggan' AND id_barang='$id_barang'");
    while ($kat = mysqli_fetch_array($kueripenjualan)) {
        $id_penjualan= $kat['id_penjualan'];
        $status_trans = 'keranjang';
    $query2 = "INSERT INTO detail_penjualan (no_nota_penjualan, tgl_penjualan, id_pelanggan, status_transaksi) 
               VALUES ('$id_penjualan', '$tgl_nota_penjualan', '$id_pelanggan', '$status_trans')";
    
    if (mysqli_query($con, $query2)) {
        echo "Data berhasil disimpan pada kedua tabel.";
        echo "<script>
    window.location = '../../dashboard.php?module=cart&id_pelanggan=$id_pelanggan&ID_SEPATU=$id_barang&tgl_nota_penjualan=$tgl_nota_penjualan';
    </script>";
    } else {
        echo "Query kedua gagal: " . mysqli_error($con);
    }
}
} else {
    echo "Query pertama gagal: " . mysqli_error($con);
}
}
?>
