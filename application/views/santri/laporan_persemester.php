<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <title>Laporan Per Semester</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <div class="container mt-2"><br>
                <div class="card" style="padding:30px">
                    <div class="card-header">
                        <h2><b>Laporan Setoran Per Semester</b></h2>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form method="get" action="<?php echo base_url('santri/laporan_persemester'); ?>">
                                <div class="form-group">
                                    <label for="periode">Pilih Periode</label>
                                    <select name="periode_id" id="periode" class="form-control">
                                        <option value="">-- Pilih Periode --</option>
                                        <?php foreach ($periode as $p): ?>
                                        <option value="<?php echo $p['id_periode']; ?>"
                                            <?php echo ($selected_periode == $p['id_periode']) ? 'selected' : ''; ?>>
                                            <?php echo $p['tahun_ajar']  ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Pilih Kelas</label>
                                    <select name="kelas_id" id="kelas" class="form-control">
                                        <option value="">-- Pilih Kelas --</option>
                                        <?php foreach ($kelas as $k): ?>
                                        <option value="<?php echo $k['Id_kelas']; ?>"
                                            <?php echo ($selected_kelas == $k['Id_kelas']) ? 'selected' : ''; ?>>
                                            <?php echo $k['Nama_kelas']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form method="get" action="<?php echo base_url('santri/cetak_laporan_persemester'); ?>">
                                <div class="form-group">
                                    <label for="periode">Pilih Periode</label>
                                    <select name="periode_id" id="periode" class="form-control">
                                        <option value="">-- Pilih Periode --</option>
                                        <?php foreach ($periode as $p): ?>
                                        <option value="<?php echo $p['id_periode']; ?>"
                                            <?php echo ($selected_periode == $p['id_periode']) ? 'selected' : ''; ?>>
                                            <?php echo $p['tahun_ajar']  ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Pilih Kelas</label>
                                    <select name="kelas_id" id="kelas" class="form-control">
                                        <option value="">-- Pilih Kelas --</option>
                                        <?php foreach ($kelas as $k): ?>
                                        <option value="<?php echo $k['Id_kelas']; ?>"
                                            <?php echo ($selected_kelas == $k['Id_kelas']) ? 'selected' : ''; ?>>
                                            <?php echo $k['Nama_kelas']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">cetak</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama siswa</th>
                                    <th>NIS</th>
                                    <th>Setoran Terakhir (Juz)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan_santri as $s): ?>
                                <tr>
                                    <td><?php echo $s->Nama_siswa; ?></td>
                                    <td><?php echo $s->nisn; ?></td>
                                    <td><?php echo $s->setoran_terakhir; ?></td>
                                    <td><?php echo $s->status; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>                </div>

            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>