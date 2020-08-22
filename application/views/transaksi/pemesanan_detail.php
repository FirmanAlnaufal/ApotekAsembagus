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
        <div class="box-header">
            <div>
                <a href="<?= site_url('pemesanan') ?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip" md-1>
                    <i class="fa fa-undo"></i> Back
                </a>
                <!-- <button class="btn btn-primary btn-social" type="submit" title="Tambah Data" data-toggle="tooltip" md-1>
                    <i class="fa fa-save"></i> Save
                </button> -->
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
</section>