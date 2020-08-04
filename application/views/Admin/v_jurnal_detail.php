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
                                <h2 style="color: #1E7BCB;"> Jurnal Umum</h2><br>
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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Tanggal
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
                                                <th>
                                                    Aksi
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
                                                    <td><button data-toggle="modal" data-target="#modalEdit<?= $j->id_transaksi ?>" class="btn btn-info">Edit</button>
                                                        <button data-toggle="modal" data-target="#modalHapus<?= $j->id_transaksi ?>" class="btn btn-danger">Hapus</button>
                                                    </td>
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
                                                    <td colspan="5" style="background-color: red; color:aliceblue" class="text-center"><b>TIDAK SEIMBANG</b></td>
                                                <?php } else { ?>
                                                    <td colspan="5" style="background-color: #1E7BCB;color:aliceblue" class="text-center"><b>SEIMBANG</b></td>
                                                <?php } ?>
                                            </tr>
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
            <?php
            foreach ($jurnal as $j) {
            ?>
                <div class="modal fade" id="modalHapus<?= $j->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Jurnal </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= base_url() ?>Admin/Laporan/hapusJurnal">
                                <div class="modal-body">

                                    <label>Hapus jurnal Id Transaksi <?= $j->id_transaksi ?></label>
                                    <input name="id_transaksi" hidden value="<?= $j->id_transaksi ?>" required>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            foreach ($jurnal as $j) {
            ?>
                <div class="modal fade" id="modalEdit<?= $j->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Jurnal </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= base_url() ?>Admin/Laporan/ubahJurnal">
                                <div class="modal-body">
                                    <div class="col-md-12 row">
                                        <div class="col-md-6 ">
                                            <label>Id Trans</label>
                                            <input name="id_transaksi" readonly class="form-control" value="<?= $j->id_transaksi ?>" required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl_transaksi" type="date" value="<?= $j->tgl_transaksi ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
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
                                    <div class="col-md-12">
                                        <label>Saldo</label>
                                        <input name="saldo" value="<?= $j->saldo ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Ubah</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

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