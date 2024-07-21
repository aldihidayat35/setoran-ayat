<?php
// Melindungi dari akses langsung melalui URL
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi kelas Wisuda yang merupakan turunan dari CI_Controller
class Wisuda extends CI_Controller {

    // Konstruktor kelas
    public function __construct() {
        // Memanggil konstruktor parent
        parent::__construct();
        // Memuat model Setoran_model
        $this->load->model('Setoran_model');
        // Memuat library session
        $this->load->library('session');
        // Memuat helper URL
        $this->load->helper('url');
    }

    // Fungsi untuk menampilkan laporan wisuda
    public function index() {
        // Menetapkan judul halaman
        $data['title'] = 'Laporan Wisuda';
        // Mengambil laporan wisuda dari model
        $data['wisuda_report'] = $this->Setoran_model->get_wisuda_report();
        
        // Memuat view header dengan data
        $this->load->view('layout/header/header-datatables', $data);
        // Memuat view menu atas dengan data
        $this->load->view('layout/menu/top', $data);
        // Memuat view menu kiri dengan data
        $this->load->view('layout/menu/left', $data);
        // Memuat view laporan wisuda dengan data
        $this->load->view('wisuda_report', $data);
        // Memuat view footer dengan data
        $this->load->view('layout/footer/footer-datatables', $data);
    }
}
?>