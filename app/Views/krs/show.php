<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link href="<?php echo base_url() ?>/template/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="themes/invoiceStyle.css" media="all" />
    <style>
        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }

        .pull-right {
            float: right;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-title">
                        <h1 class="text-center" style="font-weight:bold; font-size:20px;">KARTU RENCANA STUDI (KRS)</h1>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php foreach ($mahasiswa as $key => $value) : ?>
                                <address>
                                    <strong>Nama Mahasiswa </strong><strong>: <?= $value->nama ?></strong><br>
                                    <strong>NIM </strong><strong>: <?= $value->nim ?></strong><br>
                                    <strong>Email </strong><strong>: <?= $value->email_mahasiswa ?></strong><br>
                                </address>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Tanggal Dibuat:</strong><br>
                                <?php echo date("d/m/Y") ?><br><br>
                            </address>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Daftar Mata Kuliah</strong></h3>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>

                                        <tr>
                                            <td><strong>#NO</td>
                                            <hr>
                                            <td class="text-center"><strong>KODE MATAKULIAH</td>
                                            <hr>
                                            <td class="text-center"><strong>MATA KULIAH</strong></td>
                                            <hr>
                                            <td class="text-center"><strong>SKS</strong></td>
                                            <hr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                        <?php $no = 1 ?>
                                        <?php foreach ($krs as $key => $value) : ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++ ?></td>
                                                <td class="text-center"><?= $value->kode_matakuliah ?></td>
                                                <td class="text-center"><?= $value->nama_matakuliah ?></td>
                                                <td class="text-center"><?= $value->sks ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>