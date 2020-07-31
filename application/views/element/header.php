  <!-- Page Preloder
  <div id="preloder">
      <div class="loader"></div>
  </div> -->

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
                  <a href="./index.html"><img src="<?= base_url() ?>vendor/studio/img/logo.png" alt=""></a>
              </div>
              <div class="header-right">
                  <img src="<?= base_url() ?>vendor/studio/img/icons/search.png" alt="" class="search-trigger">
                  <img src="<?= base_url() ?>vendor/studio/img/icons/man.png" alt="">
                  <a href="#">
                      <img src="<?= base_url() ?>vendor/studio/img/icons/bag.png" alt="">
                      <span>2</span>
                  </a>
              </div>
              <div class="user-access">
                  <a href="#">Register</a>
                  <a href="#" class="in">Sign in</a>
              </div>
              <nav class="main-menu mobile-menu">
                  <ul>
                      <li><a class="active" href="./index.html">Beranda</a></li>
                      <li><a href="./categories.html">Kategori Foto</a>
                          <ul class="sub-menu">
                              <?php $data = $this->db->get('kategori')->result();
                                foreach ($data as $k) {
                                ?>
                                  <li><a href="product-page.html"><?= $k->nama_kategori ?></a></li>
                              <?php } ?>
                          </ul>
                      </li>
                      <li><a href="./product-page.html">About</a></li>
                      <li><a href="./check-out.html">Blog</a></li>
                      <li><a href="./contact.html">Contact</a></li>
                  </ul>
              </nav>
          </div>
      </div>
  </header>