        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->
       <!-- product-details-start -->
       <div class="product-details">
            <div class="container">
                <div class="row">
                <?php

                include "lib/koneksi.php";
                $id_barang = $_GET['id_sepatu'] ;
                $kueripenjualan = mysqli_query($con, "SELECT * FROM barang where ID_SEPATU='$id_barang'");
                while ($kat = mysqli_fetch_array($kueripenjualan)) {
                ?>
                 
                    <div class="col-xl-6">
                        <div class="product__details-nav d-sm-flex align-items-start">
                            <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="thumbOne-tab" data-bs-toggle="tab" data-bs-target="#thumbOne" type="button" role="tab" aria-controls="thumbOne" aria-selected="true">
                                      <img src="upload/<?php echo $kat['foto_barang']; ?>" alt="">
                                  </button>
                                </li>
                                
                            </ul>
                           
                        </div>
                    </div>
                   
                    <div class="col-xl-6">
                        <div class="product__details-content">
                            <h6><?php echo $kat['MERK_SEPATU']; ?></h6>
                            <div class="pd-rating mb-10">
                                <ul class="rating">
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                </ul>
                                <span>(01 review)</span>
                                <span><a href="#">Add your review</a></span>
                            </div>
                            <div class="price mb-10">
                                <span><?php echo $kat['harga']; ?></span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                <ul>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> <?php echo $kat['deskripsi']; ?></a></li>
                                </ul>
                            </div>
                            <div class="product-stock mb-20">
                                <h5>Availability: <span> <?php echo $kat['STOK']; ?> in stock</span></h5>
                            </div>
                            <form method="POST" action="pelanggan/product/aksi_cart.php?ID_SEPATU=<?php echo $kat['ID_SEPATU']; ?>">
                            <div class="cart-option mb-15">
                                <div class="product-quantity mr-20">
                                    <div class="cart-plus-minus p-relative"><input type="text" value="1" name="kuantitas"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                </div>
                                
                                <button class="cart-btn" type="submit">Add to Cart</button>
                                <!-- <a href="pelanggan/product/aksi_cart.php?ID_SEPATU=<?php echo $kat['ID_SEPATU']; ?>" class="cart-btn">Add to Cart</a></form> -->
                            </div></form>
                            <div class="details-meta">
                                <div class="d-meta-left">
                                    <div class="dm-item mr-20">
                                        <a href="#"><i class="fal fa-heart"></i>Add to wishlist</a>
                                    </div>
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-layer-group"></i>Compare</a>
                                    </div>
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="product-tag-area mt-15">
                                <div class="product_info">
                                    <span class="sku_wrapper">
                                        <span class="title">SKU:</span>
                                        <span class="sku">DK1002</span>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Categories:</span>
                                        <a href="#">iPhone</a>
                                        <a href="#">Tablets</a>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="title">Tags:</span>
                                        <a href="#">Smartphone</a>, 
                                        <a href="#">Tablets</a>
                                    </span>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- product-details-end -->