<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Setoran</title>
</head>

<body>
    <h1 style="text-transform: uppercase;">Laporan Setoran</h1>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr align="center">
                <th>Nama Siswa</th>
                <th>Surah</th>
                <th>Setor Dari</th>
                <th>Setor Sampai</th>
                <th>Juz</th>
                <th>Nama Guru</th>
                <th>Tanggal Setor</th>
                <th>periode</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($setoran as $s): ?>
            <tr>
                <td><?= $s['Nama_siswa'] ?></td>
                <td><?= $s['nama_surah'] ?></td>
                <td><?= $s['Setor_dari'] ?></td>
                <td><?= $s['Setor_sampai'] ?></td>
                <td><?= $s['Juz'] ?></td>
                <td><?= $s['Nama_guru'] ?></td>
                <td><?= date('d-m-Y', strtotime($s['tanggal_setor'])) ?></td>
                <td><?= $s['tahun_ajar'] ?></td>
                <td><?= $s['keterangan'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
