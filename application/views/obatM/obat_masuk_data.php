<section class="content-header">
      <h1>
        Data
        <small>Obat Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Obat Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php $this->view('messages')?>
      <div class="box">
        <div class="box-header">
            <a href="<?=site_url('obat_masuk/add')?>" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
              <i class="fa fa-plus"></i> Tambah
            </a>
          </div>
          <div class="box-body table-responsive">
            <!-- <?php print_r($row->result())?> -->
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Obat Masuk</th>
                  <th>tanggal</th>
                  <th>User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                foreach($row->result() as $key => $data) { ?>
                <tr>
                  <td><?= $no++?></td>
                  <?php 
                    $a=substr(strtoupper($data->id_obt_masuk), 0,3);
                    $b=substr($data->id_obt_masuk, 3,4);
                    $c=substr($data->id_obt_masuk, 7,2);
                    $d=substr($data->id_obt_masuk, 9,3)
                   ?>
                  <td><?php echo $a.'-'.$b.'-'.$c.'-'.$d ?></td>
                  <td><?= $data->tgl_masuk?></td>
                  <td><?= $data->username?></td>
                  <td class="text-center" width="160px">
                    <a  href="<?= site_url('obat_masuk/detail/'.$data->id_obt_masuk)?>" class="btn btn-success btn-xs">
                    <i class="fa fa-search-plus"> Detail</i> 
                    </a>
                  
                </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </section>
    
<!-- <div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Detail Pemesanan</h4>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode pemesanan</th>
              <th>Nama obat</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>

        </table>
      </div>
    </div>
  </div>
</div> -->