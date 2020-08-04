<?php $this->load->view('templates/header');
?>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

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
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h2 style="color: #1E7BCB;"> Semua Neraca Saldo</h2><br>
                                <?php echo $this->session->flashdata('sukses'); ?>
                                <div class="col-md-12 row">
                                    <!-- <form class="col-md-4" action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                                        <div class="">
                                            <select class="form-control" name="nama_suplier" id="sel_reff">
                                                <?php
                                                $this->db->group_by('akun.no_reff');
                                                $this->db->join('transaksi', 'transaksi.no_reff=akun.no_reff', 'right');
                                                $data = $this->db->get('akun')->result();
                                                foreach ($data as $j) {

                                                ?>
                                                    <option value="<?= $j->no_reff ?>"> <?= $j->nama_reff ?> </option><?php } ?>
                                            </select>
                                        </div>
                                    </form> -->
                                </div>


                                <div class="form-group col-md-12">
                                    <!-- Name -->
                                    <div class="col-md-2 ">
                                        <h4></h4><br>

                                    </div>
                                </div><br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id='userTable'>
                                        <thead>
                                            <tr>
                                                <th>
                                                    No Reff
                                                </th>
                                                <th>
                                                    Keterangan
                                                </th>
                                                <th>
                                                    Debit
                                                </th>
                                                <th>
                                                    Kredit
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($jurnal as $j) {
                                            ?>
                                                <tr>
                                                    <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                                    <td><?= $j->nama_reff ?></td>
                                                    <?php
                                                    if ($j->jenis_saldo == '1') {
                                                    ?>
                                                        <td><?= $j->saldo ?></td>
                                                        <td> 0</td>
                                                    <?php } else { ?>
                                                        <td> 0</td>
                                                        <td><?= $j->saldo ?></td>
                                                    <?php } ?>
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
    <!-- Script -->

</body>

</html>