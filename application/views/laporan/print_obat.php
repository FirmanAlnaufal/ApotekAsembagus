<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Data Obat</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">

        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    Apotek Asembagus
                    <br>Jl. Raya Asembagus, Trigonco Utara, Kabupaten Situbondo, Jawa Timur
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        Laporan Obat
    </p>

    <table class="table table-bordered table-striped">
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
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>