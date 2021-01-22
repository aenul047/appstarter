<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- My CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <title>
    esi_Sumbawa
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/now-ui-dashboard.css?v=1.5.0') ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('assets/demo/demo.css') ?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          esi
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          PENGDA E-SPORT
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <?php if ($session == "user") { ?>
            <li>
            <a href="/EventController">
              <i class="now-ui-icons design_app"></i>
              <p>Event</p>
            </a>
          </li>

          <li class="">
            <a href="/tabel_squadController">
              <i class="now-ui-icons location_map-big"></i>
              <p>Squad</p>
            </a>
          </li>

          <li class="">
            <a href="/auth/login">
              <i class="now-ui-icons users_single-02"></i>
              <p>Logout</p>
            </a>
          </li>
          
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Kalender Event</p>
            </a>
          </li>

          <?php } elseif ($session == "admin") { ?>

          <li>
            <a href="/EventController">
              <i class="now-ui-icons design_app"></i>
              <p>Event</p>
            </a>
          </li>
          <li class="">
            <a href="/tabel_squadController">
            <i class="now-ui-icons location_map-big"></i>
            <p>Squad</p>
          </a>
        </li>
        <!-- <li>
          <a href="/EventController">
          <i class="now-ui-icons design_app"></i>
          <p>Komunitas</p>
        </a>
      </li> -->
      <!-- <li>
        <a href="/tabel_squadController">
        <i class="now-ui-icons text_caps-small"></i>
        <p>Roster</p>
      </a>
    </li> -->
    <li>
      <a href="/UserController">
        <i class="now-ui-icons education_atom"></i>
        <p>User</p>
      </a>
    </li>
          <li class="">
            <a href="/auth/login">
              <i class="now-ui-icons users_single-02"></i>
              <p>Logout</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Kalender Event</p>
            </a>
          </li>
          <?php } ?>
          <?php if ($session == "") { ?>
          <li class="">
            <a href="/auth/login">
              <i class="now-ui-icons users_single-02"></i>
              <p>Login</p>
            </a>
          </li>
          <li class="">
            <a href="/auth/register">
              <i class="now-ui-icons users_single-02"></i>
              <p>Registrasi</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Kalender Event</p>
            </a>
          </li>
          <?php } ?>

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">esi Sumbawa</a>
          </div>
          
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>


      <!-- content -->
      <?= $this->renderSection('content'); ?>


      <!--footer  -->
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
            </ul>
          </nav>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
  <!-- Chart JS -->
  <script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript') ?>"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url('assets/demo/demo.js') ?>"></script>
</body>

</html>