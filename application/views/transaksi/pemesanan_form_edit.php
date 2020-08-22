<section class="content-header">
    <h1>
        Edit
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Edit Data</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <div>
                <a href="<?= site_url('pemesanan') ?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();
                        ?>
                        <form action="<?= site_url('pemesanan/process') ?>" method="post">
                            <div class="form-group">
                                <label>Kode_pemesanan *</label>
                                <input type="text" name="id" class="form-control" value="<?= $row->id_pemesanan ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Distributor *</label>
                                <select name="id_distributor" class="form-control" required>
                                    <option value="">- pilih -</option>
                                    <?php foreach ($distributor->result() as $key => $data) { ?>
                                        <option value="<?= $data->id_distributor ?>" <?= $data->id_distributor == $row->id_distributor ? "selected" : null ?>><?= $data->nama_distributor ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah *</label>
                                <input type="number" name="jumlah_" value="<?= $row->jumlah ?>" class="form-control" placeholder="no telephone" required>
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