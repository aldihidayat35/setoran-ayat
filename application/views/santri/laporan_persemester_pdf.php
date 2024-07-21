<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Per Semester</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Setoran Per Semester</h2>
    <table>
        <thead>
            <tr>
                <th>Nama siswa</th>
                <th>NIS</th>
                <th>Setoran Terakhir (Juz)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan_santri as $s): ?>
                <tr>
                    <td><?php echo $s->Nama_siswa; ?></td>
                    <td><?php echo $s->nisn; ?></td>
                    <td><?php echo $s->setoran_terakhir; ?></td>
                    <td><?php echo $s->status; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
