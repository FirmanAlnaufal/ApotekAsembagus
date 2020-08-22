<section class="content-header">
      <h1>
        Data
        <small>User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
      	<div class="box-header">
      		<div>
      			<a href="<?=site_url('user')?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip">
      				<i class="fa fa-undo"></i> Back
      			</a>
      		</div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                 <?php echo form_open_multipart('user/add')?>
                
                  <div class="form-group <?= form_error('fullname') ? 'has-error' : null?>">
                    <label>Nama *</label>
                    <?= form_error('fullname')?>
                    <select name="fullname" class="form-control">
                      <option value="">- pilih -</option>
                     <?php foreach($pegawai->result() as $key => $data) {?>
                     <option value="<?=$data->id_pegawai?>" <?= set_value('fullname') == $data->id_pegawai ? "selected" : null?>><?=$data->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group <?= form_error('username') ? 'has-error' : null?>">
                    <label>Username *</label>
                     <?= form_error('username')?>
                    <input type="text" name="username" value="<?= set_value('username')?>" class="form-control" placeholder="username">
                   
                  </div>
                  <div class="form-group <?= form_error('password') ? 'has-error' : null?>">
                    <label>Password *</label>
                    <?= form_error('password')?>
                    <input type="password" name="password" class="form-control" placeholder="password">
                    
                  </div>
                  <div class="form-group <?= form_error('passconf') ? 'has-error' : null?>">
                    <label>Password *</label>
                    <?= form_error('passconf')?>
                    <input type="password" name="passconf"  class="form-control" placeholder="Konfirmasi password">
                  </div>

                   <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image"  class="form-control">
                     <small>(Biarkan Kosong Jika tidak ada)</small>
                  </div>
                  <div class="form-group <?= form_error('level') ? 'has-error' : null?>">
                    <label>Level *</label>
                    <?= form_error('level')?>
                    <select name="level" class="form-control">
                      <option value="">- Pilih -</option>
                      <option value="1"<?= set_value('level') == 1 ? "selected" : null?>>- Admin -</option>
                      <option value="2"<?= set_value('level') == 2 ? "selected" : null?>>- Pegawai -</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Save
                    </button>
                    <button type="reset" class="btn btn-flat"> Reset</button>
                <?php echo form_close(); ?>
                
              </div>
            </div>
      		</div>
      	</div>
      </div>
    </section>