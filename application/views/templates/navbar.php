<header class="topbar" data-navbarbg="skin5"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon p-l-10">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="<?= base_url() ?>vendor/admin/assets/images/logos.png" width="40px" height="40px" alt="homepage" class="light-logo" />

                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="<?= base_url() ?>vendor/admin/assets/images/SDN Badean 1.png" alt="homepage" class="light-logo" />

                </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                <!-- </b> -->
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">

            </ul>
            <h5 class="card-header" style="color:#fff;">Hi !  <?php echo $this->session->userdata("username"); ?></h5>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>vendor/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="<?= base_url('Admin/Logout'); ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Pemesanan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Data </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= base_url() ?>peserta_didik" class="sidebar-link"><i class="mdi mdi-account"></i><span class="hide-menu">Kategori</span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>gtk" class="sidebar-link"><i class="mdi mdi-school"></i><span class="hide-menu">Galeri</span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>gtk" class="sidebar-link"><i class="mdi mdi-school"></i><span class="hide-menu">Dekorasi</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Akademik </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= base_url() ?>rombel/" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Rombongan Belajar </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>mapel/mapel" class="sidebar-link"><i class="mdi mdi-library"></i><span class="hide-menu"> Daftar Mata Pelajaran </span></a></li>
                        <li class="sidebar-item"> <a href="<?= base_url() ?>mapel/" class="sidebar-link"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu"> Jadwal Mata Peljaran</span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>Ekskul/index" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Ekstrakurikuler </span></a></li>
                        <!-- <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Penilaian Siswa </span></a></li> -->
                        <li class="sidebar-item"><a href="<?= base_url() ?>Absensi_siswa/index" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Absensi Peserta Didik </span></a></li>
                        
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pen"></i><span class="hide-menu">Penilaian </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= base_url() ?>Penilaian/show_nilai" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Hasil Penilaian </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>Penilaian/cek_rombel" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Penilaian </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>Penilaian/kd" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Kompetensi Dasar </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-printer"></i><span class="hide-menu">Cetak </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= base_url() ?>laporan/rekapNilai" class="sidebar-link"><i class="mdi mdi-printer"></i><span class="hide-menu"> Raport </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url() ?>Laporan/index" class="sidebar-link"><i class="mdi mdi-printer"></i><span class="hide-menu"> Laporan Abasensi </span></a></li>
                    </ul>
                </li> 
                <br>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('Profile'); ?>" aria-expanded="false"><i class="mdi mdi-contacts"></i><span class="hide-menu">Profil Sekolah</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>