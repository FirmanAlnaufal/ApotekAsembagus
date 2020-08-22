<section class="content-header">
  <h1>
    Data
    <small>obat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">obat</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <a href="<?= site_url('obat/add') ?>" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
        <i class="fa fa-plus"></i> Tambah
      </a>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Min Stok</th>
            <th>Kapasitas</th>
            <th>Satuan</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->id_obat ?></td>
              <td><?= ucfirst($data->nama_obat) ?></td>
              <td><?= $data->stok ?></td>
              <td><?= $data->min_stok ?></td>
              <td><?= $data->kapasitas ?></td>
              <td><?= $data->satuan ?></td>
              <td><?=indo_currency($data->harga_jual) ?></td>
              <td><?=indo_currency($data->harga_beli) ?></td>
              <td><?= $data->tgl_kadaluarsa ?></td>

              <td class="text-center" width="160px">
                
                <a href="<?= site_url('obat/edit/' . $data->id_obat) ?>" class="btn btn-primary btn-xs">
                  <i class="fa fa-pencil"> Update</i>
                </a>
                <a href="<?= site_url('obat/del/' . $data->id_obat) ?>" onclick="return confirm('apakah anda yakin hapus data? ')" class="btn btn-danger btn-xs">
                  <i class="fa fa-trash"> Delete</i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- <script>
    $(document).ready(function() {
      $('#table2').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "<?= site_url('obat/get_ajax') ?>",
          "type": "POST"
        }
      })
    })
  </script> -->


<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Detail Obat</h4>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Stok</th>
              <th>Min Stok</th>
              <th>Kapasitas</th>
              <th>Satuan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $$detail->id_obat ?></td>
              <td><?= $$detail->nama_obat ?></td>
              <td><?= $$detail->stok ?></td>
              <td><?= $$detail->min_stok ?></td>
              <td><?= $$detail->kapasitas ?></td>
              <td><?= $$detail->satuan ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>