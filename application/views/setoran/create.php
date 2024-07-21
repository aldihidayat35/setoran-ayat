<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Setoran</title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper" style="min-height: 2171.6px;padding-left:20px">

        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>
        <h2>Tambah Setoran</h2>
        <form method="post" action="<?= base_url('setoran/store'); ?>">


            <div class="form-group">
                <label for="siswa">Siswa</label>
                <select name="Nisn" id="siswa" class="form-control">
                    <option value="">Pilih Siswa</option>
                    <?php foreach ($siswa as $s): ?>
                    <option value="<?= $s['nisn'] ?>"><?= $s['Nama_siswa'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Id_Surah">Nama Surah:</label>
                <select id="Id_Surah" name="Id_Surah" class="form-control" required>
                    <?php foreach ($surah as $s): ?>
                    <option value="<?= $s['id_surah']; ?>"><?= $s['nama_surah']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Setor_dari">Setor Dari:</label>
                <input type="text" id="Setor_dari" name="Setor_dari" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Setor_sampai">Setor Sampai:</label>
                <input type="text" id="Setor_sampai" name="Setor_sampai" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Juz">Juz:</label>
                <input type="text" id="Juz" name="Juz" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Id_guru">Nama Guru:</label>
                <select id="Id_guru" name="Id_guru" class="form-control" required>
                    <?php foreach ($guru as $g): ?>
                    <option value="<?= $g['id_guru']; ?>"><?= $g['Nama_guru']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_periode">Periode:</label>
                <select id="id_periode" name="id_periode" class="form-control" required>
                    <?php foreach ($periode as $g): ?>
                    <option value="<?= $g['id_periode']; ?>"><?= $g['tahun_ajar']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- otomatis -->
            <div class="form-group">
                <label for="tanggal_setor">Tanggal Setor</label>
                <input type="date" name="tanggal_setor" id="tanggal_setor" class="form-control"
                    value="<?= date('Y-m-d'); ?>" required>
            </div>

            <!-- manual -->

            <!-- <div class="form-group">
                <label for="tanggal_setor">Tanggal Setor</label>
                <input type="date" name="tanggal_setor" class="form-control" value="<?= set_value('tanggal_setor'); ?>">
            </div> -->

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <select id="keterangan" name="keterangan" class="form-control" required>
                    <option value="Rasib">Rasib</option>
                    <option value="Maqbul">Maqbul</option>
                    <option value="Jayyid">Jayyid</option>
                    <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                    <option value="Mumtaz">Mumtaz</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> <a href="javascript:history.back()"
                class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Script untuk mengisi otomatis tanggal -->
    <script>
    // Mendapatkan elemen input tanggal
    var tanggalSetorInput = document.getElementById('tanggal_setor');

    // Mendapatkan tanggal saat ini
    var today = new Date();

    // Mendapatkan tanggal, bulan, dan tahun saat ini
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    // Mengatur nilai elemen input tanggal dengan tanggal saat ini
    today = yyyy + '-' + mm + '-' + dd;
    tanggalSetorInput.value = today;
    </script>

</body>

</html>