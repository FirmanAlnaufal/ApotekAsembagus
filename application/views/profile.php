<section class="content-header">
  <h1>
    Data
    <small>Profile</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <!-- form start -->
        <form role="form" class="form-horizontal">
          <div class="box-body">

          <input type="hidden" name="id_user" value="<?php echo  $this->fungsi->user_login()->id_user ?>">

            <div class="form-group">
              <label class="col-sm-2 control-label">


              <?php
                  if($this->fungsi->user_login()->image == "") { ?>
                  <img src="<?= base_url('assets/dist/img/avatar.png'). $this->fungsi->user_login()->image?>" style="border:1px solid #eaeaea;border-radius:50px;" width="75">
                    <?php
                  }
                  else { ?>
                  <img src="<?= base_url('assets/dist/img/') . $this->fungsi->user_login()->image ?>" style="border:1px solid #eaeaea;border-radius:50px;" width="75">

                    <?php
                  } ?>

              </label>
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $this->fungsi->user_login()->name ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Username</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $this->fungsi->user_login()->username ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Gender</label>
              <?php
              if ($this->fungsi->user_login()->gender == 'P') {
                $gender = 'Perempuan';
              } else {
                $gender = 'Laki-Laki';
              }
              ?>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $gender ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Phone</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $this->fungsi->user_login()->phone ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Addresss</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $this->fungsi->user_login()->address ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Date In</label>
              <label style="text-align:left" class="col-sm-8 control-label">:
                <?php
                $date_time = $this->fungsi->user_login()->created;
                $new_date = date("d-m-Y", strtotime($date_time));
                echo $new_date;
                ?>
              </label>
            </div>
          </div>
          </div><!-- /.box body -->
        </form>
      </div><!-- /.box -->
    </div>
    <!--/.col -->
  </div> <!-- /.row -->
</section><!-- /.content