<?php
// Melindungi dari akses langsung melalui URL
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi kelas Siswa yang merupakan turunan dari CI_Controller
class Siswa extends CI_Controller {

    // Konstruktor kelas
    public function __construct() {
        // Memanggil konstruktor parent
        parent::__construct();
        // Memuat model Siswa_model
        $this->load->model('Siswa_model');
        // Memuat model Kelas_model
        $this->load->model('Kelas_model');
        // Memuat library session
        $this->load->library('session');
        // Memanggil fungsi check_session
        $this->check_session();
        $this->load->helper('dompdf'); // Memuat helper dompdf

    }
 public function cetak_pdf()
    {
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
    
        // Load the view and save it into a variable
        $html = $this->load->view('siswa/pdf_view', $data, true);
    
        // Create PDF using Dompdf
        pdf_create($html, 'Daftar_siswa');
    }

    // Fungsi untuk mengecek sesi
    private function check_session() {
        // Jika sesi tidak ditemukan, redirect ke halaman login
        if (!$this->session->userdata('id_guru')) {
            redirect('login');
        }
    }

    // Fungsi untuk menampilkan halaman utama siswa
    public function index() {
        // Menetapkan judul halaman
        $data['title'] = 'Master Siswa';
        // Mengambil semua data siswa dari model
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
        
        // Memuat view header dengan data
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view menu atas dengan data
        $this->load->view('layout/menu/top', $data);
        // Memuat view menu kiri dengan data
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama siswa dengan data
        $this->load->view('siswa/index', $data);
        // Memuat view footer dengan data
        $this->load->view('layout/footer/footer-datatables', $data);
    }

    // Fungsi untuk membuat data siswa baru
    public function create() {
        // Menetapkan judul halaman
        $data['title'] = 'Tambah Siswa';
        // Mengambil semua data kelas dari model
        $data['kelas'] = $this->Kelas_model->get_all_kelas();

        // Jika ada data POST
        if ($_POST) {
            // Memasukkan data siswa baru melalui model
            $this->Siswa_model->insert_siswa($_POST);
            // Redirect ke halaman utama siswa
            redirect('siswa');
        } else {
            // Memuat view header dengan data
            $this->load->view('layout/header/header-datatables', $data);
            // Memuat view menu atas dengan data
            $this->load->view('layout/menu/top', $data);
            // Memuat view menu kiri dengan data
            $this->load->view('layout/menu/left', $data);
            // Memuat view form tambah siswa
            $this->load->view('siswa/create', $data);
            // Memuat view footer dengan data
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    // Fungsi untuk mengedit data siswa
    public function edit($nisn) {
        // Menetapkan judul halaman
        $data['title'] = 'Edit Siswa';
        // Mengambil data siswa berdasarkan NISN
        $data['siswa'] = $this->Siswa_model->get_siswa($nisn);
        // Mengambil semua data kelas dari model
        $data['kelas'] = $this->Kelas_model->get_all_kelas();

        // Jika ada data POST
        if ($_POST) {
            // Mengupdate data siswa melalui model
            $this->Siswa_model->update_siswa($nisn, $_POST);
            // Redirect ke halaman utama siswa
            redirect('siswa');
        } else {
            // Memuat view header dengan data
            $this->load->view('layout/header/header-datatables', $data);
            // Memuat view menu atas dengan data
            $this->load->view('layout/menu/top', $data);
            // Memuat view menu kiri dengan data
            $this->load->view('layout/menu/left', $data);
            // Memuat view form edit siswa
            $this->load->view('siswa/edit', $data);
            // Memuat view footer dengan data
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    // Fungsi untuk menghapus data siswa
    public function delete($nisn) {
        // Menghapus data siswa berdasarkan NISN melalui model
        $this->Siswa_model->delete_siswa($nisn);
        // Redirect ke halaman utama siswa
        redirect('siswa');
    }
}
?>
