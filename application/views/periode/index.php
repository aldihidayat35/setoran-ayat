<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Periode</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Daftar Periode</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Periode</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Periode</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('periode/create') ?>" class="btn btn-primary btn-sm">Tambah Periode</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>Tahun Ajar</th>
                                    <!-- <th>Semester</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($periode as $p): ?>
                                <tr>
                                    <td align="center"><?= $p['tahun_ajar'] ?></td>
                                    <!-- <td><?= $p['semester'] ?></td> -->
                                    <td align="center">
                                        <a href="<?= base_url('periode/edit/' . $p['id_periode']) ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('periode/delete/' . $p['id_periode']) ?>"
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
        <footer class="main-footer"></footer>
    </div>

    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script>
    $(function() {
        $('#example').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>
