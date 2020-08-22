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

      <div class="box">
        <div class="box-header">
          <div>
            <a href="<?=site_url('pegawai')?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                 <?php //echo validation_errors();?>
                <form action="<?= site_url('pegawai/process')?>" method="post">
                  <div class="form-group">
                    <label>Name *</label>
                    <input type="hidden" name="id" value="<?=$row->id_pegawai?>">
                    <input type="text" name="pegawai_name" value="<?=$row->name?>" class="form-control" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" class="form-control" required>
                      <option value="">- Pilih -</option>
                      <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-laki</option>
                      <option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Phone *</label>
                    <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" placeholder="no telephone" required>
                  </div>
                  <div class="form-group">
                    <label>Address *</label>
                    <textarea name ="address" class="form-control" placeholder="address" required><?=$row->address?></textarea>
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
    </section>