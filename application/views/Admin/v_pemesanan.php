<?php $this->load->view('templates/header');
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        $this->load->view('templates/navbar');
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Pemesanan</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-header" style="background:#2980b9; color:#fff;">List Pemesanan</h5><br>





                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>No</b></th>
                                                <th><b>Nama Cus</b></th>
                                                <th><b>Nama Kategori</b></th>
                                                <th><b>jenis</b></th>
                                                <th><b>Total Biaya</b></th>
                                                <th><b>Dp</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Aksi</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pemesanan as $k) { ?>

                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $k->nama_cus ?></td>
                                                    <td><?= $k->nama_kategori ?></td>
                                                    <td><?= $k->jenis ?></td>
                                                    <td><?= $k->total_biaya ?></td>
                                                    <td><?php if ($k->opsi == 'DP') {
                                                            echo $k->dp;
                                                        } else {
                                                            echo $k->opsi;
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        if ($k->status_cus == 'Sudah Checkout') {
                                                            if ($k->opsi == 'DP') {
                                                                echo '<a onclick="return confirm_alert(this);" href="' . base_url('Admin/Beranda/statusDP/' . $k->id_pemesanan) . '"><button type="button" class="btn btn-info">' . $k->status_cus . '</button></a>';
                                                            } else  if ($k->opsi == 'Lunas') {
                                                                echo '<a onclick="return confirm_alert(this);" href="' . base_url('Admin/Beranda/statusSelesai/' . $k->id_pemesanan) . '"><button type="button" class="btn btn-info">' . $k->status_cus . '</button></a>';
                                                            } else {
                                                                echo '<a onclick="return confirm_alert(this);" href="' . base_url('Admin/Beranda/statusSelesai/' . $k->id_pemesanan) . '"><button type="button" class="btn btn-info">' . $k->status_cus . '</button></a>';
                                                            }
                                                        } else if ($k->status_cus == 'DP Terbayar') {
                                                            echo '<a onclick="return confirm_alert(this);" href="' . base_url('Admin/Beranda/statusSelesai/' . $k->id_pemesanan) . '"><button type="button" class="btn btn-warning">' . $k->status_cus . '</button></a>';
                                                        } else {
                                                            echo '<button type="button" class="btn btn-success">' . $k->status_cus . '</button>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="<?= base_url('Admin/Beranda/detail_transaksi/'.$k->id_pemesanan); ?>" class="btn btn-warning">Detail Transaksi</a><br>
                                                        <button style="margin-left: 10px; margin-top: 5px;" data-toggle="modal" data-target="#modal-edit<?= $k->id_pemesanan; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" class="btn btn-info">Bukti Bayar</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url() ?>Admin/Pengeluaran/tambah" method="post">
                                <div class="modal-body">

                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <label>Jenis Pengeluaran</label>
                                            <select name="id_jenis_pengeluaran" class="form-control" required>
                                                <?php
                                                $data = $this->db->get('jenis_pengeluaran')->result();
                                                foreach ($data as $d) {
                                                ?>
                                                    <option value="<?= $d->id_jenis_pengeluaran ?>"><?= $d->jenis_pengeluaran ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Kebutuhan</label>
                                            <input name="nama_pengeluaran" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Deskripsikan</label>
                                        <textarea name="deskripsi_pengeluaran" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Biaya</label>
                                        <input name="biaya_pengeluaran" class="form-control" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Tanggal</label>
                                        <input type="date" name="tgl_pengeluaran" class="form-control" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Tambah</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <?php foreach ($pemesanan as $row) : ?>
    <div class="row">
      <div id="modal-edit<?= $row->id_pemesanan; ?>" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle"> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">


              <div class="form-group row">
                <label for="fname" class="col-sm-4  control-label col-form-label">Tanggal Checkout</label>
                <div class="col-sm-8">
                  <h5><?php echo $row->tgl_checkout  ?></h5>
                </div>
              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-4  control-label col-form-label">Total Bayar</label>
                <div class="col-sm-8">
                  <?php echo $row->total_bayar  ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-4  control-label col-form-label">DP</label>
                <div class="col-sm-8">
                <?php if ($row->opsi == 'DP') { ?>
                    <?php echo $row->dp  ?>
                  <?php } else { ?>
                    LUNAS
                  <?php } ?>
                </div>


              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-4  control-label col-form-label">Bukti Transfer</label>
                <div class="col-sm-8">

                    <img width="200px" height="200px" src="<?= base_url('assets/' . $row->bukti_transfer) ?>">
                  
                </div>


              </div>

            </div>
            <div class="modal-footer">
            </div>

          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Dekorasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('Admin/Dekorasi/tambahDekorasi'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-4  control-label col-form-label">Nama Dekorasi</label>
                                    <div class="col-sm-8">
                                        <input type="text" style="border-radius: 10px;" name="nama_dekorasi" class="form-control" id="username" placeholder="Nama Kategori" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-4  control-label col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="number" style="border-radius: 10px;" name="harga_dekorasi" class="form-control" id="password" placeholder="Harga" required>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                COPYRIGHT © BIKEA TECHNOCRAFT 2019
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Apakah anda yakin ingin mengganti status ?");
        }
    </script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>vendor/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>vendor/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>vendor/admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>vendor/admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>vendor/admin/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="<?= base_url() ?>vendor/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>