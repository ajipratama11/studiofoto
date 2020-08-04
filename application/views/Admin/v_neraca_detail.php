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
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h2 style="color: #1E7BCB;"> Neraca Saldo</h2><br>
                                <?php echo $this->session->flashdata('sukses'); ?>
                                <form action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                                    <div class="row">
                                    </div>
                                </form>
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
                                                    No Akun
                                                </th>
                                                <th>
                                                    Nama Akun
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
                                                    <td><?= $j->no_reff ?></td>
                                                    <td><?= $j->nama_reff ?></td>
                                                    <?php
                                                    if ($j->jenis_saldo == '1') {
                                                    ?>
                                                        <td><?= number_format($j->total) ?></td>
                                                        <td> - </td>
                                                    <?php } else { ?>
                                                        <td> - </td>
                                                        <td><?= number_format($j->total) ?></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                                <td><b>
                                                        Rp. <?= number_format($debit->total)  ?>
                                                </td> </b>

                                                <td><b>
                                                        Rp. <?= number_format($kredit->total)  ?>
                                                </td> </b>
                                            </tr>
                                            <tr>
                                                <?php
                                                if ($debit->total != $kredit->total) {
                                                ?>
                                                    <td colspan="4" style="background-color: red; color:aliceblue" class="text-center"><b>TIDAK SEIMBANG</b></td>
                                                <?php } else { ?>
                                                    <td colspan="4" style="background-color: #1E7BCB;color:aliceblue" class="text-center"><b>SEIMBANG</b></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
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