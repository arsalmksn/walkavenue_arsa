<?php
include "../../lib/koneksi.php";
@session_start();

// Ambil ID pelanggan dan barang
$id_pelanggan = $_SESSION['id_pelanggan'];
$id_barang = $_GET['ID_SEPATU'];

// Validasi input
if (empty($id_pelanggan) || empty($id_barang)) {
    die("ID pelanggan atau ID barang tidak valid.");
}

// Tentukan waktu sekarang
date_default_timezone_set('Asia/Jakarta');
$tgl_nota_penjualan = date('Y-m-d');
$waktu = date('Y-m-d H:i:s');

// Periksa apakah data sudah ada di tabel penjualan2 dengan status keranjang
$sql_cek = "SELECT pp.id_penjualan, pp.kuantitas 
            FROM penjualan2 pp 
            JOIN detail_penjualan dp 
            ON pp.id_penjualan = dp.no_nota_penjualan 
            WHERE pp.id_pelanggan = ? 
            AND pp.id_barang = ? 
            AND dp.status_transaksi = 'keranjang'";

if (!$stmt_cek = $con->prepare($sql_cek)) {
    die("Kesalahan pada query SQL (cek): " . $con->error);
}

$stmt_cek->bind_param("ii", $id_pelanggan, $id_barang);
$stmt_cek->execute();
$result = $stmt_cek->get_result();




if ($result->num_rows == 0) {
    // Jika data tidak ditemukan, insert ke tabel penjualan2
    $sql_insert_penjualan = "INSERT INTO penjualan2 (id_pelanggan, id_barang, tgl_nota_penjualan, waktu, kuantitas) VALUES (?, ?, ?, ?, 1)";
    if (!$stmt_insert_penjualan = $con->prepare($sql_insert_penjualan)) {
        die("Kesalahan pada query SQL (insert penjualan2): " . $con->error);
    }

    $stmt_insert_penjualan->bind_param("iiss", $id_pelanggan, $id_barang, $tgl_nota_penjualan, $waktu);

    if ($stmt_insert_penjualan->execute()) {
        // Dapatkan ID penjualan terakhir
        $id_penjualan = $con->insert_id;

        
        // Insert ke tabel detail_penjualan
        $status_trans = 'keranjang';
        $sql_insert_detail = "INSERT INTO detail_penjualan (no_nota_penjualan, tgl_penjualan, id_pelanggan, status_transaksi) VALUES (?, ?, ?, ?)";
        if (!$stmt_insert_detail = $con->prepare($sql_insert_detail)) {
            die("Kesalahan pada query SQL (insert detail_penjualan): " . $con->error);
        }

        $stmt_insert_detail->bind_param("isis", $id_penjualan, $tgl_nota_penjualan, $id_pelanggan, $status_trans);

        if ($stmt_insert_detail->execute()) {
            echo "Data berhasil disimpan.";
        } else {
            die("Gagal menyimpan data ke detail_penjualan: " . $stmt_insert_detail->error);
        }

        $stmt_insert_detail->close();
    } else {
        die("Gagal menyimpan data ke penjualan2: " . $stmt_insert_penjualan->error);
    }

    $stmt_insert_penjualan->close();
} else {
    // Jika data ditemukan, update kuantitas
    $row = $result->fetch_assoc();
    $kuantitas_baru = $row['kuantitas'] + 1;

    $sql_update = "UPDATE penjualan2 SET kuantitas = ? WHERE id_pelanggan = ? AND id_barang = ?";
    if (!$stmt_update = $con->prepare($sql_update)) {
        die("Kesalahan pada query SQL (update): " . $con->error);
    }

    $stmt_update->bind_param("iii", $kuantitas_baru, $id_pelanggan, $id_barang);

    if ($stmt_update->execute()) {
        echo "Kuantitas berhasil diperbarui.";
    } else {
        die("Gagal memperbarui kuantitas: " . $stmt_update->error);
    }

    $stmt_update->close();
}

$stmt_cek->close();
$con->close();

// Redirect ke halaman dashboard
header("Location: ../../dashboard.php?module=cart&id_pelanggan=$id_pelanggan&ID_SEPATU=$id_barang");
exit();
?>
