<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Setoran</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px; padding-left: 20px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Setoran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Edit Setoran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?= base_url('setoran/update/' . $setoran['Id_setoran']); ?>">
                            <div class="form-group">
                                <label for="nisn">Nama Siswa</label>
                                <select name="nisn" class="form-control">
                                    <?php foreach ($siswa as $s): ?>
                                    <option value="<?= $s['nisn']; ?>"
                                        <?= $s['nisn'] == $setoran['nisn'] ? 'selected' : ''; ?>>
                                        <?= $s['Nama_siswa']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Id_Surah">Nama Surah:</label>
                                <select id="Id_Surah" name="Id_Surah" class="form-control" required>
                                    <?php foreach ($surah as $s): ?>
                                    <option value="<?= $s['id_surah']; ?>"
                                        <?= $s['id_surah'] == $setoran['Id_Surah'] ? 'selected' : ''; ?>>
                                        <?= $s['nama_surah']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Setor_dari">Setor Dari:</label>
                                <input type="text" id="Setor_dari" name="Setor_dari" class="form-control"
                                    value="<?= $setoran['Setor_dari']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Setor_sampai">Setor Sampai:</label>
                                <input type="text" id="Setor_sampai" name="Setor_sampai" class="form-control"
                                    value="<?= $setoran['Setor_sampai']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="Juz">Juz:</label>
                                <input type="text" id="Juz" name="Juz" class="form-control"
                                    value="<?= $setoran['Juz']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Id_guru">Nama Guru:</label>
                                <select id="Id_guru" name="Id_guru" class="form-control" required>
                                    <?php foreach ($guru as $g): ?>
                                    <option value="<?= $g['id_guru']; ?>"
                                        <?= $g['id_guru'] == $setoran['Id_guru'] ? 'selected' : ''; ?>>
                                        <?= $g['Nama_guru']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_setor">Tanggal Setor</label>
                                <input type="date" name="tanggal_setor" class="form-control"
                                    value="<?= $setoran['tanggal_setor']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <select id="keterangan" name="keterangan" class="form-control" required>
                                    <option value="Rasib">Rasib</option>
                                    <option value="Maqbul">Maqbul</option>
                                    <option value="Jayyid">Jayyid</option>
                                    <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                                    <option value="Mumtaz">Mumtaz</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
</body>

</html>