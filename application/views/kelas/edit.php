<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper" style="min-height: 2171.6px;padding-left:20px">
        <h2>Edit Kelas</h2>
        <form method="post" action="<?= base_url('kelas/edit/' . $kelas['Id_kelas']); ?>">
            <div class="form-group">
                <label for="Nama_kelas">Nama Kelas:</label>
                <input type="text" id="Nama_kelas" name="Nama_kelas" class="form-control" value="<?= $kelas['Nama_kelas']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Wali_kelas">Wali Kelas:</label>
                <input type="text" id="Wali_kelas" name="Wali_kelas" class="form-control" value="<?= $kelas['Wali_kelas']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
</body>

</html>
