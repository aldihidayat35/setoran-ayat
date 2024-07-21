<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datatables.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/datatables.min.js'); ?>"></script>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <table id="laporanWisudaTable" class="display">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Total Juz</th>
                    <th>Tahun Ajar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wisuda as $row) { ?>
                    <tr>
                        <td><?php echo $row['nisn']; ?></td>
                        <td><?php echo $row['Nama_siswa']; ?></td>
                        <td><?php echo $row['total_juz']; ?></td>
                        <td><?php echo $row['tahun_ajar']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#laporanWisudaTable').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#laporanWisudaTable_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>
