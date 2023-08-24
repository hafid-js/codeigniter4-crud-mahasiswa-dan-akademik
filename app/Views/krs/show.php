<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            height: 20px;
            margin: 8px;
        }
    </style>
</head>

<body>
    <div style="font-size:44px; color:'#dddddd'"><i>Invoice</i></div>
    <p>
        <i>Universitas Pro Energy</i><br>
        Jakarta, Indonesia
    </p>
    <hr>
    <p>
    <?php foreach ($mahasiswa as $key => $value) : ?>
        Nama : <?= $value->nama ?><br>
        Nim : <?= $value->nim ?><br>
        E-Mail : <?= $value->email_mahasiswa ?><br>
        Tanggal Dibuat : <?php echo date("d/m/Y") ?><br>
        <?php endforeach; ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>No</strong></th>
            <th><strong>KODE MATAKULIAH</strong></th>
            <th><strong>MATAKULIAH</strong></th>
            <th><strong>SKS</strong></th>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($krs as $key => $value) : ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?= $value->kode_matakuliah ?></td>
                <td class="text-center"><?= $value->nama_matakuliah ?></td>
                <td class="text-center"><?= $value->sks ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>


