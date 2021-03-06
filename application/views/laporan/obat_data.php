<section class="content-header">
    <h1>
        Laporan
        <small>Obat Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Obat Keluar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <div>
                <a href="<?= site_url('obat') ?>" class="btn btn-warning btn-social" title="Tambah Data" data-toggle="tooltip" md-1>
                    <i class="fa fa-undo"></i> Back
                </a>
                <a href="<?= site_url('obatl/print') ?>" class="btn btn-danger btn-social" title="print" data-toggle="tooltip">
                    <i class="fa fa-print"></i> Print
                </a>
                <a href="<?= site_url('obatl/pdff') ?>" class="btn btn-danger btn-social" title="export pdf">
                    <i class="fa fa-file"></i> PDF
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Kapasitas</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Tanggal Kadaluarsa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->id_obat ?></td>
                            <td><?= $data->nama_obat ?></td>
                            <td><?= $data->stok ?></td>
                            <td><?= $data->min_stok ?></td>
                            <td><?= $data->kapasitas ?></td>
                            <td><?= $data->satuan ?></td>
                            <td><?= indo_currency($data->harga_jual) ?></td>
                            <td><?= indo_currency($data->harga_beli) ?></td>
                            <td><?= $data->tgl_kadaluarsa ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- <div class="modal fade" id="cetakpdf" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Pemesanan</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('obat_keluarl/pdf') ?>" method="post">
                <table>
                    <tr>
                        <td>
                            <div class="form-group">Dari Tanggal</div>
                        </td>
                        <td align="center" width="5%">
                            <div class="form-group">:</div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tgl_a" required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">sampai Tanggal</div>
                        </td>
                        <td align="center">
                            <div class="form-group">:</div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tgl_b" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="cetakp" class="btn btn-primary" value="cetak">
                        </td>
                    </tr>
                </table>
                </form> 
                <div class="modal-footer">
                    <a href="<?= site_url('obat_keluarl/pdff') ?>" class="btn btn-primary">cetak semua data</a>
                </div>
            </div>
        </div>
    </div>
</div> -->