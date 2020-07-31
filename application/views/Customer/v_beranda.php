<?php $this->load->view('element/head') ?>

<body>
    <?php $this->load->view('element/header') ?>
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="<?= base_url() ?>vendor/studio/img/icons/delivery.png" alt="">
                        <p>Pengambilan gambar yang memuaskan</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="<?= base_url() ?>vendor/studio/img/icons/voucher.png" alt="">
                        <p>Pelayanan yang ramah</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                        <img src="<?= base_url() ?>vendor/studio/img/icons/sales.png" alt="">
                        <p>Bisa booking tanpa harus datang ke studio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <!-- Header End -->

    <!-- Hero Slider Begin -->
    <section class="hero-slider">
        <div class="hero-items owl-carousel">
            <div class="single-slider-item set-bg" data-setbg="<?= base_url() ?>vendor/studio/img/img-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Studio</h1>
                            <h2>Foto.</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="<?= base_url() ?>vendor/studio/img/img-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Studio</h1>
                            <h2>Foto.</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="<?= base_url() ?>vendor/studio/img/img-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Studio</h1>
                            <h2>Foto.</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->



    <!-- Latest Product Begin -->
    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Galeri Foto</h2>
                        </div>
                        <ul class="product-controls">
                            <li data-filter="*">All</li>
                            <li data-filter=".dresses">Dresses</li>
                            <li data-filter=".bags">Bags</li>
                            <li data-filter=".shoes">Shoes</li>
                            <li data-filter=".accesories">Accesories</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-1.jpg" alt=""></a>
                            <div class="p-status">new</div>
                        </figure>
                        <div class="product-text">
                            <h6>Green Dress with details</h6>
                            <p>$22.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-2.jpg" alt=""></a>
                            <div class="p-status sale">sale</div>
                        </figure>
                        <div class="product-text">
                            <h6>Yellow Maxi Dress</h6>
                            <p>$25.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all shoes accesories">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-3.jpg" alt=""></a>
                            <div class="p-status">new</div>
                        </figure>
                        <div class="product-text">
                            <h6>One piece bodysuit</h6>
                            <p>$19.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all shoes accesories">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-4.jpg" alt=""></a>
                            <div class="p-status popular">popular</div>
                        </figure>
                        <div class="product-text">
                            <h6>Blue Dress with details</h6>
                            <p>$35.50</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all dresses shoes">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-5.jpg" alt=""></a>
                            <div class="p-status">new</div>
                        </figure>
                        <div class="product-text">
                            <h6>Green Dress with details</h6>
                            <p>$22.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all accesories bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-6.jpg" alt=""></a>
                            <div class="p-status sale">sale</div>
                        </figure>
                        <div class="product-text">
                            <h6>Yellow Maxi Dress</h6>
                            <p>$25.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-7.jpg" alt=""></a>
                        </figure>
                        <div class="product-text">
                            <h6>One piece bodysuit</h6>
                            <p>$19.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mix all accesories bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="#"><img src="<?= base_url() ?>vendor/studio/img/products/img-8.jpg" alt=""></a>
                            <div class="p-status popular">popular</div>
                        </figure>
                        <div class="product-text">
                            <h6>Blue Dress with details</h6>
                            <p>$35.50</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product End -->

    <!-- Lookbok Section Begin -->
    <section class="lookbok-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 offset-lg-1">
                    <div class="lookbok-left">
                        <div class="section-title">
                            <h2>2019 <br />#lookbook</h2>
                        </div>
                        <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vestibulum malesuada
                            aliquet libero viverra cursus. Aliquam erat volutpat. Morbi id dictum quam, ut commodo
                            lorem. In at nisi nec arcu porttitor aliquet vitae at dui. Sed sollicitudin nulla non leo
                            viverra scelerisque. Phasellus facilisis lobortis metus, sit amet viverra lectus finibus ac.
                            Aenean non felis dapibus, placerat libero auctor, ornare ante. Morbi quis ex eleifend,
                            sodales nulla vitae, scelerisque ante. Nunc id vulputate dui. Suspendisse consectetur rutrum
                            metus nec scelerisque. s</p>
                        <a href="#" class="primary-btn look-btn">See More</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="lookbok-pic">
                        <img src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt="">
                        <div class="pic-text">fashion</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lookbok Section End -->

    <!-- Logo Section Begin -->
    <div class="logo-section spad">
        <div class="logo-items owl-carousel">
            <div class="logo-item">
                <img src="<?= base_url() ?>vendor/studio/img/logos/logo-1.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>vendor/studio/img/logos/logo-2.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>vendor/studio/img/logos/logo-3.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>vendor/studio/img/logos/logo-4.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>vendor/studio/img/logos/logo-5.png" alt="">
            </div>
        </div>
    </div>
    <!-- Logo Section End -->
    <?php $this->load->view('element/footer') ?>
</body>

</html>