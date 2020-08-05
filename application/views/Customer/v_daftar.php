<!DOCTYPE html>
<html lang="en">

<head>
    <title>Studio Foto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url() ?>vendor/studio/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/studio/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="<?= base_url() ?>Customer/Login/daftar_cus" method="post">
                    <span class="login100-form-title p-b-34">
                        Daftar Sebagai Customer </span>
                    <div class="row">
                        <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20 col-md-12" data-validate="Type user name">
                            <input id="first-name" class="input100" type="text" name="nama_cus" placeholder="Nama Lengkap" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20 col-md-12" data-validate="Type password">
                            <textarea style="height: 100px;margin-top:20px;" class="input100" type="password" name="alamat_cus" placeholder="Alamat Lengkap" required></textarea>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20 col-md-12" data-validate="Type user name">
                            <input id="first-name" class="input100" type="text" name="email_cus" placeholder="Email" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20 col-md-12" data-validate="Type user name">
                            <input id="first-name" class="input100" type="number" name="no_hp" placeholder="No Hp" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                            <input id="first-name" class="input100" type="text" name="username" placeholder="User name" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
                            <input class="input100" type="password" name="password" placeholder="Password" required>
                            <span class="focus-input100"></span>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Daftar
                        </button>
                    </div>

                    <div class="w-full text-center p-t-27 p-b-239">
                        <span class="txt1">
                            Forgot
                        </span>

                        <a href="#" class="txt2">
                            User name / password?
                        </a>
                    </div>

                    <div class="w-full text-center">
                        <a href="#" class="txt3">
                            Sign Up
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('<?= base_url('vendor/studio/login/images/bg-01.jpg') ?>');"></div>
            </div>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/studio/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/studio/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/studio/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>vendor/studio/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/studio/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>vendor/studio/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/studio/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>vendor/studio/login/js/main.js"></script>

</body>

</html>