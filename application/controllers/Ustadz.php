<?php
// Melindungi dari akses langsung melalui URL
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi kelas Ustadz yang merupakan turunan dari CI_Controller
class Ustadz extends CI_Controller {

    // Konstruktor kelas
    public function __construct() {
        // Memanggil konstruktor parent
        parent::__construct();
        // Memuat model Ustadz_model
        $this->load->model('Ustadz_model');
        // Memuat library session
        $this->load->library('session');
        // Memanggil fungsi check_session
        $this->check_session(); // Pengecekan session sebelum mengakses dashboard
        $this->load->helper('dompdf'); // Memuat helper dompdf

    }
 public function cetak_pdf()
    {
        $data['ustadz'] = $this->Ustadz_model->get_all_ustadz();
    
        // Load the view and save it into a variable
        $html = $this->load->view('ustadz/pdf_view', $data, true);
    
        // Create PDF using Dompdf
        pdf_create($html, 'Daftar_ustadz');
    }

    // Fungsi untuk mengecek sesi
    private function check_session() {
        // Jika sesi tidak ditemukan, redirect ke halaman login
        if (!$this->session->userdata('id_guru')) {
            redirect('login'); // Redirect ke halaman login jika session tidak ada
        }
    }

    // Fungsi untuk menampilkan halaman utama ustadz
    public function index() {
        // Menetapkan judul halaman
        $data['title'] = 'Master ustadz';
        // Mengambil semua data ustadz dari model
        $data['ustadz'] = $this->Ustadz_model->get_all_ustadz();
        
        // Memuat view header dengan data
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view menu atas dengan data
        $this->load->view('layout/menu/top', $data);
        // Memuat view menu kiri dengan data
        $this->load->view('layout/menu/left', $data);
        // Memuat view utama ustadz dengan data
        $this->load->view('ustadz/index', $data);
        // Memuat view footer dengan data
        $this->load->view('layout/footer/footer-datatables', $data);
    }

    // Fungsi untuk membuat data ustadz baru
    public function create() {
        // Menetapkan judul halaman
        $data['title'] = 'Master ustadz';

        // Jika ada data POST
        if ($_POST) {
            // Memasukkan data ustadz baru melalui model
            $this->Ustadz_model->insert_ustadz($_POST);
            // Redirect ke halaman utama ustadz
            redirect('ustadz');
        } else {
            // Memuat view header dengan data
            $this->load->view('layout/header/header-datatables', $data);
            // Memuat view menu atas dengan data
            $this->load->view('layout/menu/top', $data);
            // Memuat view menu kiri dengan data
            $this->load->view('layout/menu/left', $data);
            // Memuat view form tambah ustadz
            $this->load->view('ustadz/create');
            // Memuat view footer dengan data
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    // Fungsi untuk mengedit data ustadz
    public function edit($id_guru) {
        // Menetapkan judul halaman
        $data['title'] = 'Master ustadz';

        // Jika ada data POST
        if ($_POST) {
            // Mengupdate data ustadz melalui model
            $this->Ustadz_model->update_ustadz($id_guru, $_POST);
            // Redirect ke halaman utama ustadz
            redirect('ustadz');
        } else {
            // Mengambil data ustadz berdasarkan ID
            $data['ustadz'] = $this->Ustadz_model->get_ustadz($id_guru);
            // Memuat view header dengan data
            $this->load->view('layout/header/header-datatables', $data);
            // Memuat view menu atas dengan data
            $this->load->view('layout/menu/top', $data);
            // Memuat view menu kiri dengan data
            $this->load->view('layout/menu/left', $data);
            // Memuat view form edit ustadz
            $this->load->view('ustadz/edit', $data);
            // Memuat view footer dengan data
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    // Fungsi untuk menghapus data ustadz
    public function delete($id_guru) {
        // Menghapus data ustadz berdasarkan ID melalui model
        $this->Ustadz_model->delete_ustadz($id_guru);
        // Redirect ke halaman utama ustadz
        redirect('ustadz');
    }
}
?>
