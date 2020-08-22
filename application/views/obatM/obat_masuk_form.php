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
  <div class="box-header">
            <a href="<?=site_url('obat_masuk')?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Pemesanan</th>
              <th>Nama Obat</th>
              <th>Distributor</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($obat as $data) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <?php
                  $a = substr(strtoupper($data->id_pemesanan), 0, 2);
                  $b = substr($data->id_pemesanan, 2, 4);
                  $c = substr($data->id_pemesanan, 6, 2);
                  $d = substr($data->id_pemesanan, 8, 3)
                  ?>
                <td><?php echo $a . '-' . $b . '-' . $c . '-' . $d ?></td>
                <td><?= $data->tanggal ?></td>
                <td><?= $data->nama_distributor ?></td>
                <?php
                  if($data->status == 'belum'){
                    $status = '<span class="badge" style="background-color: #d9534f">belum</div>';
                  }else{
                    $status = '<span class="badge" style="background-color:  #5cb85c">datang</div>';
                  }
                  ?>
                <td><?= $status ?></td>


                <!-- <td><input type="checkbox" name="checked_<?= $data->id_pemesanan ?>"></td> -->
                <td class="text-center" width="160px">
                  <a href="<?= site_url('obat_masuk/detail_p/' . $data->id_pemesanan) ?>" class="btn btn-success">
                    <i class="fa fa-search-plus"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
  </div>
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