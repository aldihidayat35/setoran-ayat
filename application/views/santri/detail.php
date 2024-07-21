<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <title>Detail Setoran Santri</title>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <div class="container mt-5">
                <div class="card" id="printContainer">
                    <div class="card-header">
                        <h2><center>Detail Setoran siswa</center></h2>
                        <h5><?php echo $santri->Nama_siswa; ?><br> (NIS: <?php echo $santri->nisn; ?>)</h5><br>
                        <h5 style="color:red"><?php echo $status_kelulusan; ?></h3>
                    </div>
                    <div class="card-body">
                        <div id="printTable">
                            <table class="table table-bordered table-striped" >
                                <thead>
                                    <tr>
                                        <th>Surah</th>
                                        <th>Setor Dari - sampai</th>
                                        <th>Juz</th>
                                        <th>Tanggal</th>
                                        <th>Nama Guru</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($setoran as $s): ?>
                                    <tr>
                                        <td><?php echo $s->nama_surah; ?></td>
                                        <td><?php echo $s->Setor_dari; ?> - <?php echo $s->Setor_sampai; ?></td>
                                        <td><?php echo $s->Juz; ?></td>
                                        <td><?php echo $s->tanggal_setor; ?></td>
                                        <td><?php echo $s->Nama_guru; ?></td>
                                        <td><?php echo $s->keterangan; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>
