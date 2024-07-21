<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ustadz</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper" style="min-height: 2171.6px;padding-left:20px">
        <h2>Edit Ustadz</h2>
        <form method="post" action="<?= base_url('ustadz/edit/' . $ustadz['id_guru']) ?>">
            <div class="form-group">
                <label for="Nama_guru">Nama Guru:</label>
                <input type="text" id="Nama_guru" name="Nama_guru" class="form-control" value="<?= $ustadz['Nama_guru'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" class="form-control" value="<?= $ustadz['Email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="Password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Jenis_kelamin">Jenis Kelamin:</label>
                <select name="Jenis_kelamin" id="Jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki" <?= $ustadz['Jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $ustadz['Jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Hak_akses">Hak Akses:</label>
                <input type="text" id="Hak_akses" name="Hak_akses" class="form-control" value="<?= $ustadz['Hak_akses'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</body>

</html>
