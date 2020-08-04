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
        <?php $this->load->view('templates/navbar'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <?= $waktu; ?>
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
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <a style="float: right;" class="btn btn-cyan" data-toggle="modal" href="" data-target="#modalJurnal<?= $total->total ?>">+ Jurnal</a>
                            <div style="height: 200px;" class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fa fa-credit-card m-b-5 font-24"></i></h1>
                                <h6 class="text-white">Total Pendapatan</h6>
                                <h2 class="text-white">Rp. <?= number_format($total->total)  ?></h2>
                                <p style="color: white;">Sampai tanggal <?= formatHariTanggal(date('d-m-Y')) ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <a style="float: right;" class="btn btn-warning" href="<?= base_url() ?>Admin/Beranda/pemesanan">+ Pelanggan</a>
                            <div style="height: 200px;" class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-cart-plus m-b-5 font-24"></i></h1>
                                <h6 class="text-white">Total Pesanan</h6>
                                <h2 class="text-white"><?= $status->total ?></h2>
                                <p style="color: white;">Sampai tanggal <?= formatHariTanggal(date('d-m-Y')) ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <button style="float: right;" class="btn btn-success" data-toggle="modal" data-target="#modalKeluar">+ Pengeluaran</button>
                            <div style="height: 200px;" class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fa fa-tag m-b-5 font-24"></i></h1>
                                <h6 class="text-white">Total Pengeluaran</h6>
                                <h2 class="text-white">Rp. <?= number_format($keluar->total)  ?></h2>
                                <p style="color: white;">Sampai tanggal <?= formatHariTanggal(date('d-m-Y')) ?></p>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div style="height: 235px;" class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fa fa-microchip m-b-5 font-24"></i></h1>
                                <h6 class="text-white">Kas</h6>
                                <h2 class="text-white">Rp.<?= number_format($adm->total, 0, ',', '.')  ?></h2>
                                <p style="color: white;">Sampai tanggal <?= formatHariTanggal(date('d-m-Y')) ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="height: 200px;">

                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-3">
                                        <div class="row">

                                        </div>
                                    </div>
                                    <!-- column -->
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

                <div class="modal fade" id="modalJurnal<?= $total->total ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Jurnal Pendapatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= base_url() ?>Admin/Laporan/tambahJurnal2">
                                <div class="modal-body">
                                    <div class="col-md-12 row">
                                        <div class="col-md-6 ">
                                            <label>Saldo</label>
                                            <input name="saldo" value="<?= $total->total ?>" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl_transaksi" type="date" value="" required>
                                        </div>
                                    </div>
                                    <div class=" col-md-12 row">
                                        <div class="col-md-6 ">
                                            <label>Jenis Saldo</label>
                                            <select class="form-control" name="jenis_saldo" id="akun" required>
                                                <option>--Jenis Saldo--</option>
                                                <?php
                                                $data =  $this->db->get('jenis_saldo')->result();
                                                foreach ($data as $d) {
                                                ?>
                                                    <option value="<?= $d->id_jenis ?>"> <?= $d->nama_saldo ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="no_reff">Nama Akun</label>
                                            <select id="jenis_saldo" class="form-control" name="no_reff" required>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
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
    <script src="<?= base_url() ?>vendor/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>vendor/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>vendor/admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>vendor/admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>vendor/admin/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url() ?>vendor/admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url() ?>vendor/admin/dist/js/pages/chart/chart-page-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#akun').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Admin/Laporan/getJenis'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].no_reff + '>' + data[i].nama_reff + '</option>';
                        }
                        $('#jenis_saldo').html(html);

                    }
                });
                return false;
            });

        });
    </script>

</body>

</html>