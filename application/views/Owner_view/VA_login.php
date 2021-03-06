<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Login admin Lumintu Mebel</title>

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/purnamajati.png'); ?>" rel="icon">
  <link href="<?php echo base_url('assets/admin/login/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/admin/login/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url('assets/admin/login/lib/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/admin/login/css/style.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/admin/login/css/style-responsive.css'); ?>" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="<?php echo base_url('Owner_controller/A_login/aksi_login'); ?>" method="post">
        <h2 class="form-login-heading" style="background-color: #E74C3C;">Login Admin</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Email" name="email" required="required" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" required="required" name="password">
          <label class="checkbox">
            <div style="padding-left: 20px;"><input type="checkbox" value="remember-me"></div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRemember me
            <span class="pull-right">
            <!-- <a data-toggle="modal" href=""> Forgot Password?</a> -->
            </span>
            </label>
          <button style="background-color: #E74C3C;color: white;" class="btn btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="login-social-link centered">
            <!-- <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</button> -->
          </div>
          <div class="registration">
            <a href="<?php echo base_url(); ?>">Kembali Ke beranda</a><br/>
            <a class="" >
              Hubungi pihak Owner Admin Lumintu
              </a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('assets/admin/login/lib/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/admin/login/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="<?php echo base_url('assets/admin/login/lib/jquery.backstretch.min.js'); ?>"></script>
  <script>
   
  </script>
</body>

</html>
