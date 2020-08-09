  <!-- Page Add Section Begin -->
  <?php $this->load->view('element/head') ?>

  <body>
      <?php $this->load->view('element/header') ?>
      <section class="page-add">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4">
                      <div class="page-breadcrumb">
                          <h2> All Kategori<span>.</span></h2>
                          <a href="#">Home</a>
                          <a href="#">Dresses</a>
                          <a class="active" href="#">Night Dresses</a>
                      </div>
                  </div>
                  <div class="col-lg-8">
                      <img src="img/add.jpg" alt="">
                  </div>
              </div>
          </div>
      </section>
      <!-- Page Add Section End -->

      <!-- Product Page Section Beign -->
      <section class="product-page">
      <?php foreach($kategori as $k) { ?>
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="product-slider owl-carousel">
                          <div class="product-img">
                          <?php 
                          $galeri = $this->db->query("SELECT * FROM galeri WHERE id_kategori='$k->id_kategori' LIMIT 1")->result();
                          foreach ($galeri as $g ) {
                          ?>

                              <figure>
                                  <img width="300px" height="250px" src="<?= base_url() ?>assets/studio/img/<?= $g->foto; ?>" alt="">
                                  <div class="p-status">new</div>
                              </figure>
                          <?php } ?>
                          </div>
                          <!-- <div class="product-img">
                              <figure>
                                  <img src="img/product/product-1.jpg" alt="">
                                  <div class="p-status">new</div>
                              </figure>
                          </div> -->
                      </div>

                  </div>
                  <div class="col-lg-6">
                      <div class="product-content">
                          <h2><?= $k->nama_kategori ?></h2>
                          <div class="pc-meta">
                              <h5>Rp.<?= number_format($k->harga, 0, ',', '.')  ?></h5>
                          </div>
                          <p><?= $k->deskripsi ?>.</p>
                          <ul class="tags">
                              <li><span>Kategori :</span> <?= $k->nama_kategori ?></li>
                              <li><span>Tags :</span> man, shirt, dotted, elegant, cool</li>
                          </ul>
                          <a href="<?= base_url('Customer/Pemesanan/pemesanan/' . $k->id_kategori) ?>" class="primary-btn pc-btn">Order Sekarang</a>

                      </div>
                  </div>
              </div>
          </div>
      <?php } ?>
      </section>
      <!-- Product Page Section End -->

      <!-- Related Product Section Begin -->
      <section class="related-product spad">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <div class="section-title">
                          <h2>Galeri All</h2>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <?php foreach ($galeri1 as $i) { ?>
                      <div class="col-lg-3 col-sm-6">
                          <div class="single-product-item">
                              <figure>
                                  <a href="<?= base_url() ?>assets/studio/img/<?= $i->foto ?>"><img src="<?= base_url() ?>assets/studio/img/<?= $i->foto ?>" alt=""></a>
                                  <div class="p-status"><?= $i->nama_kategori ?></div>
                              </figure>
                          </div>
                      </div>
                  <?php } ?>
              </div>
          </div>
      </section>
      <?php $this->load->view('element/footer') ?>
  </body>

  </html>