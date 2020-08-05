<?php $this->load->view('element/head') ?>

<body>
    <?php $this->load->view('element/header') ?>
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-item">
                        <img src="<?= base_url() ?>assets/studio/img/icons/delivery.png" alt="">
                        <p>Pengambilan gambar yang memuaskan</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="<?= base_url() ?>assets/studio/img/icons/voucher.png" alt="">
                        <p>Pelayanan yang ramah</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-xl-right">
                    <div class="header-item">
                        <img src="<?= base_url() ?>assets/studio/img/icons/sales.png" alt="">
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
            <div class="single-slider-item set-bg" data-setbg="<?= base_url() ?>assets/studio/img/img-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Studio</h1>
                            <h2>Foto</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="<?= base_url() ?>assets/studio/img/img-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Studio</h1>
                            <h2>Foto</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider-item set-bg" data-setbg="<?= base_url() ?>assets/studio/img/img-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Studio</h1>
                            <h2>Foto</h2>
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
                            Abadikan momenmu bersana kami
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                <?php foreach ($galeri as $g) { ?>
                    <div class="col-lg-3 col-sm-6 mix all dresses bags">
                        <div class="single-product-item">
                            <figure>
                                <a href="#"><img src="<?php echo base_url('./assets/studio/img/' . $g->foto); ?>" alt=""></a>
                                <div class="p-status"><?= $g->nama_kategori ?></div>
                            </figure>
                            <div class="product-text">
                                <h6><?= word_limiter($g->deskripsi, 10) ?></h6>
                                <p>Rp.<?= number_format($g->harga, 0, ',', '.')  ?></p>
                            </div>
                            <div>
                                <a href="<?= base_url('Customer/Kategori/detail_kategori/' . $g->id_kategori) ?>" style="color: red; font-size:12px; float:right">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                        <img src="<?= base_url() ?>assets/studio/img/lookbok.jpg" alt="">
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
                <img src="<?= base_url() ?>assets/studio/img/logos/logo-1.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>assets/studio/img/logos/logo-2.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>assets/studio/img/logos/logo-3.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>assets/studio/img/logos/logo-4.png" alt="">
            </div>
            <div class="logo-item">
                <img src="<?= base_url() ?>assets/studio/img/logos/logo-5.png" alt="">
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $c->nama_cus ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Logo Section End -->
    <?php $this->load->view('element/footer') ?>
</body>

</html>