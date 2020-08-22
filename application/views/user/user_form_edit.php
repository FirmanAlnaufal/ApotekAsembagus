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
      			<a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
      				<i class="fa fa-undo"></i> Back
      			</a>
      		</div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                  <?php echo form_open_multipart('user/edit')?>

                  <div class="form-group <?= form_error('fullname') ? 'has-error' : null?>">
                    <label>Name *</label>
                    <?= form_error('fullname')?>
                    <input type="hidden" name="id_user" value="<?= $row->id_user?>">
                    <input type="hidden" name="id_pegawai" value="<?= $row->id_pegawai?>">
                    <input type="text" name="fullname" value="<?= $row->name?>" class="form-control" placeholder="Nama Lengkap" readonly>
                    
                  </div>
                  <div class="form-group <?= form_error('username') ? 'has-error' : null?>">
                    <label>Username *</label>
                     <?= form_error('username')?>
                    <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control" placeholder="username">
                   
                  </div>
                  <div class="form-group <?= form_error('password') ? 'has-error' : null?>">
                    <label>Password *</label><small> (Biarkan kosong jika tidak diganti)</small>
                    <?= form_error('password')?>
                    <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control" placeholder="password">
                    
                  </div>
                  <div class="form-group <?= form_error('passconf') ? 'has-error' : null?>">
                    <label>Password *</label>
                    <?= form_error('passconf')?>
                    <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control" placeholder="Konfirmasi password">
                  </div>

                  <div class="form-group">
                    <label>Image</label>
                    <?php if($row->image != null) {?>
                        <div style ="margin-bottom: 5px">
                          <img src="<?=base_url('assets/dist/img/'.$row->image)?>" style="width:80%">
                        </div>
                        <?php
                    }?>
                    <input type="file" name="image"  class="form-control">
                    <small>(Biarkan Kosong Jika tidak diganti)</small>
                  </div>
                  <div class="form-group <?= form_error('level') ? 'has-error' : null?>">
                    <label>Level *</label>
                    <?= form_error('level')?>
                    <select name="level" class="form-control">
                      <?php $level=$this->input->post('level') ?? $row->level ?>
                      <option value="1">Admin</option>
                      <option value="2" <?= $level == 2 ? 'selected' : null?>>Pegawai</option> 
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