<style>
/* Styling sidebar */
.main-sidebar {
    transition: width 0.3s ease;
    overflow: hidden;
}

/* Styling sidebar menu items */
.nav-sidebar .nav-link {
    transition: background-color 0.3s ease;
    border-radius: 0.375rem;
}

.nav-sidebar .nav-link:hover {
    background-color: #4a4a4a;
}

/* Styling sidebar menu icon */
.nav-sidebar .nav-link .nav-icon {
    transition: transform 0.3s ease;
}

.nav-sidebar .nav-link:hover .nav-icon {
    transform: scale(1.2);
}

/* Styling sidebar user panel */
.user-panel .image:hover img {
    transform: scale(1.1);
}

.sidebar .nav-item .nav-link.active {
    background-color: #343a40;
    color: white;
    
}

/* Styling for laporan items */
.nav-laporan {
    background-color: #28a745; /* Green background */
    color: white;  
    
  
}
.nav-laporan .nav-link {
    color: white;
}
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <center><img src="<?= base_url('assets/img/logo.png'); ?>" class="img-circle elevation-2" alt="User Image"></center>
            </div>
            <br>
            <div class="info">
                <a href="<?php echo base_url();?>Dashboard" class="d-block"><b style="font-size: 16px;">SISTEM SETORAN<br> HAFALAN QUR'AN</b></a>
            </div>
        </div>

        <hr class="m-2" style="border-top: 1px solid white;"> <!-- Garis putih untuk memisahkan -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php $level = $this->session->userdata('Hak_akses'); ?>

                <li class="nav-item">
                    <a href="<?php echo base_url();?>Dashboard" class="nav-link">
                        <i class="nav-icon fas ri-airplay-fill fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Dashboard</p>
                    </a>
                </li>

                <?php if ($level == 'admin'): ?>
                <hr class="m-2" style="border-top: 1px solid white;"> <!-- Garis putih untuk memisahkan -->

                <li class="nav-item">
                    <a href="<?php echo base_url();?>Periode" class="nav-link">
                        <i class="nav-icon fas fa-calendar fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Data Periode</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>kelas" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Data Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>surah" class="nav-link">
                        <i class="nav-icon fas fa-book fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Data Surah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>siswa" class="nav-link">
                        <i class="nav-icon fas fa-users fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Data Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>ustadz" class="nav-link">
                        <i class="nav-icon fas fa-mosque fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Data Ustadz</p>
                    </a>
                </li>

                <hr class="m-2" style="border-top: 1px solid white;"> <!-- Garis putih untuk memisahkan -->

                <?php endif; ?>

                <?php if ($level == 'admin'): ?>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>setoran/create" class="nav-link">
                        <i class="nav-icon fas fa-clipboard fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Isi Setoran</p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($level != 'siswa'): ?>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>setoran" class="nav-link">
                        <i class="nav-icon fas fa-book-reader fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Rekap Setoran</p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($level != 'siswa'): ?>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>santri" class="nav-link">
                        <i class="nav-icon fas fa-star fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Setoran siswa</p>
                    </a>
                </li>
                <?php endif; ?>

                <hr class="m-2" style="border-top: 1px solid white;"> <!-- Garis putih untuk memisahkan -->

            
                <li class="nav-item nav-laporan">
                    <a href="<?php echo base_url('santri/wisuda'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Laporan Wisuda</p>
                    </a>
                </li>
                <li class="nav-item nav-laporan">
                    <a href="<?php echo base_url('santri/laporan_persemester'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Persemester</p>
                    </a>
                </li>

                <hr class="m-2" style="border-top: 1px solid white;"> <!-- Garis putih untuk memisahkan -->

                <li class="nav-item">
                    <a href="<?php echo base_url('login/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt fa-lg"></i>
                        <p class="font-weight-bold" style="font-size: 16px;">Keluar</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Include Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
