<?php
@session_start();
include "lib/koneksi.php";

// Pastikan ID pelanggan dan ID barang tersedia
if (!isset($_SESSION['id_pelanggan']) || !isset($_GET['ID_SEPATU'])) {
    echo "ID pelanggan atau ID barang tidak valid.";
    exit;
}

$id_pelanggan = $_SESSION['id_pelanggan'];


if (isset($_POST['kurang'])) {
    // Kurangi kuantitas jika tombol "kurang" ditekan
    $id_barang2 = $_POST['sepatu'];
    $sql_cek = "SELECT kuantitas FROM penjualan2 WHERE id_pelanggan = ? AND id_barang = ?";
    $stmt_cek = $con->prepare($sql_cek);
    $stmt_cek->bind_param("ii", $id_pelanggan, $id_barang2);
    $stmt_cek->execute();
    $result = $stmt_cek->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kuantitas_baru = max(0, $row['kuantitas'] - 1); // Tidak boleh kurang dari 0

        $sql_update = "UPDATE penjualan2 SET kuantitas = ? WHERE id_pelanggan = ? AND id_barang = ?";
        $stmt_update = $con->prepare($sql_update);
        $stmt_update->bind_param("iii", $kuantitas_baru, $id_pelanggan, $id_barang2);

        if ($stmt_update->execute()) {
            echo "Kuantitas berhasil dikurangi.";
        } else {
            echo "Gagal mengurangi kuantitas: " . $stmt_update->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }
}

if (isset($_POST['tambah'])) {
    // Tambah kuantitas jika tombol "tambah" ditekan
    $id_barang = $_POST['sepatu'];
    $sql_cek = "SELECT kuantitas FROM penjualan2 WHERE id_pelanggan = ? AND id_barang = ?";
    $stmt_cek = $con->prepare($sql_cek);
    $stmt_cek->bind_param("ii", $id_pelanggan, $id_barang2);
    $stmt_cek->execute();
    $result = $stmt_cek->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kuantitas_baru = $row['kuantitas'] + 1;

        $sql_update = "UPDATE penjualan2 SET kuantitas = ? WHERE id_pelanggan = ? AND id_barang = ?";
        $stmt_update = $con->prepare($sql_update);
        $stmt_update->bind_param("iii", $kuantitas_baru, $id_pelanggan, $id_barang2);

        if ($stmt_update->execute()) {
            echo "Kuantitas berhasil ditambah.";
        } else {
            echo "Gagal menambah kuantitas: " . $stmt_update->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }
}

$con->close();
?>

 <!-- cart-area-start -->
 <section class="cart-area pt-120 pb-120">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                  <form action="aksi_cart.php" method="post">
                           <div class="table-content table-responsive">
                           <table class="table">
                                    <thead>
                                       <tr>
                                          <th class="product-thumbnail">Gambar</th>
                                          <th class="cart-product-name">Merk Sepatu</th>
                                          <th class="product-price">Deskripsi</th>
                                          <th class="product-quantity">Harga</th>
                                          <th class="product-subtotal">Kuantitas</th>
                                          <th class="product-remove">Total</th>
                                          <th class="product-remove">Aksi</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                           <?php
                                include "lib/koneksi.php";
                                $no = 1;
                                $tgl_skrg = date("Y-m-d");
                                $id_pelanggan = $_GET['id_pelanggan'];
                                $id_barang = $_GET['ID_SEPATU'];
                                $kueriPrakerin = mysqli_query($con, "SELECT 
    br.*,
    pp.*, 
    (br.harga * pp.kuantitas) AS total_bayar,
    dp.*
FROM 
    barang br
JOIN 
    penjualan2 pp ON br.ID_SEPATU = pp.id_barang
JOIN 
    pelanggan2 pe ON pp.id_pelanggan = pe.id_pelanggan
JOIN 
    detail_penjualan dp ON pp.id_penjualan = dp.no_nota_penjualan
WHERE 
    pp.id_pelanggan = $id_pelanggan AND dp.status_transaksi = 'keranjang' AND dp.harga_penjualan IS NULL

");
                                while ($prk = mysqli_fetch_array($kueriPrakerin)) {
                                 $id_penjualan = $prk['id_penjualan']; 
                                 $tgl_penjualan = $prk['tgl_penjualan']; 
                                ?>                           
                             
                                       <tr>
                                          <td class="product-thumbnail"><img src="upload/<?php echo $prk['foto_barang']; ?>" alt="nungguin ya?"></td> 
                                          <td class="product-name"><?php echo $prk['MERK_SEPATU']; ?></td>
                                          <td class="product-name"><?php echo $prk['deskripsi']; ?></td>
                                          <td class="product-price"><span class="amount"><?php echo $prk['harga']; ?></span></td>
                                          <td class="product-quantity"><form method="post"><button class="btn" name="kurang">-</button></form>
                                                <input type="text" value="<?php echo $prk['kuantitas']; ?>"><form method="post"><input type="hidden" name="sepatu" value="<?php echo $prk['ID_SEPATU']; ?>" ><button class="btn" name="tambah">+</button><input type="hidden" name="sepatu" value="<?php echo $prk['ID_SEPATU']; ?>"</form>
                                          </td>
                                          <td class="product-subtotal"><span class="amount"><?php echo $prk['total_bayar']; ?></span></td>
                                          <td class="product-remove"><form method="post"  <input type="hidden" name="sepatu" value="<?php echo $prk['ID_SEPATU']; ?>"><button type="submit" name="batal" class="btn"><i class="fa fa-times"></i> </button>
                                          </form></td>
                                          
                                 </tr> <?php }  ?>
                                    </tbody>
                              </table>
                             
                           </div>
                          
                           <div class="row justify-content-end">
                              <div class="col-md-5">
                                    <div class="cart-page-total">
                                    
                                       <a class="tp-btn-h1" href="dashboard.php?module=checkout&id_penjualan=<?php echo $id_penjualan; ?>&id_pelanggan=<?php echo $id_pelanggan; ?>&tgl_penjualan=<?php echo $tgl_penjualan; ?>">Proceed to checkout</a>
                                    </div>
                              </div>
                           </div>
                        </form>
                  </div>
               </div>
            </div>
         </section>
         <?php  ?>
         <!-- cart-area-end -->