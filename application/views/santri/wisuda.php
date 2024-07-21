<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <title>Laporan Wisuda</title>
</head>

<body class="hold-transition sidebar-mini" >
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <div class="container mt-5">
                <br>
                <div class="card" >

                    <div class="card-header" >
                        <h3>Laporan Wisuda</h3>
                        <form method="get" action="<?php echo base_url('santri/wisuda'); ?>">
                            <div class="form-group">
                                <label for="periode">Pilih Periode</label>
                                <select name="periode_id" id="periode" class="form-control">
                                    <option value="">-- Pilih Periode --</option>
                                    <?php foreach ($periode as $p): ?>
                                        <option value="<?php echo $p['id_periode']; ?>" <?php echo ($selected_periode == $p['id_periode']) ? 'selected' : ''; ?>>
                                            <?php echo $p['tahun_ajar'] ; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lihat</button>                                                        

                        </form>
                        <form method="get" action="<?php echo base_url('santri/cetak_wisuda'); ?>">
                            <div class="form-group">
                                <label for="periode">Pilih Periode</label>
                                <select name="periode_id" id="periode" class="form-control">
                                    <option value="">-- Pilih Periode --</option>
                                    <?php foreach ($periode as $p): ?>
                                        <option value="<?php echo $p['id_periode']; ?>" <?php echo ($selected_periode == $p['id_periode']) ? 'selected' : ''; ?>>
                                            <?php echo $p['tahun_ajar'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger">CETAK</button>                                                        

                        </form>
                    </div>


                    <div class="card-body">
                        <?php if (!empty($wisuda_by_juz)): ?>
                            <?php foreach ($wisuda_by_juz as $juz => $santri_list): ?>
                                <h4>Santri dengan Juz <?php echo $juz; ?></h4>
                                <table class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:15%">NIS</th>
                                            <th style="width:25%">Nama</th>
                                            <th style="width:20%">Juz Tercapai</th>
                                            <th style="width:20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($santri_list)): ?>
                                            <?php foreach ($santri_list as $santri): ?>
                                                <tr>
                                                    <td><?php echo $santri->nisn; ?></td>
                                                    <td><?php echo $santri->Nama_siswa; ?></td>
                                                    <td><?php echo $santri->max_juz; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('santri/detail/' . $santri->nisn); ?>" class="btn btn-info">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4">Tidak ada data untuk periode ini.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Pilih periode untuk melihat data wisuda.</p>
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
