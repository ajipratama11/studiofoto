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
                  <a href="<?= base_url('Customer/Keranjang/') ?>">
                      <img src="<?= base_url() ?>vendor/studio/img/icons/bag.png" alt="">
                      <span>
                          <?php
                            $id_cus = $this->session->userdata('id_cus');
                            $this->db->select('COUNT(id_pemesanan) as total');
                            $this->db->where('id_cus ', $id_cus);
                            $this->db->where('status_cus != ', 'Pesanan Selesai');
                            $total = $this->db->get('pemesanan')->row();
                            ?>
                          <?= $total->total ?>
                      </span>
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
                      <li><a>Kategori Foto</a>
                          <ul class="sub-menu">
                              <?php $data = $this->db->get('kategori')->result();
                                foreach ($data as $k) {
                                ?>
                                  <li><a href="<?= base_url('Customer/Kategori/detail_kategori/' . $k->id_kategori) ?>"><?= $k->nama_kategori ?></a></li>
                              <?php } ?>
                          </ul>
                      </li>
                      <li><a href="./categories.html">Dekorasi</a>
                          <ul class="sub-menu">
                              <?php $data = $this->db->get('dekorasi')->result();
                                foreach ($data as $k) {
                                ?>
                                  <li><a href="" data-toggle="modal" data-target="#modalDetail<?= $k->id_dekorasi ?>"><?= $k->nama_dekorasi ?></a></li>
                              <?php } ?>
                          </ul>
                      </li>
                      <li><a href="<?= base_url() ?>Customer/Login/logout">Logout </a> </li>
                  </ul>
              </nav>
          </div>
          <?php
            $data = $this->db->get('dekorasi')->result();
            foreach ($data as $k) {
            ?>
              <div class="modal fade" id="modalDetail<?= $k->id_dekorasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Dekorasi <?= $k->nama_dekorasi ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              Harga <?= $k->harga_dekorasi ?>
                          </div>
                          <div class="modal-footer">
                              <a type="button" class="btn btn-danger" href="">Hapus</a>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                          </div>
                      </div>
                  </div>
              </div>
          <?php } ?>
      </div>
  </header>