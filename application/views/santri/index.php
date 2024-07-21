<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <title>siswa List</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 2171.6px;">
            <div class="container mt-2">
                <div class="card-header">
                    <h2><b>Detail Setoran siswa</b> </h2>
                    <h5> </h5>
                </div>
                <div class="row mb-3" style="padding-top:10px">
            
                    <div class="col-md-12">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Nama siswa...">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php foreach($santri as $s): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5><strong>Nama :</strong> <?php echo $s->Nama_siswa; ?></h5>
                                <p class="card-text"> <strong>NIS :</strong> <?php echo $s->nisn; ?></p>
                                <a href="<?php echo base_url('santri/detail/'.$s->nisn); ?>"
                                    class="btn btn-primary">Lihat Detail</a>
                                <a href="<?php echo base_url('santri/cetak/'.$s->nisn); ?>"
                                    class="btn btn-warning">Cetak Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        // Fungsi pencarian dinamis
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.card').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>

</html>