<section class="content-header">
    <h1>
        Detail
        <small>Obat Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Detail Obat Keluar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <div>
                <a href="<?= site_url('obat_keluar') ?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip" md-1>
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Obat Keluar</th>
                        <th>Nama Obat</th>
                        <th>Jumlah Keluar</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <?php
                                $a = substr(strtoupper($data->id_obt_keluar), 0, 3);
                                $b = substr($data->id_obt_keluar, 3, 4);
                                $c = substr($data->id_obt_keluar, 7, 2);
                                $d = substr($data->id_obt_keluar, 9, 3)
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