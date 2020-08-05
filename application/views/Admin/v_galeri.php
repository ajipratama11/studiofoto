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
                        <h2 class="page-title">Galeri</h2>
                        <div class="ml-auto text-right">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                Tambah Galeri
                            </button>
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
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <h5>Pilih Kategori</h5>
                <ul class="list-inline">

                    <a href="<?php echo base_url('Admin/Galeri/'); ?>" class="list-inline-item <?php $url = $this->uri->segment(4);
                                                                                                if ($url == null) echo " btn btn-success" ?>">All</a>
                    <?php foreach ($data as $u) { ?>

                        <a class="list-inline-item<?php $url = $this->uri->segment(4);
                                                    if ($u->id_kategori == $url) echo " btn btn-success" ?>" href="<?php echo base_url('Admin/Galeri/index/' . $u->id_kategori); ?>"><?php echo $u->nama_kategori; ?></a>
                    <?php } ?>
                </ul>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- column -->
                                    <div style="margin: 5%;">
                                        <?php foreach ($galeri as $g) { ?>
                                            <a data-toggle="modal" data-target="#modal-edit<?= $g->id_galeri; ?>"><img style="width: 300px; padding: 10px;" src="<?php echo base_url('./assets/studio/img/' . $g->foto); ?>" alt=""><a>

                                                <?php } ?>
                                    </div>
                                    <!-- column -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($galeri as $row) : ?>
                    <div class="row">
                        <div id="modal-edit<?= $row->id_galeri; ?>" class="modal fade">
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
                                            <div style="margin-left: 35px;" class="col-sm-12">
                                                <img width="400px" height="400px" src="<?php echo base_url('./assets/studio/img/' . $row->foto); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo base_url('Admin/Galeri/hapusFoto/' . $row->id_galeri); ?>" class="btn btn-danger">Hapus Foto</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Galeri</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('Admin/Galeri/tambahGaleri'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4  control-label col-form-label">Foto Galeri</label>
                                        <div class="col-sm-8">
                                            <input type="file" style="border-radius: 10px;" name="foto" class="form-control" id="nama_ekskul" placeholder="Nama Ekskul" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4  control-label col-form-label">Kategori Foto</label>
                                        <div class="col-sm-8">
                                            <select required class="custom-select" id="id_kategori" name="id_kategori" required>
                                                <?php
                                                foreach ($kategori as $kategori_select) { ?>
                                                    <option value="<?= $kategori_select->id_kategori ?>"><?= $kategori_select->nama_kategori ?></option>
                                                <?php
                                                    $id_kategori = $kategori_select->id_kategori;
                                                } ?>
                                            </select>
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


</body>

</html>