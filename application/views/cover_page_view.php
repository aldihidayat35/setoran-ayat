<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hafalan Qur'an</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            text-align: center;
        }

        .cover-page {
            margin-top: 100px;
        }

        .cover-page img {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .cover-page h1, .cover-page h2, .cover-page h3 {
            margin: 10px 0;
        }

        .cover-page .info {
            margin-top: 50px;
            font-size: 1.2em;
        }

        .cover-page .info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="cover-page">
        <img src="<?php echo base_url('path_to_your_logo.png'); ?>" alt="Logo">
        <h1>YAYASAN</h1>
        <h2>PESANTREN MODERN DAAR AL - ULUUM ASAHAN</h2>
        <h3>LAPORAN HAFALAN QUR'AN</h3>
        <h3>MADRASAH ALIYAH (PKU)</h3>
        <div class="info">
            <p>Nama: <?php echo $santri->Nama_siswa; ?></p>
            <p>Kelas: <?php echo $santri->kelas; ?></p>
        </div>
        <div class="info address">
            <p>Jalan Mahoni (Sibogat) Kisaran Barat</p>
            <p>Kelurahan Mekar Baru Kecamatan Kota Kisaran Barat</p>
            <p>Kabupaten Asahan - Sumatera Utara</p>
        </div>
    </div>
</body>
</html>
