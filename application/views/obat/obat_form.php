<section class="content-header">
  <h1>
    Tambah
    <small>obat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Tambah obat</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <div>
        <a href="<?= site_url('obat') ?>" class="btn btn-warning btn-social" title="Kembali" data-toggle="tooltip">
          <i class="fa fa-undo"></i> Back
        </a>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <?php //echo validation_errors();
            ?>
            <form action="<?= site_url('obat/process') ?>" method="post">
              <div class="form-group">
                <label>Kode Obat *</label>
                <input type="text" name="id" value="<?= $row->id_obat ?>" class="form-control" readonly required>
              </div>
              <div class="form-group">
                <label>Nama Obat *</label>
                <input type="text" name="nama_obat" value="<?= $row->nama_obat ?>" class="form-control" placeholder="Name" required>
              </div>
              <div class="form-group">
                <label>Minimal stok *</label>
                <input type="number" name="min_stok" value="<?= $row->min_stok ?>" class="form-control" placeholder="minimal stok" required>
              </div>
              <div class="form-group">
                <label>selisih stok</label>
                <input type="number" name="selisih" value="<?= $row->selisih ?>" class="form-control" placeholder="selisih stok">
              </div>
              <div class="form-group">
                <label>kapasitas stok *</label>
                <input type="number" name="kapasitas" value="<?= $row->kapasitas ?>" class="form-control" placeholder="kapasitas stok" required>
              </div>
              <div class="form-group">
                <label>Satuan *</label>
                <select class="form-control" name="satuan" required>
                  <option value="">- Pilih -</option>
                  <option value="Botol" <?=$row->satuan == 'Botol' ? 'selected' : ''?>>Botol</option>
                  <option value="Box" <?=$row->satuan == 'Box' ? 'selected' : ''?>>Box</option>
                  <option value="Kotak" <?=$row->satuan == 'Kotak' ? 'selected' : ''?>>Kotak</option>
                  <option value="Strip" <?=$row->satuan == 'Strip' ? 'selected' : ''?>>Strip</option>
                  <option value="Tube" <?=$row->satuan == 'Tube' ? 'selected' : ''?>>Tube</option>
                </select>
              </div>
              <div class="form-group">
                <label>Harga Jual *</label>
                <input type="number" name="harga_jual" value="<?=$row->harga_jual ?>" class="form-control" placeholder="harga_jual" required>
              </div>
              <div class="form-group">
                <label>Harga Beli *</label>
                <input type="number" name="harga_beli" value="<?= $row->harga_beli ?>" class="form-control" placeholder="harga_beli" required>
              </div>
              <div class="form-group">
                <label>Tanggal kadarluarsa *</label>
                <input type="date" name="tgl_kadaluarsa" value="<?= $row->tgl_kadaluarsa ?>" class="form-control" placeholder="tgl_kadarluarsa" required>
              </div>
              <div class="form-group">
                <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save
                </button>
                <button type="reset" class="btn btn-flat"> Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>