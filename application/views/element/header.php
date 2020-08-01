  <!-- Page Preloder -->
  <div id="preloder">
      <div class="loader"></div>
  </div>

  <!-- Search model -->
  <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-switch">+</div>
          <form class="search-model-form">
              <input type="text" id="search-input" placeholder="Search here.....">
          </form>
      </div>
  </div>
  <!-- Search model end -->

  <!-- Header Section Begin -->
  <header class="header-section">
      <div class="container-fluid">
          <div class="inner-header">
              <div class="logo">
                  <a href="./index.html"><img style="width: 150px;height:60px;" src="<?= base_url() ?>assets/studio/img/logo2.png" alt=""></a>
              </div>
              <div class="header-right">
                  <img src="<?= base_url() ?>vendor/studio/img/icons/search.png" alt="" class="search-trigger">
                  <img src="<?= base_url() ?>vendor/studio/img/icons/man.png" alt="">
                  <a href="<?= base_url('Customer/Keranjang/') ?>">
                      <img src="<?= base_url() ?>vendor/studio/img/icons/bag.png" alt="">
                      <span>2</span>
                  </a>
              </div>
              <div class="user-access">
                  <?php
                    $id = $this->session->userdata('id_cus');
                    if (!$id) { ?>
                      <a href="#">Register</a>
                      <a href="<?= base_url('Customer/Login') ?>" class="in">Sign in</a>
                  <?php } else { ?>

                      <a href="#" hidden>Register</a>
                      <a href="<?= base_url('Customer/Login') ?>" hidden class="in">Sign in</a>
                  <?php } ?>
              </div>
              <nav class="main-menu mobile-menu">
                  <ul>
                      <li><a class="active" href="<?= base_url() ?>Customer/Beranda">Beranda</a></li>
                      <li><a href="./categories.html">Kategori Foto</a>
                          <ul class="sub-menu">
                              <?php $data = $this->db->get('kategori')->result();
                                foreach ($data as $k) {
                                ?>
                                  <li><a href="<?= base_url('Customer/Kategori/detail_kategori/' . $k->id_kategori) ?>"><?= $k->nama_kategori ?></a></li>
                              <?php } ?>
                          </ul>
                      </li>
                      <li><a href=" ./check-out.html">Blog </a> </li>
                      <li><a href="./contact.html">Contact</a></li>
                  </ul>
              </nav>
          </div>
      </div>
  </header>