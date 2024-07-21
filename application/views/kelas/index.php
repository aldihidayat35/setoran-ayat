<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
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
                            <h1>Daftar Kelas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Kelas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kelas</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('kelas/create') ?>" class="btn btn-primary btn-sm">Tambah Kelas</a>
                            <a href="<?= base_url('kelas/cetak_pdf') ?>" class="btn btn-danger btn-sm">Cetak PDF</a>
                        </div>
                        </div>
                        <div class="card-body" id="example1_wrapper">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th>ID Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Jumlah Siswa</th> <!-- Kolom baru -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kelas as $k): ?>
                                    <tr>
                                        <td align="center"><?= $k['Id_kelas'] ?></td>
                                        <td><?= $k['Nama_kelas'] ?></td>
                                        <td><?= $k['Wali_kelas'] ?></td>
                                        <td align="center"><?= $k['jumlah_siswa'] ?></td> <!-- Data jumlah siswa -->
                                        <td align="center">
                                            <a href="<?= base_url('kelas/edit/' . $k['Id_kelas']) ?>"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('kelas/delete/' . $k['Id_kelas']) ?>"
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
    $(function() {
        $('#example').DataTable({
            destroy: true, // Menambahkan opsi destroy
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>