<?php
// Memastikan script ini diakses melalui CodeIgniter, tidak secara langsung
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi kelas 'Santri' yang merupakan turunan dari CI_Controller
class Santri extends CI_Controller {

    // Konstruktor untuk kelas Santri
    public function __construct() {
        // Memanggil konstruktor dari kelas induk CI_Controller
        parent::__construct();
        // Memuat model Santri_model
        $this->load->model('Santri_model');
        // Memuat model Setoran_model
        $this->load->model('Setoran_model');
        // Memuat model Periode_model
        $this->load->model('Periode_model');
        // Memuat model Kelas_model
        $this->load->model('Kelas_model');
    }

    // Fungsi untuk menampilkan halaman index
    public function index() {
        // Mendapatkan semua data santri dari model
        $data['santri'] = $this->Santri_model->get_all_santri();
        // Menyiapkan judul halaman
        $data['title'] = 'Master Kelas';

        // Memuat view header dengan data yang telah disiapkan
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view top menu
        $this->load->view('layout/menu/top', $data);
        // Memuat view left menu
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama untuk halaman index
        $this->load->view('santri/index', $data);
        // Memuat view footer
        $this->load->view('layout/footer/footer-datatables', $data);
    }

    // Fungsi untuk menampilkan detail santri berdasarkan NISN
    public function detail($nisn) {
        // Mendapatkan data santri berdasarkan NISN
        $data['santri'] = $this->Santri_model->get_santri_by_nisn($nisn);
        // Mendapatkan data setoran santri berdasarkan NISN
        $data['setoran'] = $this->Setoran_model->get_setoran_by_nisn($nisn);
        // Menyiapkan judul halaman
        $data['title'] = 'Detail Setoran Santri ';
    
        // Menentukan status kelulusan berdasarkan data setoran
        $max_juz = 0;
        $setoran_terakhir = 0;
        // Iterasi melalui data setoran untuk menemukan Juz terbesar dan setoran terakhir
        foreach ($data['setoran'] as $setoran) {
            if ($setoran->Juz > $max_juz) {
                $max_juz = $setoran->Juz;
            }
            if ($setoran->Id_setoran > $setoran_terakhir) {
                $setoran_terakhir = $setoran->Id_setoran;
            }
        }
    
        // Menentukan status kelulusan berdasarkan Juz terbesar
        $data['status_kelulusan'] = ' Status = Tidak Lulus <br> Nb:Wajib menyetorkan hafalan al-quran yang belum di tuntaskan setelah kembali ke pesantren ';
        if (in_array($max_juz, [4,7, 10, 13, 16, 19, 22, 25, 30])) {
            $data['status_kelulusan'] = 'Lulus';
        }
    
        // Memuat view header dengan data yang telah disiapkan
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view top menu
        $this->load->view('layout/menu/top', $data);
        // Memuat view left menu
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama untuk halaman detail santri
        $this->load->view('santri/detail', $data);
        // Memuat view footer
        $this->load->view('layout/footer/footer-datatables', $data);
    }
    

    // Fungsi untuk menampilkan detail santri berdasarkan NISN
    public function cetak($nisn) {
        // Mendapatkan data santri berdasarkan NISN
        $data['santri'] = $this->Santri_model->get_santri_by_nisn($nisn);
        // Mendapatkan data setoran santri berdasarkan NISN
        $data['setoran'] = $this->Setoran_model->get_setoran_by_nisn($nisn);
        // Menyiapkan judul halaman
        $data['title'] = 'Detail Setoran Santri ';
    
        // Menentukan status kelulusan berdasarkan data setoran
        $max_juz = 0;
        $setoran_terakhir = 0;
        // Iterasi melalui data setoran untuk menemukan Juz terbesar dan setoran terakhir
        foreach ($data['setoran'] as $setoran) {
            if ($setoran->Juz > $max_juz) {
                $max_juz = $setoran->Juz;
            }
            if ($setoran->Id_setoran > $setoran_terakhir) {
                $setoran_terakhir = $setoran->Id_setoran;
            }
        }
    
        // Menentukan status kelulusan berdasarkan Juz terbesar
        $data['status_kelulusan'] = ' Status = Tidak Lulus <br> Nb:Wajib menyetorkan hafalan al-quran yang belum di tuntaskan setelah kembali ke pesantren ';
        if (in_array($max_juz, [4,7, 10, 13, 16, 19, 22, 25, 30])) {
            $data['status_kelulusan'] = 'Lulus';
        }
    
        $html = $this->load->view('santri/cetak', $data, true);
        pdf_create($html, 'Daftar_Kelas');

        
    }
    // Fungsi untuk menampilkan laporan per semester
    public function laporan_persemester() {
        // Mendapatkan ID periode dan kelas dari parameter GET
        $periode_id = $this->input->get('periode_id');
        $kelas_id = $this->input->get('kelas_id');
        
        // Menyiapkan judul halaman
        $data['title'] = 'Laporan Per Semester';
        // Mendapatkan semua data periode
        $data['periode'] = $this->Periode_model->get_all_periode();
        // Mendapatkan semua data kelas
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        // Menyimpan periode dan kelas yang dipilih
        $data['selected_periode'] = $periode_id;
        $data['selected_kelas'] = $kelas_id;
        
        // Jika periode atau kelas dipilih, mendapatkan laporan santri berdasarkan periode dan kelas
        if ($periode_id || $kelas_id) {
            $data['laporan_santri'] = $this->Santri_model->get_laporan_persemester($periode_id, $kelas_id);
        
            // Menentukan status pencapaian santri berdasarkan Juz
            foreach ($data['laporan_santri'] as &$santri) {
                $juz = $santri->max_juz;
                $santri->status = 'Tidak Tercapai';
        
                if (in_array($juz, [4,7, 10, 13, 16, 19, 22, 25, 30])) {
                    $santri->status = 'Tercapai';
                }
            }
        } else {
            // Jika tidak ada periode atau kelas yang dipilih, data laporan santri kosong
            $data['laporan_santri'] = [];
        }
        
        // Memuat view header dengan data yang telah disiapkan
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view top menu
        $this->load->view('layout/menu/top', $data);
        // Memuat view left menu
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama untuk halaman laporan per semester
        $this->load->view('santri/laporan_persemester', $data);
        // Memuat view footer
        $this->load->view('layout/footer/footer-datatables', $data);
    }
    // Fungsi untuk menampilkan laporan per semester
    public function cetak_laporan_persemester() {
        // Mendapatkan ID periode dan kelas dari parameter GET
        $periode_id = $this->input->get('periode_id');
        $kelas_id = $this->input->get('kelas_id');
        
        // Menyiapkan judul halaman
        $data['title'] = 'Laporan Per Semester';
        // Mendapatkan semua data periode
        $data['periode'] = $this->Periode_model->get_all_periode();
        // Mendapatkan semua data kelas
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        // Menyimpan periode dan kelas yang dipilih
        $data['selected_periode'] = $periode_id;
        $data['selected_kelas'] = $kelas_id;
        
        // Jika periode atau kelas dipilih, mendapatkan laporan santri berdasarkan periode dan kelas
        if ($periode_id || $kelas_id) {
            $data['laporan_santri'] = $this->Santri_model->get_laporan_persemester($periode_id, $kelas_id);
            // Mendapatkan nama periode yang dipilih
            $data['periode_nama'] = $this->Periode_model->get_periode_name_by_id($periode_id);
            // Menentukan status pencapaian santri berdasarkan Juz
            foreach ($data['laporan_santri'] as &$santri) {
                $juz = $santri->max_juz;
                $santri->status = 'Tidak Tercapai';
        
                if (in_array($juz, [3, 6, 9, 12, 15, 18, 21, 24, 27,30])) {
                    $santri->status = 'Tercapai';
                }
            }
        } else {
            // Jika tidak ada periode yang dipilih, data wisuda kosong
            $data['wisuda_by_juz'] = [];
            $data['tahun_ajar'] = '';
        }
        
 
        $html = $this->load->view('santri/cetak_laporan_persemester', $data, true);
        pdf_create($html, 'laporan_persemester');


    }
    // Fungsi untuk menampilkan laporan wisuda berdasarkan periode
    public function wisuda() {
        // Mendapatkan ID periode dari parameter GET
        $periode_id = $this->input->get('periode_id');

        // Menyiapkan judul halaman
        $data['title'] = 'Laporan Wisuda';
        // Mendapatkan semua data periode
        $data['periode'] = $this->Periode_model->get_all_periode();
        // Menyimpan periode yang dipilih
        $data['selected_periode'] = $periode_id;

        // Jika periode dipilih, mendapatkan data wisuda santri berdasarkan periode
        if ($periode_id) {
            $data['wisuda_santri'] = $this->Santri_model->get_wisuda_santri_by_periode($periode_id);
            // Mendapatkan nama periode yang dipilih
            $data['periode_nama'] = $this->Periode_model->get_periode_name_by_id($periode_id);
                
            // Mengelompokkan santri berdasarkan jumlah Juz yang diwisuda
            $wisuda_by_juz = [
                5 => [],
                10 => [],
                15 => [],
                20 => [],
                25 => [],
                30 => []
            ];

            // Memasukkan santri ke dalam kelompok Juz yang sesuai
            foreach ($data['wisuda_santri'] as $santri) {
                $juz = $santri->max_juz;
                if ($juz >= 30) {
                    $wisuda_by_juz[30][] = $santri;
                } elseif ($juz >= 25) {
                    $wisuda_by_juz[25][] = $santri;
                } elseif ($juz >= 20) {
                    $wisuda_by_juz[20][] = $santri;
                } elseif ($juz >= 15) {
                    $wisuda_by_juz[15][] = $santri;
                } elseif ($juz >= 10) {
                    $wisuda_by_juz[10][] = $santri;
                } elseif ($juz >= 5) {
                    $wisuda_by_juz[5][] = $santri;
                }
            }

            // Menyimpan data wisuda yang telah dikelompokkan
            $data['wisuda_by_juz'] = $wisuda_by_juz;
        } else {
            // Jika tidak ada periode yang dipilih, data wisuda kosong
            $data['wisuda_by_juz'] = [];
        }

        // Memuat view header dengan data yang telah disiapkan
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view top menu
        $this->load->view('layout/menu/top', $data);
        // Memuat view left menu
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama untuk halaman wisuda
        $this->load->view('santri/wisuda', $data);
        // Memuat view footer
        $this->load->view('layout/footer/footer-datatables', $data);
    }
    public function cetak_wisuda() {
        // Mendapatkan ID periode dari parameter GET
        $periode_id = $this->input->get('periode_id');
    
        // Menyiapkan judul halaman
        $data['title'] = 'Laporan Wisuda';
        // Mendapatkan semua data periode
        $data['periode'] = $this->Periode_model->get_all_periode();
        // Menyimpan periode yang dipilih
        $data['selected_periode'] = $periode_id;
    
        // Jika periode dipilih, mendapatkan data wisuda santri berdasarkan periode
        if ($periode_id) {
            $data['wisuda_santri'] = $this->Santri_model->get_wisuda_santri_by_periode($periode_id);
    
            // Mendapatkan nama periode yang dipilih

            $data['periode_nama'] = $this->Periode_model->get_periode_name_by_id($periode_id);
    
            // Mengelompokkan santri berdasarkan jumlah Juz yang diwisuda
            $wisuda_by_juz = [
                5 => [],
                10 => [],
                15 => [],
                20 => [],
                25 => [],
                30 => []
            ];
    
            // Memasukkan santri ke dalam kelompok Juz yang sesuai
            foreach ($data['wisuda_santri'] as $santri) {
                $juz = $santri->max_juz;
                if ($juz >= 30) {
                    $wisuda_by_juz[30][] = $santri;
                } elseif ($juz >= 25) {
                    $wisuda_by_juz[25][] = $santri;
                } elseif ($juz >= 20) {
                    $wisuda_by_juz[20][] = $santri;
                } elseif ($juz >= 15) {
                    $wisuda_by_juz[15][] = $santri;
                } elseif ($juz >= 10) {
                    $wisuda_by_juz[10][] = $santri;
                } elseif ($juz >= 5) {
                    $wisuda_by_juz[5][] = $santri;
                }
            }
    
            // Menyimpan data wisuda yang telah dikelompokkan
            $data['wisuda_by_juz'] = $wisuda_by_juz;
        } else {
            // Jika tidak ada periode yang dipilih, data wisuda kosong
            $data['wisuda_by_juz'] = [];
            $data['tahun_ajar'] = '';
        }
    
        // Load the view and save it into a variable
        $html = $this->load->view('santri/cetak_wisuda', $data, true);
    
        // Create PDF using Dompdf
        pdf_create($html, 'wisuda');
    }
    
}
