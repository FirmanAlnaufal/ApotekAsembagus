<section class="content-header">
    <h1>
        Detail
        <small>Obat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Detail Obat</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div>
                        <a href="<?= site_url('obat') ?>" class="btn btn-warning btn-social" title="Kembali" data-toggle="tooltip">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                    <!-- form start -->
                    <form role="form" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Obat</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $detail->nama_obat ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Stok</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $detail->stok ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Minimal Stok</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $detail->min_stok ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kapasitas</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $detail->kapasitas ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Satuan</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $detail->satuan ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga Jual</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo indo_currency($detail->harga_jual) ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga Beli</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo indo_currency($detail->harga_beli) ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $detail->tgl_kadaluarsa ?></label>
                                </div>

                            </div>
                        </div>
                </div><!-- /.box body -->
                </form>
            </div><!-- /.box -->
        </div>
    </div>
    <!--/.col -->
    </div> <!-- /.row -->
</section><!-- /.content-->