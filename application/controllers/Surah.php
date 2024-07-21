<?php
// Melindungi dari akses langsung melalui URL
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi kelas Surah yang merupakan turunan dari CI_Controller
class Surah extends CI_Controller {

    // Konstruktor kelas
    public function __construct() {
        // Memanggil konstruktor parent
        parent::__construct();
        // Memuat model Surah_model
        $this->load->model('Surah_model');
        // Memuat library session
        $this->load->library('session');
        // Memanggil fungsi check_session
        $this->check_session(); // Pengecekan session sebelum mengakses dashboard
        $this->load->helper('dompdf'); // Memuat helper dompdf

    }
 public function cetak_pdf()
    {
        $data['surah'] = $this->Surah_model->get_all_surah();
    
        // Load the view and save it into a variable
        $html = $this->load->view('surah/pdf_view', $data, true);
    
        // Create PDF using Dompdf
        pdf_create($html, 'Daftar_surah');
    }

    // Fungsi untuk mengecek sesi
    private function check_session() {
        // Jika sesi tidak ditemukan, redirect ke halaman login
        if (!$this->session->userdata('id_guru')) {
            redirect('login'); // Redirect ke halaman login jika session tidak ada
        }
    }

    // Fungsi untuk menampilkan halaman utama surah
    public function index() {
        // Mengambil semua data surah dari model
        $data['surah'] = $this->Surah_model->get_all_surah();
        // Menetapkan judul halaman
        $data['title'] = 'Master Surah';

        // Memuat view header dengan data
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view menu atas dengan data
        $this->load->view('layout/menu/top', $data);
        // Memuat view menu kiri dengan data
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama surah dengan data
        $this->load->view('surah/index', $data);
        // Memuat view footer dengan data
        $this->load->view('layout/footer/footer-datatables', $data);
    }

    // Fungsi untuk membuat data surah baru
    public function create() {
        // Menetapkan judul halaman
        $data['title'] = 'Master Surah';

        // Jika ada data POST
        if ($_POST) {
            // Memasukkan data surah baru melalui model
            $this->Surah_model->insert_surah($_POST);
            // Redirect ke halaman utama surah
            redirect('surah');
        } else {
            // Memuat view header dengan data
            $this->load->view('layout/header/header-datatables', $data);
            // Memuat view menu atas dengan data
            $this->load->view('layout/menu/top', $data);
            // Memuat view menu kiri dengan data
            $this->load->view('layout/menu/left', $data);
            // Memuat view form tambah surah
            $this->load->view('surah/create');
            // Memuat view footer dengan data
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    // Fungsi untuk mengedit data surah
    public function edit($id_surah) {
        // Menetapkan judul halaman
        $data['title'] = 'Master Surah';

        // Jika ada data POST
        if ($_POST) {
            // Mengupdate data surah melalui model
            $this->Surah_model->update_surah($id_surah, $_POST);
            // Redirect ke halaman utama surah
            redirect('surah');
        } else {
            // Mengambil data surah berdasarkan ID
            $data['surah'] = $this->Surah_model->get_surah($id_surah);
            // Memuat view header dengan data
            $this->load->view('layout/header/header-datatables', $data);
            // Memuat view menu atas dengan data
            $this->load->view('layout/menu/top', $data);
            // Memuat view menu kiri dengan data
            $this->load->view('layout/menu/left', $data);
            // Memuat view form edit surah
            $this->load->view('surah/edit', $data);
            // Memuat view footer dengan data
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    // Fungsi untuk menghapus data surah
    public function delete($id_surah) {
        // Menghapus data surah berdasarkan ID melalui model
        $this->Surah_model->delete_surah($id_surah);
        // Redirect ke halaman utama surah
        redirect('surah');
    }
}
?>