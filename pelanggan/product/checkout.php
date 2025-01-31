<?php
include "lib/koneksi.php";
@session_start();
$tgl_skrg = date("Y-m-d");
$id_pelanggan = $_GET['id_pelanggan'];
$id_penjualan = $_GET['id_penjualan'];
$tgl_penjualan = $_GET['tgl_penjualan'];

$query = "
SELECT 
    SUM(br.harga * pp.kuantitas) AS total_bayar, 
    SUM(pp.kuantitas) AS total_kuantitas
FROM 
    penjualan2 pp
INNER JOIN 
    barang br ON br.ID_SEPATU = pp.id_barang
INNER JOIN 
    detail_penjualan dp ON pp.id_penjualan = dp.no_nota_penjualan
WHERE 
    pp.id_pelanggan = '$id_pelanggan' 
    AND dp.status_transaksi = 'keranjang' 
    AND dp.kode_transaksi IS NULL;
";

$result = mysqli_query($con, $query);

if ($result) {
    $prk = mysqli_fetch_assoc($result);
    if ($prk) {
        // Data berhasil diambil
        ?>
        <div class="col-lg-12">
            <div class="your-order mb-30">
                <h3>Detail Transaksi Pembayaran</h3>
                <div class="your-order-table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-name">Deskripsi</th>
                                <th class="product-total">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="cart_item">
                                <td class="product-name">Total Harga Produk</td>
                                <td class="product-total">
                                    <span class="amount">Rp <?php echo number_format($prk['total_bayar'], 2, ',', '.'); ?></span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="product-name">Total Kuantitas</td>
                                <td class="product-total">
                                    <span class="amount"><?php echo $prk['total_kuantitas']; ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Informasi Pembayaran -->
                <div class="payment-information mt-30">
                    <h4>Metode Pembayaran</h4>
                    <p>Silakan melakukan pembayaran menggunakan salah satu metode berikut:</p>
                    <ul>
                        <li>
                            <strong>Transfer Bank:</strong> <br>
                            Bank BCA - 1234567890 (a.n. PT. Dummy Account)
                        </li>
                        <li>
                            <strong>QRIS:</strong> <br>
                            <img src="upload/qris.png" alt="QRIS Dummy" style="max-width: 200px;">
                        </li>
                    </ul>
                </div>
                <div class="order-button-payment mt-20">
                    <a href="pelanggan/product/aksi_checkout.php?id_penjualan=<?php echo $id_penjualan; ?>&id_pelanggan=<?php echo $id_pelanggan; ?>&tgl_penjualan=<?php echo $tgl_penjualan; ?>">
                        <button class="tp-btn-h1">Konfirmasi Pembayaran</button>
                    </a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Tidak ada data transaksi.";
    }
} else {
    echo "Error: " . mysqli_error($con);
}
?>
