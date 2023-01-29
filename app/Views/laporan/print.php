<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
    #detail {
        border-collapse: collapse;
        width: 100%;
    }

    #detail th,
    td {
        text-align: left;
        padding: 8px;
    }

    #detail tr:nth-child(even) {
        background-color: #f2f2f2
    }

    #detail th {
        background-color: #696CFF;
        color: white;
    }
    </style>
</head>

<body>
    <div class="header" style="text-align: center; margin-top: -50px;">
        <h1 style="margin-bottom: -20px;">Kecamatan Kandeman</h1>
        <h2 style="margin-bottom: 5px;">Kabupaten Batang</h2>
        <small>Jl. Slamet Riyadi No.05, Kauman, Kec. Batang, Kabupaten Batang, Jawa Tengah 51215</small>
        <hr>
    </div>
    <div id="keterangan" style="margin-bottom: 50px;">
        <h3 style="text-align: center; margin-bottom: 5px;">Program Bantuan <?= $seleksiHeader['nama']; ?></h3>
        <p style="text-align: center; margin-bottom: 5px;">Kuota Bantuan <?= $seleksiHeader['kuota']; ?> Orang</p>
    </div>
    <table id="detail">
        <thead>
            <tr>
                <th width="5%">Alternatif</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seleksiDetail as $key => $seleksi) : ?>
            <tr>
                <td>V-<?= $seleksi['id_pendaftar']; ?></td>
                <td><?= $seleksi['nama']; ?></td>
                <td><?= number_format($seleksi['nilai'], 3); ?></td>
                <td><?= $seleksi['penerima'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>