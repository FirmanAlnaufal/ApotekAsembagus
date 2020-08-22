<section class="content-header">
  <h1>
    Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Selamat datang <strong><?= $this->fungsi->user_login()->username ?></strong> di Aplikasi Persediaan Obat.
        </p>
      </div>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">

        <h3><?= $obat ?></h3>

        <p>Data Obat</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder"></i>
      </div>
      <a href="<?= site_url('obat/add') ?>" class="small-box-footer"><i class="fa fa-plus"></i></a>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $pemesanan; ?></h3>

        <p>Pemesanan</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder"></i>
      </div>
      <a href="<?= site_url('pemesanan/add') ?>" class="small-box-footer"><i class="fa fa-plus"></i></a>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= $obatm; ?></h3>

        <p>Obat Masuk</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder"></i>
      </div>
      <a href="<?= site_url('obat_masuk/add') ?>" class="small-box-footer"><i class="fa fa-plus"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $obatk; ?></h3>

        <p>Obat Keluar</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder"></i>
      </div>
      <a href="<?= site_url('obat_keluar/add') ?>" class="small-box-footer"><i class="fa fa-plus"></i></a>
    </div>
  </div>
</section>