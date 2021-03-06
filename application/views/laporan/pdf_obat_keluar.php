<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Data Obat Keluar</title>
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
        Laporan Obat Keluar
        <br><?php echo $tgl1 ?> s/d <?php echo $tgl2 ?>
    </p>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Kode obat keluar</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tanggal keluar</th>
        </tr>
        <?php $no = 1;
        foreach ($row->result() as $key => $data) { ?>
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
                <td><?= $data->tgl_keluar ?></td>

            </tr>
        <?php } ?>
    </table>
</body>

</html>