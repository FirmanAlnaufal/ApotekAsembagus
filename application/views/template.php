<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apps Apotek Asembagus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- template -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Chosen Select -->
  <!-- <link rel="stylesheet" type="text/css" href="myApotek/assets/plugins/chosen/css/chosen.min.css" /> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">

  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= site_url('dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>A</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Apotek</b> Asembagus</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                if ($this->fungsi->user_login()->image == "") { ?>
                  <img src="<?= base_url('assets/dist/img/avatar.png') . $this->fungsi->user_login()->image ?>" class="user-image" alt="User Image">
                <?php
                } else { ?>
                  <img src="<?= base_url('assets/dist/img/') . $this->fungsi->user_login()->image ?>" class="user-image" alt="User Image">

                <?php
                } ?>
                <span class="hidden-xs"><?= ucfirst($this->fungsi->user_login()->username) ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php
                  if ($this->fungsi->user_login()->image == "") { ?>
                    <img src="<?= base_url('assets/dist/img/avatar.png') . $this->fungsi->user_login()->image ?>" class="img-circle" alt="User Image">
                  <?php
                  } else { ?>
                    <img src="<?= base_url('assets/dist/img/') . $this->fungsi->user_login()->image ?>" class="img-circle" alt="User Image">

                  <?php
                  } ?>

                  <p>
                    <?= $this->fungsi->user_login()->name ?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= site_url('profile/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default bg-red">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <?php
            if ($this->fungsi->user_login()->image == "") { ?>
              <img src="<?= base_url('assets/dist/img/avatar.png') . $this->fungsi->user_login()->image ?>" class="img-circle" alt="User Image">
            <?php
            } else { ?>
              <img src="<?= base_url('assets/dist/img/') . $this->fungsi->user_login()->image ?>" class="img-circle" alt="User Image">

            <?php
            } ?>
          </div>
          <div class="pull-left info">
            <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i><span>Beranda</span></a>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'distributor' || $this->uri->segment(1) == 'pegawai' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Master Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'distributor' ? 'class="active"' : '' ?>><a href="<?= site_url('distributor') ?>"><i class="fa fa-circle-o"></i> Data Distributor</a></li>
              <li <?= $this->uri->segment(1) == 'pegawai' ? 'class="active"' : '' ?>><a href="<?= site_url('pegawai') ?>"><i class="fa fa-circle-o"></i> Data Pegawai</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'obat' || $this->uri->segment(1) == 'Mobat' || $this->uri->segment(1) == 'expired' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Master Obat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'obat' ? 'class="active"' : '' ?>><a href="<?= site_url('obat') ?>"><i class="fa fa-circle-o"></i> Data Obat</a></li>
              <li <?= $this->uri->segment(1) == 'Mobat' ? 'class="active"' : '' ?>><a href="<?= site_url('Mobat') ?>"><i class="fa fa-circle-o"></i> Stok Menipis</a></li>
              <li <?= $this->uri->segment(1) == 'expired' ? 'class="active"' : '' ?>><a href="<?= site_url('expired') ?>"><i class="fa fa-circle-o"></i> Obat expired</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'pemesanan' || $this->uri->segment(1) == 'obat_keluar' || $this->uri->segment(1) == 'obat_masuk' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'pemesanan' ? 'class="active"' : '' ?>><a href="<?= site_url('pemesanan') ?>"><i class="fa fa-circle-o"></i> Pemesanan Obat</a></li>
              <li <?= $this->uri->segment(1) == 'obat_masuk' ? 'class="active"' : '' ?>><a href="<?= site_url('obat_masuk') ?>"><i class="fa fa-circle-o"></i> Obat Masuk</a></li>
              <li <?= $this->uri->segment(1) == 'obat_keluar' ? 'class="active"' : '' ?>><a href="<?= site_url('obat_keluar') ?>"><i class="fa fa-circle-o"></i> Obat Keluar</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'pemesananl' || $this->uri->segment(1) == 'obat_keluarl' || $this->uri->segment(1) == 'obat_masukl' || $this->uri->segment(1) == 'obatl' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-pie-chart"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'pemesananl' ? 'class="active"' : '' ?>><a href="<?= site_url('pemesananl') ?>"><i class="fa fa-circle-o"></i> Pemesanan</a></li>
              <li <?= $this->uri->segment(1) == 'obat_masukl' ? 'class="active"' : '' ?>><a href="<?= site_url('obat_masukl') ?>"><i class="fa fa-circle-o"></i> Obat Masuk</a></li>
              <li <?= $this->uri->segment(1) == 'obat_keluarl' ? 'class="active"' : '' ?>><a href="<?= site_url('obat_keluarl') ?>"><i class="fa fa-circle-o"></i> Obat Keluar</a></li>
              <li <?= $this->uri->segment(1) == 'obatl' ? 'class="active"' : '' ?>><a href="<?= site_url('obatl') ?>"><i class="fa fa-circle-o"></i> Obat</a></li>
            </ul>
          </li>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">SETTINGS</li>
            <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i><span>Users</span></a></li>
        </ul>
      <?php } ?>
      <!-- <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>><a href="<?= site_url('customer') ?>"><i class="fa fa-user"></i><span> customer</span></a></li> -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"> -->


    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io">by @Firmansyah</a>.</strong> Tugas Akhir SI inventori obat pada apotek.
    </footer>
    <!-- <div class="control-sidebar-bg"></div> -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->

  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- template -->

  <!-- chosen select -->
  <!-- <script src="myApotek/assets/plugins/chosen/js/chosen.jquery.min.js"></script> -->
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#table1').DataTable({
        "order":[[1,"asc"]]
      });
      // chosen select
      $('#chosen').chosen()
    });
  </script>
</body>

</html>