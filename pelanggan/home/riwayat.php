<?php
// Koneksi ke database
include "lib/koneksi.php";

// Query untuk mendapatkan data transaksi
$id_pelanggan = $_GET['id_pelanggan']; // Filter berdasarkan ID pelanggan
$status_transaksi = 'checkout';

$query = "
    SELECT 
        p.no_nota_penjualan, 
        p.harga_penjualan, 
        p.status_transaksi, 
        p.tgl_penjualan, 
        p.kode_transaksi
    FROM penjualan p
    WHERE p.id_pelanggan = ? AND p.status_transaksi = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param('is', $id_pelanggan, $status_transaksi);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Transaksi</h1>

        <table>
            <thead>
                <tr>
                    <th>No Nota Penjualan</th>
                    <th>Harga Penjualan</th>
                    <th>Status Transaksi</th>
                    <th>Tanggal Penjualan</th>
                    <th>Kode Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['no_nota_penjualan']); ?></td>
                        <td>Rp <?php echo number_format($row['harga_penjualan'], 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['status_transaksi']); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_penjualan']); ?></td>
                        <td><?php echo htmlspecialchars($row['kode_transaksi']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
