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
                  <div class="col-lg-4">
                      <div>
                          <div class="cw-item">
                              <h5>Kategori yang Dipilih</h5>
                              <h3><?= $pemesan['nama_kategori'] ?></h3>
                              <h3>Rp. <?= number_format($pemesan['harga'], 0, ',', '.') ?></h3>

                          </div>
                      </div>
                      <form action="<?= base_url('Customer/Pemesanan/keranjang'); ?>" class="contact-form" method="post">
                          <div class="row">
                              <div class="col-lg-12 mt-5">
                                  <label><b>Pilih Dekorasi : </b></label>
                              </div><br>
                              <div class="col-lg-12">
                                  <select type="text" name="id_dekorasi" class="form-control" placeholder="First Name">
                                      <?php foreach ($dekorasi as $d) { ?>
                                          <option value="<?= $d->id_dekorasi ?>"><?= $d->nama_dekorasi ?> (Rp. <?= number_format($d->harga_dekorasi, 0, ',', '.')  ?>)</option>
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
                                          <option value="<?= $s->id_sesi ?>"><?= $s->jumlah_sesi ?> Kali (Rp.<?= number_format($s->harga_sesi, 0, ',', '.')  ?>)</option>
                                      <?php  } ?>
                                  </select>
                              </div>
                              <div class="col-lg-12" style="margin-top: 15px;">
                                  <label><b>Pilih Jadwal :</b> </label>
                              </div><br>
                              <div class=" row col-lg-12">
                                  <div class="col-md-6">
                                      <input type="date" name="tanggal" class="form-control" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="time" name="waktu" class="form-control" required>
                                  </div>
                              </div>
                              <button class="button" type="submit">Order</button>
                          </div>
                      </form>

                  </div>
                  <div class="col-lg-8 ">

                      <?php echo $this->session->flashdata('gagal'); ?>
                      <div class="row">
                          <button class="button btn-success form-control col-md-2" style="font-size:12px; margin-right:10px;" id="tombol_show">Lihat Jadwal</button>
                          <button class="button btn-danger form-control col-md-2" style="font-size:12px;" id="tombol_hide">Tutup Jadwal</button>
                      </div>
                      <div id="box" class="col-md-12 ">
                          <input type="date" style="float: right;" class="form-control col-md-4" id="sel_bulan">
                          <!-- <label style="float: right;"><b>Jadwal Pemesan</b></label> -->
                          <div class="table-responsive">
                              <table class="table table-bordered" style="width: 500px;" id='userTable'>
                                  <thead>
                                      <tr>
                                          <th>
                                              #Id Cus
                                          </th>
                                          <th>
                                              Nama Pelanggan
                                          </th>
                                          <th>
                                              Tanggal Pemesan
                                          </th>
                                          <th>
                                              Mulai
                                          </th>
                                          <th>
                                              Seelesai
                                          </th>

                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                              </table>
                          </div>
                          <hr>
                      </div>
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
      <script type="text/javascript">
          $(document).ready(function() {
              var userDataTable = $('#userTable').DataTable({
                  //   'processing': true,
                  'serverSide': true,
                  'serverMethod': 'post',
                  //'searching': false, // Remove default Search Control
                  'ajax': {
                      'url': '<?= base_url() ?>Customer/Pemesanan/jadwalList',
                      'data': function(data) {
                          data.searchBulan = $('#sel_bulan').val();
                          console.log(data);
                      }

                  },
                  'columns': [{
                          data: 'id_cus'
                      },
                      {
                          data: 'nama_cus'
                      },
                      {
                          data: 'tgl_pemesanan'
                      },
                      {
                          data: 'waktu_pemesanan'
                      },
                      {
                          data: 'waktu_selesai'
                      }
                  ]
              });

              $('#sel_bulan').change(function() {
                  userDataTable.draw();
              });
              $('#searchName').keyup(function() {
                  userDataTable.draw();
              });
          });
      </script>
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