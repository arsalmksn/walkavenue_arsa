   
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Penjualan </h4>
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
                                        <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="80">
                                        <center>No Nota Penjualan</center>
                                    </th>
                                    
                                    <th width="50">
                                        <center>Id Pelanggan</center>
                                    </th>
                                    <th>
                                        <center>Harga Penjualan</center>
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../lib/koneksi.php";
                                $no = 1;
                                $tgl_skrg = date("Y-m-d");
                                $kueriPrakerin = mysqli_query($con, "SELECT * FROM detail_penjualan");
                                while ($prk = mysqli_fetch_array($kueriPrakerin)) {
                                ?>
                                    <tr>
                                        <td width="10"><?php echo $no++; ?></td>
                                        <td><?php echo $prk['no_nota_penjualan']; ?></td>
                                       <!--<td><?php echo $prk['ID_SEPATU']; ?></td>-->
                                        <td><?php echo $prk['id_pelanggan']; ?></td>
                                        <td width="50"><?php echo $prk['harga_penjualan']; ?></td>
      
                                        <!-- <td>
                                            <center><img src="../upload/<?php echo $prk['foto_prak']; ?>" height="40" width="40"></center>
                                        </td> -->
                                        <td>
                                           
                                    </tr>
                                    </form>
                                <?php }  ?>
                            </tbody>
                                    </table>
                                    <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                                    <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                                    <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                                    <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
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
