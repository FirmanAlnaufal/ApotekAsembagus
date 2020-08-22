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
            <a href="<?=site_url('customer')?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                 <?php //echo validation_errors();?>
                <form action="<?= site_url('customer/process')?>" method="post">
                <div class="form-group">
                    <label>id customer</label>
                    <input type="text" name="id" value="<?=$row->id_customer?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Customer *</label>
                    <input type="text" name="cus_name" value="<?=$row->nama_c?>" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label>Phone *</label>
                    <input type="number" name="phone" value="<?=$row->telephone?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>jarak *</label>
                    <input id="jara" type="number" name="jarak" value="<?=$row->jarak?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>potongan *</label>
                    <input id="potong" type="number" name="potongan" value="<?=$row->potongan?>" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label>harga *</label>
                    <input id="har" type="number" name="harga" value="<?=$row->harga?>" class="form-control"  required>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    $(document).keyup(function(){
        var harga = parseInt($("#harga").val())
        var jarak = parseInt($("jarak").val())

        var potongan = harga * jarak;
        $("#potongan").attr("value",potongan)


    });
    
    </script>