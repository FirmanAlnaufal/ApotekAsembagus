<section class="content-header">
      <h1>
        Data
        <small><?php echo $judul ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">obat Kadaluarsa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php $this->view('messages')?>
      <div class="box">
        <!-- <div class="box-header">
            <a href="<?=site_url('obat/add')?>" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
              <i class="fa fa-plus"></i> Create
            </a>
          </div> -->
          <div class="box-body table-responsive">
            <!-- <?php print_r($row->result())?> -->
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
                  <th>tanggal kadaluarsa</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                foreach($row->result() as $key => $data) { ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= $data->id_obat?></td>
                  <td><?= $data->nama_obat?></td>
                  <td><?= $data->stok?></td>
                  <td><?= $data->min_stok?></td>
                  <td><?= $data->kapasitas?></td>
                  <td><?= $data->satuan?></td>
                  <td><?= $data->tgl_kadaluarsa?></td>
                  <?php 
                      $status = '<span class="badge" style="background-color: #d9534f;">Kadaluarsa</div>';
                  ?>
                  <td><?php echo $status ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </section>