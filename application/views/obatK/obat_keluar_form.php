<section class="content-header">
  <h1>
    Tambah
    <small>Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Tambah Data</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <form method="post" action="<?= site_url('obat_keluar/tambah') ?>">
      <div class="box-header">
        <div>
          <a href="<?= site_url('obat_keluar') ?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip" md-1>
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
        <br />
        <div class="col-lg-2">
          <label>Tanggal </label>
          <div class="input-group">
            <input type="text" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" readonly required>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="input-group">
            <label>Kode Obat Keluar</label>
            <input type="hidden" name="p3" value="<?php echo 'OBK' . date('Y') . date('m') ?>">
            <input type="text" name="p1" class="form-control" value="<?php echo 'OBK' . '-' . date('Y') . '-' . date('m') ?>" readonly required>
          </div>
        </div>
        <?php
        if ($pemesanan_last->num_rows() > 0) {
          $pemesanan_last1 = $pemesanan_last->row()->id_obt_keluar;
          $a = substr($pemesanan_last1, 7, 2);
          $b = date("m");
        } else {
          $pemesanan_last1 = null;
          $a = null;
          $b = 13;
        }
        if ($pemesanan_last->num_rows() == 0) {
          $pemesanan_last2 = 1;
        } elseif ($a == $b) {
          $pemesanan_last2 = (int) substr($pemesanan_last1, -2) + 1;
        } else {
          $pemesanan_last2 = 1;
        }
        ?>
        <?php if ($pemesanan_last2 <= 9) {
          $id_obt_keluar = "00" . $pemesanan_last2;
        } elseif ($pemesanan_last2 > 9 && $pemesanan_last2 <= 100) {
          $id_obt_keluar = "0" . $pemesanan_last2;
        } else {
          $id_obt_keluar = $pemesanan_last2;
        } ?>
        <!-- <div class="col-lg-1">
          <div class="input-group">
            <input type="hidden" name="p2" class="form-control" value="<?= $id_obt_keluar ?>" readonly required>
          </div>
        </div> -->
        <input type="hidden" name="p2" class="form-control" value="<?= $id_obt_keluar ?>" readonly required>

        <div class="col-lg-2">
          <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
              <i class="fa fa-save"></i> Save
            </button>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Stok</th>
              <th>Satuan</th>
              <th>jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($obat as $data) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->id_obat ?></td>
                <td><?= $data->nama_obat ?></td>
                <td><?= $data->stok ?></td>
                <td><?= $data->satuan ?></td>
                <td><input type="number" name="jumlah_<?php echo $data->id_obat ?>" max=<?= $data->stok ?> onkeyup="if(this.value > <?= $data->stok ?>) this.value = null;"></td>
                <td><input type="checkbox" name="checked_<?= $data->id_obat ?>"></td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
  </div>
  </form>
</section>


<!-- 
<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Data Distributor</h4>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> -->