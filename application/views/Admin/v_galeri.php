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
                        <h4 class="page-title">Galeri</h4>
                        <div class="ml-auto text-right">
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
                <h3>Pilih Kategori</h3>
                <ul class="list-inline">
                    <a class="btn btn-success list-inline-item">All</a>
                    <a class="list-inline-item">Wedding</a>
                    <a class="list-inline-item">Prewedding</a>
                    <a class="list-inline-item">Hangout</a>
                </ul>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- column -->
                                    <div style="margin: 5%;">
                                        <a href="<?= base_url() ?>vendor/studio/img/lookbok.jpg" target="_blank"><img style="width: 300px; padding: 10px;" src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt=""><a>
                                                <a href="<?= base_url() ?>vendor/studio/img/lookbok.jpg" target="_blank"><img style="width: 300px; padding: 10px;" src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt=""><a>
                                                        <a href="<?= base_url() ?>vendor/studio/img/lookbok.jpg" target="_blank"><img style="width: 300px; padding: 10px;" src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt=""><a>
                                                                <a href="<?= base_url() ?>vendor/studio/img/lookbok.jpg" target="_blank"><img style="width: 300px; padding: 10px;" src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt=""><a>
                                                                        <a href="<?= base_url() ?>vendor/studio/img/lookbok.jpg" target="_blank"><img style="width: 300px; padding: 10px;" src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt=""><a>
                                                                                <a href="<?= base_url() ?>vendor/studio/img/lookbok.jpg" target="_blank"><img style="width: 300px; padding: 10px;" src="<?= base_url() ?>vendor/studio/img/lookbok.jpg" alt=""><a>
                                    </div>
                                    <!-- column -->
                                </div>

                            </div>
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


</body>

</html>