  <!-- Page Add Section Begin -->
  <?php $this->load->view('element/head') ?>

  <body>
      <?php $this->load->view('element/header') ?>
      <section class="page-add">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4">
                      <div class="page-breadcrumb">
                          <h2>Order Sekarang</h2>
                      </div>
                  </div>
                  <div class="col-lg-8">
                      <img src="img/add.jpg" alt="">
                  </div>
              </div>
          </div>
      </section>
      <!-- Page Add Section End -->

      <!-- Contact Section Begin -->
      <div class="contact-section">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8">
                      <?php echo $this->session->flashdata('gagal'); ?>
                      <button class="button btn-success form-control col-md-2" style="font-size:12px;" id="tombol_show">Lihat Jadwal</button>
                      <div id="box" class="col-md-12">

                          <label style="float: right;"><b>Jadwal Pemesan</b></label>

                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Nama Pemesan</th>
                                      <th>Jadwal</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Azi</td>
                                      <td>Azi</td>
                                  </tr>
                              </tbody>
                          </table>
                          <hr>
                      </div>
                      <form action="<?= base_url() ?>Customer/Pemesanan/keranjang" class="contact-form" method="post">
                          <div class="row">
                              <div class="col-lg-12">
                                  <label><b>Pilih Dekorasi : </b></label>
                              </div><br>
                              <div class="col-lg-12">
                                  <select type="text" name="id_dekorasi" class="form-control" placeholder="First Name">
                                      <?php foreach ($dekorasi as $d) { ?>
                                          <option value="<?= $d->id_dekorasi ?>"><?= $d->nama_dekorasi ?> (Rp. <?= number_format($d->harga, 0, ',', '.')  ?>)</option>
                                      <?php } ?>
                                  </select>
                              </div>
                              <div class="col-lg-12" style="margin-top: 15px;">
                                  <label><b>Pilih Tempat :</b> </label>
                              </div><br>
                              <div class="col-lg-12">
                                  <select id="tempat" name="jenis" type="text" class="form-control" placeholder="First Name">
                                      <option value="Studio">Studio</option>
                                      <option value="Tempat Lain">Tempat lain</option>
                                  </select>
                              </div>
                              <div id="lain" hidden class="col-lg-12" style="margin-top: 15px;">
                                  <label><b>Masukkan Alamat Lengkap :</b> </label>
                                  <textarea class="form-control" style="height: 50px;" name="lokasi"></textarea>
                              </div><br>
                              <input name="id_kategori" value="<?= $pemesan['id_kategori'] ?>" hidden>
                              <div class="col-lg-12" style="margin-top: 15px;">
                                  <label><b>Pilih Sesi :</b> </label>
                              </div><br>
                              <div class="col-lg-12">
                                  <select id="tempat" name="id_sesi" type="text" class="form-control" placeholder="First Name">
                                      <?php foreach ($sesi as $s) { ?>
                                          <option value="<?= $s->id_sesi ?>"><?= $s->jumlah_sesi ?> Kali (Rp.<?= number_format($s->harga, 0, ',', '.')  ?>)</option>
                                      <?php  } ?>
                                  </select>
                              </div>
                              <div class="col-lg-12" style="margin-top: 15px;">
                                  <label><b>Pilih Jadwal :</b> </label>
                              </div><br>
                              <div class=" row col-lg-12">
                                  <div class="col-md-6">
                                      <input type="date" name="tanggal" class="form-control">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="time" name="waktu" class="form-control">
                                  </div>
                              </div>

                              <button>Order</button>

                          </div>
                      </form>

                  </div>
                  <div class="col-lg-3 offset-lg-1">
                      <div class="contact-widget">
                          <div class="cw-item">
                              <h5>Kategori yang Dipilih</h5>
                              <ul>
                                  <li><?= $pemesan['nama_kategori'] ?></li>
                                  <li>Rp. <?= number_format($pemesan['harga'], 0, ',', '.') ?></li>
                              </ul>
                          </div>
                          <div class="cw-item">
                              <h5>Phone</h5>
                              <ul>
                                  <li>+1 (603)535-4592</li>
                                  <li>+1 (603)535-4556</li>
                              </ul>
                          </div>
                          <div class="cw-item">
                              <h5>E-mail</h5>
                              <ul>
                                  <li>contact@violetstore.com</li>
                                  <li>www.violetstore.com</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="modalRemove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus ?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Hapus barang dari keranjang?
                  </div>
                  <div class="modal-footer">
                      <a type="button" class="btn btn-danger" href="<?= base_url('Customer/Produk/hapus_produk/' . $k->id_pemesanan) ?>">Hapus</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                  </div>
              </div>
          </div>
      </div>
      <!-- Contact Section End --> <?php $this->load->view('element/footer') ?>
      <script>
          $(document).ready(function() {


              $("#box").hide();

              $("#tombol_hide").click(function() {
                  $("#box").hide(1000);
              })

              $("#tombol_show").click(function() {
                  $("#box").show(1000);
              })

          });
      </script>
      <style>
          /* #box {
              width: 300px;
              height: 80px;
              background-color: pink;
              border: 2px solid black;
          } */
      </style>
      <script type='text/javascript'>
          $(window).load(function() {
              $("#tempat").change(function() {
                  console.log($("#tempat option:selected").val());
                  if ($("#tempat option:selected").val() == 'Studio') {
                      $('#lain').prop('hidden', 'true');
                  } else {
                      $('#lain').prop('hidden', false);
                  }
              });
          });
      </script>
  </body>

  </html>