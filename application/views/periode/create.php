<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Periode</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper" style="min-height: 2171.6px;padding-left:20px">
        <h2>Tambah Periode</h2>
        <form method="post" action="<?= base_url('periode/create'); ?>">
            <div class="form-group">
                <label for="tahun_ajar">Tahun Ajar:</label>
                <input type="text" id="tahun_ajar" name="tahun_ajar" class="form-control" placeholder=" Contoh : 2024/2025 Ganjil" required>
            </div>

            <!-- <div class="form-group">
                <label for="semester">Semester</label>
                <select class="form-control" id="semester" name="semester" required>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
</body>

</html>