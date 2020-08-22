<section class="content-header">
    <h1>
        Detail
        <small>pemesanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Detail pemesanan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <form method="post" action="<?= site_url('obat_masuk/tambah') ?>">
        <input type="hidden" value="<?php echo $id ?>" name="id_pemesanan">
            <div class="box-header">
                <div>
                    <a href="<?= site_url('obat_masuk') ?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip" md-1>
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
                <br />
                <div class="col-lg-2">
                <label>Tanggal </label>
                    <div class="input-group">
                        <input type="text" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" readonly required>
                    </div>
                </div>
                <div class="col-lg-2">
                <label>Kode Obat Masuk </label>
                    <div class="input-group">
                        <input type="hidden" name="p3" value="<?php echo 'OBM' . date('Y') . date('m') ?>">
                        <input type="text" name="p1" class="form-control" value="<?php echo 'OBM' . '-' . date('Y') . '-' . date('m') ?>" readonly required>
                    </div>
                </div>
                <?php
                if ($pemesanan_last->num_rows() > 0) {
                    $pemesanan_last1 = $pemesanan_last->row()->id_obt_masuk;
                    $a = substr($pemesanan_last1, 7, 2);
                    $b = date("m");
                } else {
                    $pemesanan_last1 = null;
                    $a = null;
                    $b = 13;
                }
                if ($pemesanan_last->num_rows() == 0) {
                    $pemesanan_last2 = 1;
                } elseif ($a == $b) {
                    $pemesanan_last2 = (int) substr($pemesanan_last1, -2) + 1;
                } else {
                    $pemesanan_last2 = 1;
                }
                ?>
                <?php if ($pemesanan_last2 <= 9) {
                    $id_obt_masuk = "00" . $pemesanan_last2;
                } elseif ($pemesanan_last2 > 9 && $pemesanan_last2 <= 100) {
                    $id_obt_masuk = "0" . $pemesanan_last2;
                } else {
                    $id_obt_masuk = $pemesanan_last2;
                } ?>
                <!-- <div class="col-lg-1">
                    <div class="input-group">
                        <input type="hidden" name="p2" class="form-control" value="<?= $id_obt_masuk ?>" readonly required>
                    </div>
                </div> -->
                <input type="hidden" name="p2" class="form-control" value="<?= $id_obt_masuk ?>" readonly required>

                <div class="col-lg-2">
                    <label></label>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
                            <i class="fa fa-save"></i> save
                        </button>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode pemesanan</th>
                            <th>Nama Obat</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($detail as $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <?php
                                    $a = substr(strtoupper($data->id_pemesanan), 0, 2);
                                    $b = substr($data->id_pemesanan, 2, 4);
                                    $c = substr($data->id_pemesanan, 6, 2);
                                    $d = substr($data->id_pemesanan, 8, 3)
                                    ?>
                                <td><?php echo $a . '-' . $b . '-' . $c . '-' . $d ?></td>
                                <td><?= $data->nama_obat ?></td>
                                <td><?= $data->jumlah ?></td>
                                <td><?= $data->satuan ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
       
    </div>
 </form>
</section>