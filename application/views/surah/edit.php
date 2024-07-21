<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surah</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper" style="min-height: 2171.6px;padding-left:20px">
        <h2>Edit Surah</h2>
        <form method="post" action="<?= base_url('surah/edit/' . $surah['id_surah']) ?>">
            <div class="form-group">
                <label for="nama_surah">Nama Surah:</label>
                <input type="text" id="nama_surah" name="nama_surah" class="form-control" value="<?= $surah['nama_surah'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_surah">Nomor Surah:</label>
                <input type="number" id="nomor_surah" name="nomor_surah" class="form-control" value="<?= $surah['nomor_surah'] ?>" required>
            </div>
            <div class="form-group">
                <label for="total_ayat">Total Ayat:</label>
                <input type="number" id="total_ayat" name="total_ayat" class="form-control" value="<?= $surah['total_ayat'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</body>

</html>
