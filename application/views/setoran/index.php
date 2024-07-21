<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Setoran</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Daftar Setoran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Setoran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Setoran</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('setoran/create') ?>" class="btn btn-primary btn-sm">Tambah
                                Setoran</a>
                        </div>
                    </div>
                    <div class="card-body" id="example1_wrapper">
                        <form method="POST" action="<?= base_url('setoran') ?>">
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <select name="month" id="month" class="form-control">
                                    <option value="">Pilih Bulan</option>
                                    <?php for ($m = 1; $m <= 12; $m++): ?>
                                    <option value="<?= $m ?>"><?= date('F', mktime(0, 0, 0, $m, 10)) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Pilih Tahun</option>
                                    <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                                    <option value="<?= $y ?>"><?= $y ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="<?= base_url('setoran/print?month=') ?>" id="print_pdf"
                                class="btn btn-secondary">Cetak PDF</a>
                        </form>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>Nama Siswa</th>
                                    <th>Surah</th>
                                    <th>Setor Dari</th>
                                    <th>Setor Sampai</th>
                                    <th>Juz</th>
                                    <th>Nama Guru</th>
                                    <th>Tanggal Setor</th>
                                    <th>Periode</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
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
                                    <td align="center">
                                        <a href="<?= base_url('setoran/edit/' . $s['Id_setoran']) ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('setoran/delete/' . $s['Id_setoran']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda yakin?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <!-- Footer content here -->
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content here -->
        </aside>
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
    <script>
    document.getElementById('print_pdf').onclick = function() {
        var month = document.getElementById('month').value;
        var year = document.getElementById('year').value;
        if (month && year) {
            this.href = "<?= base_url('setoran/print?month=') ?>" + month + "&year=" + year;
        } else {
            alert('Silakan pilih bulan dan tahun terlebih dahulu.');
            return false;
        }
    };
</script>
</body>

</html>