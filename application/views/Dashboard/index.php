<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets2/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
    }

    .header-section {
        width: 3000px;

        background-color: white;
        color: #3DC2EC;
        padding: 30px;
        padding-left: 250px;
        margin-left: -1000px;
        display: flex;
        align-items: center;
    }

    .header-section img {
        width: 100px;
    }

    .header-section div {
        margin-left: 20px;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .data-section .card:nth-child(1) {
        background-color: #36BA98;
    }

    .data-section .card:nth-child(2) {
        background-color: #4C3BCF;
    }

    .data-section .card:nth-child(3) {
        background-color: #99ff99;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .table th,
    .table td {
        white-space: nowrap;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper" style="background-color: #3DC2EC;min-height: 2171.6px;">
            <div class="container">
                <div class="row header-section">
                    <div>
                        <center><img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo">
                            <h1><b>SISTEM SETORAN HAFALAN QUR'AN test</b></h1>
                            <h2>PESANTREN MODERN DAAR AL-ULUUM ASAHAN test</h2>
                        </center>
                    </div>
                </div>
                <br><br>
                <div class="row data-section">
                    <div class="col-lg-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-people-fill" style="font-size: 2rem; margin-right: 10px;"></i>
                                    <div>
                                        <h5 class="card-title"><b>Jumlah Siswa</b></h5>
                                        <h2 class="card-text"><?= $jumlah_siswa; ?> siswa</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-mortarboard-fill" style="font-size: 2rem; margin-right: 10px;"></i>
                                    <div>
                                        <h5 class="card-title"><b>Jumlah Siswa Wisuda</b></h5>
                                        <h2 class="card-text"><?= $jumlah_siswa_wisuda; ?> siswa</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-badge-fill" style="font-size: 2rem; margin-right: 10px;"></i>
                                    <div>
                                        <h5 class="card-title"><b>Jumlah Guru</b></h5>
                                        <h2 class="card-text"><?= $jumlah_guru; ?> guru</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Wisudawan per Periode</h5>
                                <canvas id="barChart" style="height: 100px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    var ctx = document.getElementById('barChart').getContext('2d');
                                    var barChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: <?= json_encode(array_column($wisudawan_per_periode, 'tahun_ajar')); ?>,
                                            datasets: [{
                                                label: 'Jumlah Wisudawan',
                                                data: <?= json_encode(array_column($wisudawan_per_periode, 'jumlah_wisudawan')); ?>,
                                                backgroundColor: 'rgba(54, 162, 235, 0.9)',
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                borderWidth: 2
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    ticks: {
                                                        stepSize: 1, // Set the step size to 1
                                                        callback: function(value) {
                                                            if (Number.isInteger(value)) {
                                                                return value; // Only return integer values
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    });
                                });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h5 class="card-title">Grafik Jumlah Setoran Per Bulan</h5>
                                    <canvas id="setoranChart" style="height: 100px;"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Siswa</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Juz</th>
                                                <th>Tanggal Setoran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach ($setoran_terbaru as $setoran): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $setoran->Nama_siswa; ?></td>
                                                <td><?= $setoran->juz; ?></td>
                                                <td><?= date('d-m-Y', strtotime($setoran->tanggal_setor)); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title"><br>Siswa Tercapai vs Tidak Tercapai</h5>

                                    <div class="col-lg-12">

                                        <div class="card">
                                            <div class="card-body">
                                                <form method="get" action="">
                                                    <div class="row">
                                                        <h5 class="card-title">Filter Kelas</h5><br>

                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <select name="kelas_id" class="form-control">
                                                                    <option value="">Pilih Kelas</option>
                                                                    <?php foreach ($kelas_list as $kelas): ?>
                                                                    <option value="<?= $kelas['Id_kelas']; ?>"
                                                                        <?= $selected_kelas == $kelas['Id_kelas'] ? 'selected' : ''; ?>>
                                                                        <?= $kelas['Nama_kelas']; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button type="submit"
                                                                class="btn btn-primary">Filter</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Pie Chart Container -->
                                <canvas id="pieChart" style="height: 50px;"></canvas>
                                <div id="chartInfo">
                                    <p>
                                        <center>Tercapai: <?= number_format($persentase_tercapai, 2) ?>% || Tidak
                                            Tercapai: <?= number_format($persentase_tidak_tercapai, 2) ?>%</center>
                                    </p>

                                </div>

                                <!-- Other dashboard contents -->

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script>
                                const ctx = document.getElementById('pieChart').getContext('2d');
                                const pieChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ['Tercapai', 'Tidak Tercapai'],
                                        datasets: [{
                                            data: [<?= $siswa_tercapai ?>,
                                                <?= $siswa_tidak_tercapai ?>
                                            ],
                                            backgroundColor: ['#36A2EB', '#FF6384']
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            tooltip: {
                                                callbacks: {
                                                    label: function(context) {
                                                        let label = context.label || '';
                                                        if (label) {
                                                            label += ': ';
                                                        }
                                                        label += context.raw;
                                                        return label;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('setoranChart').getContext('2d');

        // Data dari PHP
        var setoranBulanan = <?php echo json_encode($setoran_bulanan); ?>;
        var labels = setoranBulanan.map(function(item) {
            return item.month + '-' + item.year;
        });
        var data = setoranBulanan.map(function(item) {
            return item.total;
        });

        var setoranChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Setoran',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>
    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/quill/quill.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url(); ?>assets2/vendor/php-email-form/validate.js"></script>
</body>

</html>