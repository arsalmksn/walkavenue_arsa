<?php
// Pastikan kode ini diletakkan di awal file index.php,
// sebelum ada output HTML atau echo lainnya.

// Redirect ke halaman dashboard.php dengan parameter module=pelanggan
$id_pelanggan = $_GET['id_pelanggan'];
// echo "$id_pelanggan";
header("Location: dashboard.php?module=pelanggan&id_pelanggan=$id_pelanggan");
exit(); // Menghentikan eksekusi lebih lanjut untuk memastikan redirect berjalan
?>
