<!-- offcanvas area start -->
<div class="offcanvas__area">
        <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__logo mb-40">
                <a href="index.html">
                <img src="assets/img/logo/logo-white.png" alt="logo">
                </a>
            </div>
            <div class="offcanvas__search mb-25">
                <form action="#">
                    <input type="text" placeholder="What are you searching for?">
                    <button type="submit" ><i class="far fa-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu fix"></div>
            <div class="offcanvas__action">

            </div>
        </div>
        </div>
    </div>
    <!-- offcanvas area end -->      
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <main>


        <!-- slider-area-start -->
        <div class="slider-area light-bg-s pt-60">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="swiper-container slider__active pb-30">
                            <div class="slider-wrapper swiper-wrapper">
                                <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="upload/nike.jpg">
                                    <div class="slider-content slider-content-2">
                                        <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">Walk Avenue<br> Berbagai pilihan sepatu </h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Lengkapi Koleksimu Sekarang Juga!!</p>
                                        <div class="slider-bottom-btn mt-65">
                                            <a data-animation="fadeInUp" data-delay="1.15s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                        </div>
                                    </div>
                                </div><!-- /single-slider -->
                                <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="upload/reebok.jpg">
                                    <div class="slider-content slider-content-2">
                                        <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">Siap Jadi Saksi Perjalananmu<br>  </h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.7s">Temani Aksimu Kemana Saja!!</p>
                                        <div class="slider-bottom-btn mt-65">
                                            <a data-animation="fadeInUp" data-delay="1.9s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                        </div>
                                    </div>
                                </div><!-- /single-slider -->
                                <div class="single-slider b-radius-2 swiper-slide slider-height-2 d-flex align-items-center" data-background="upload/under.jpg">
                                    <div class="slider-content slider-content-2">
                                        <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">Temukan<br> Seleramu.</h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.8s">Hanya Di WalkAvenue </p>
                                        <div class="slider-bottom-btn mt-65">
                                            <a data-animation="fadeInUp" data-delay="1.10s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                        </div>
                                    </div>
                                </div><!-- /single-slider -->
                                <div class="main-slider-paginations"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.html"><img src="upload/reebok.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.html">Reebok <br> Blue </a></h6>
                                        <p> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.html"><img src="upload/nike.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.html">Nike <br>Air Force 1 </a></h6>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="product-details.html"><img src="upload/compas.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="product-details.html">Compas <br> Grey</a></h6>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="banner__item p-relative w-img mb-30">
                                    <div class="banner__img b-radius-2">
                                        <a href="dashboard.php?module=product&id_sepatu=<?php echo $kat['ID_SEPATU']; ?>"><img src="upload/adidas.jpg" alt=""></a>
                                    </div>
                                    <div class="banner__content banner__content-2">
                                        <h6><a href="dashboard.php?module=product&id_sepatu=<?php echo $kat['ID_SEPATU']; ?>">Adidas <br> Black Navy</a></h6>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-area-end -->

        <!-- trending-product-area-start -->
        <section class="trending-product-area light-bg-s pt-25 pb-15">
            <div class="container custom-conatiner">
           

<tr>
                                       
                                           
                                        </tr>
                                      
                                        
                <div class="row">

                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h5 class="st-titile"> </h5>
                            </div>
                            <div class="button-wrap button-wrap-2">
                                <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                <?php

                include "lib/koneksi.php";

                $kueripelanggan = mysqli_query($con, "SELECT * FROM barang");
                while ($kat = mysqli_fetch_array($kueripelanggan)) {
                    $merk = $kat['ID_SEPATU'];
                ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                        <div class="product__item product__item-2 b-radius-2 mb-20">
                            <div class="product__thumb fix">
                                <div class="product-image w-img">
                                    <a href="product-details.html">
                                        <img src="upload/reebok.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="product__offer">
                              <!-- <span class="discount">-15%</span> -->
                                </div>
                                <div class="product-action product-action-2">
                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                        <i class="fal fa-eye"></i>
                                        <i class="fal fa-eye"></i>
                                    </a>
                                    <a href="#" class="icon-box icon-box-1">
                                        <i class="fal fa-heart"></i>
                                        <i class="fal fa-heart"></i>
                                    </a>
                                    <a href="#" class="icon-box icon-box-1">
                                        <i class="fal fa-layer-group"></i>
                                        <i class="fal fa-layer-group"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product__content product__content-2">
                                
                     
                                <div class="rating mb-5 mt-10">
                                    <ul>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    </ul>
                                    <span>(01 review)</span>
                                </div>
                                <div class="price">
                                    <span><?php echo $kat['MERK_SEPATU']; ?></span>
                                </div>
                            </div>
                            <div class="product__add-cart text-center">
                            <a href="dashboard.php?module=product&id_sepatu=<?php echo $kat['ID_SEPATU']; ?>">
                                <button type="button" class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                Add to Cart
                                </button></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   
                </div>
            </div>
        </section>
        <!-- trending-product-area-end -->

        <!-- banner__area-start -->
        <section class="categories__area light-bg-s pt-20 pb-10">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h5 class="st-titile">Popular Categories </h5>
                            </div>
                            <div class="button-wrap button-wrap-2">
                                <a href="dashboard.php?module=product">See All Product <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php

                include "lib/koneksi.php";

                $kueripelanggan = mysqli_query($con, "SELECT * FROM barang");
                while ($kat = mysqli_fetch_array($kueripelanggan)) {
                    $merk = $kat['MERK_SEPATU'];
                ?>
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <div class="categories__item p-relative w-img mb-30">
                            <div class="categories__img b-radius-2">
                                <a href="dashboard.php?module=product"><img src="upload/sepatu.jpg" alt=""></a>
                            </div>
                            <div class="categories__content">
                                <h6><a href="dashboard.php?module=product&id_sepatu=<?php echo $kat['ID_SEPATU']; ?>"><?php echo $kat['MERK_SEPATU']; ?></a></h6>
                                <p><?php echo $kat['ID_SEPATU']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   
                    
                </div>
            </div>
        </section>
        <!-- banner__area-end -->

        <!-- topsell__area-start -->
        <section class="topsell__area light-bg-s pt-15">
            <div class="container custom-conatiner">
               
        </section>
        <!-- topsell__area-end -->

        <!-- brand-area-start -->
        <section class="brand-area light-bg-s pb-60">
            <div class="container custom-conatiner">
                <div class="brand-slider brand-slider-2 swiper-container pt-35 pb-30">
                    <div class="swiper-wrapper">
                        <div class="brand-item w-img swiper-slide">
                            <a href="#"><img src="assets/img/brand/brand-1.jpg" alt="brand"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide">
                            <a href="#"><img src="assets/img/brand/brand-2.jpg" alt="brand"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide">
                            <a href="#"><img src="assets/img/brand/brand-3.jpg" alt="brand"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide">
                            <a href="#"><img src="assets/img/brand/brand-4.jpg" alt="brand"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide">
                            <a href="#"><img src="assets/img/brand/brand-5.jpg" alt="brand"></a>
                        </div>
                        <div class="brand-item w-img swiper-slide">
                            <a href="#"><img src="assets/img/brand/brand-6.jpg" alt="brand"></a>
                        </div>
                    </div>
                </div>
                </div>
        </section>

        <!-- brand-area-end -->

        <!-- features-2__area-start -->
        <section class="features-2__area d-ddark-bg">
            <div class="container custom-conatiner">
                <div class="features-2__lists pt-25 pb-25">
                    <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 gx-0">
                        <div class="col">
                            <div class="features-2__item">
                                <div class="features-2__icon mr-20">
                                    <i class="fal fa-truck"></i>
                                </div>
                                <div class="features-2__content">
                                    <h6>FREE DELIVERY</h6>
                                    <p>For all orders over $120</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="features-2__item">
                                <div class="features-2__icon mr-20">
                                    <i class="fal fa-money-check"></i>
                                </div>
                                <div class="features-2__content">
                                    <h6>SAFE PAYMENT</h6>
                                    <p>100% secure payment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="features-2__item">
                                <div class="features-2__icon mr-20">
                                    <i class="fal fa-comments-alt"></i>
                                </div>
                                <div class="features-2__content">
                                    <h6>24/7 HELP CENTER</h6>
                                    <p>Delicated 24/7 support</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="features-2__item">
                                <div class="features-2__icon mr-20">
                                    <i class="fal fa-hand-holding-usd"></i>
                                </div>
                                <div class="features-2__content">
                                    <h6>SHOP WITH CONFIDENCE</h6>
                                    <p>If goods have problems</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="features-2__item">
                                <div class="features-2__icon mr-20">
                                    <i class="fad fa-user-headset"></i>
                                </div>
                                <div class="features-2__content">
                                    <h6>FRIENDLY SERVICES</h6>
                                    <p>30 day satisfaction guarantee</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-2__area-end -->
        

    <!-- shop modal start -->
    <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered product__modal" role="document">
            <div class="modal-content">
                <div class="product__modal-wrapper p-relative">
                    <div class="product__modal-close p-absolute">
                        <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                    </div>
                    <div class="product__modal-inner">
                        <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-box">
                                <div class="tab-content" id="modalTabContent">
                                    <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/quick-view/quick-view-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/quick-view/quick-view-2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/quick-view/quick-view-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/quick-view/quick-view-4.jpg" alt="">
                                        </div>
                                    </div>
                                    </div>
                                <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                            <img src="assets/img/quick-view/quick-nav-1.jpg" alt="">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                        <img src="assets/img/quick-view/quick-nav-2.jpg" alt="">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                        <img src="assets/img/quick-view/quick-nav-3.jpg" alt="">
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                        <img src="assets/img/quick-view/quick-nav-4.jpg" alt="">
                                        </button>
                                    </li>
                                    </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-content">
                                <h4><a href="product-details.html">Samsung C49J89: £875, Debenhams Plus</a></h4>
                                <div class="product__review d-sm-flex">
                                    <div class="rating rating__shop mb-10 mr-30">
                                    <ul>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    </ul>
                                    </div>
                                    <div class="product__add-review mb-15">
                                    <span>01 review</span>
                                    </div>
                                </div>
                                <div class="product__price">
                                    <span>$109.00 – $307.00</span>
                                </div>
                                <div class="product__modal-des mt-20 mb-15">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                        <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                        <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage & SIM: 12GB RAM, 256GB.</a></li>
                                        <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                    </ul>
                                </div>
                                <div class="product__stock mb-20">
                                    <span class="mr-10">Availability :</span>
                                    <span>1795 in stock</span>
                                </div>
                                <div class="product__modal-form">
                                    <form action="#">
                                    <div class="pro-quan-area d-lg-flex align-items-center">
                                        <div class="product-quantity mr-20 mb-25">
                                            <div class="cart-plus-minus p-relative"><input type="text" value="1" /></div>
                                        </div>
                                        <div class="pro-cart-btn mb-25">
                                            <button class="cart-btn" type="submit">Add to cart</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="product__stock mb-30">
                                    <ul>
                                        <li><a href="#">
                                            <span class="sku mr-10">SKU:</span>
                                            <span>Samsung C49J89: £875, Debenhams Plus</span></a>
                                        </li>
                                        <li><a href="#">
                                            <span class="cat mr-10">Categories:</span>
                                            <span>iPhone, Tablets</span></a>
                                        </li>
                                        <li><a href="#">
                                            <span class="tag mr-10">Tags:</span>
                                            <span>Smartphone, Tablets</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop modal end -->

    </main>
