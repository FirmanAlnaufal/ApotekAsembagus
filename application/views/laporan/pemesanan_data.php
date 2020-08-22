<section class="content-header">
    <h1>
        Laporan
        <small>pemesanan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">pemesanan</li>
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
                <a href="<?= site_url('pemesananl/print') ?>" class="btn btn-danger btn-social" title="print" data-toggle="tooltip" target="_blank">
                    <i class="fa fa-print"></i> Print
                </a>
                <a class="btn btn-danger btn-social" title="export pdf" data-toggle="modal" data-target="#cetakpdf">
                    <i class="fa fa-file"></i> PDF
                </a>
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
                        <th>Tanggal pemesanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
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
                            <td><?= $data->tanggal ?></td>
                            <?php
                                if ($data->status == 'belum') {
                                    $status = '<span class="badge" style="background-color: #d9534f">belum</div>';
                                } else {
                                    $status = '<span class="badge" style="background-color:  #5cb85c">datang</div>';
                                }
                                ?>
                            <td><?php echo $status ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="cetakpdf" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Pemesanan</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('pemesananl/pdf') ?>" method="post" target="_blank">
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
                    <a href="<?= site_url('pemesananl/pdff') ?>" class="btn btn-primary" target="_blank">cetak semua data</a>
                </div>
            </div>
        </div>
    </div>
</div>