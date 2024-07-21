<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <title>Laporan Periode</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Laporan Periode</h3>
                        <form method="get" action="<?php echo base_url('santri/laporan_periode'); ?>">
                            <div class="form-group">
                                <label for="periode">Pilih Periode</label>
                                <select name="periode_id" id="periode" class="form-control">
                                    <option value="">-- Pilih Periode --</option>
                                    <?php foreach ($periode as $p): ?>
                                        <option value="<?php echo $p['id_periode']; ?>" <?php echo ($selected_periode == $p['id_periode']) ? 'selected' : ''; ?>>
                                            <?php echo $p['tahun_ajar'] . ' - ' . $p['semester']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($santri_setoran)): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Total Juz</th>
                                        <th>Status Kelulusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($santri_setoran as $santri): ?>
                                        <tr>
                                            <td><?php echo $santri->nisn; ?></td>
                                            <td><?php echo $santri->Nama_siswa; ?></td>
                                            <td><?php echo $santri->total_juz; ?></td>
                                            <td><?php echo $santri->status_kelulusan; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('santri/detail/' . $santri->nisn . '/' . $selected_periode); ?>" class="btn btn-info">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Pilih periode untuk melihat laporan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
