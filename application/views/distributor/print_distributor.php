<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Data Distributor</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


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
        Data Distributor
    </p>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Description</th>
        </tr>
        <?php $no = 1;
        foreach ($row->result() as $key => $data) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->nama_distributor ?></td>
                <td><?= $data->phone ?></td>
                <td><?= $data->address ?></td>
                <td><?= $data->description ?></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>