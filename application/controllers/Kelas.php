<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('session');
        $this->load->helper('dompdf'); // Memuat helper dompdf

    }
 public function cetak_pdf()
    {
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
    
        // Load the view and save it into a variable
        $html = $this->load->view('kelas/pdf_view', $data, true);
    
        // Create PDF using Dompdf
        pdf_create($html, 'Daftar_Kelas');
    }
    
    public function index() {
        // Menyiapkan judul halaman
        $data['title'] = 'Master Kelas';

        // Mengambil semua data kelas
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        
        // Memuat view dengan data yang sudah disiapkan
        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('layout/footer/footer-datatables', $data);


        
    }

   
    
    public function create() {
        // Menyiapkan judul halaman
        $data['title'] = 'Master Kelas';

        if ($_POST) {
            // Memasukkan data kelas baru ke database
            $this->Kelas_model->insert_kelas($_POST);
            redirect('kelas');
        } else {
            // Memuat view untuk form pembuatan kelas
            $this->load->view('layout/header/header-datatables', $data);
            $this->load->view('layout/menu/top', $data);
            $this->load->view('layout/menu/left', $data);
            $this->load->view('kelas/create');
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    public function edit($id) {
        // Menyiapkan judul halaman
        $data['title'] = 'Master Kelas';

        if ($_POST) {
            // Mengupdate data kelas yang ada di database
            $this->Kelas_model->update_kelas($id, $_POST);
            redirect('kelas');
        } else {
            // Mengambil data kelas berdasarkan ID
            $data['kelas'] = $this->Kelas_model->get_kelas($id);

            // Memuat view untuk form edit kelas
            $this->load->view('layout/header/header-datatables', $data);
            $this->load->view('layout/menu/top', $data);
            $this->load->view('layout/menu/left', $data);
            $this->load->view('kelas/edit', $data);
            $this->load->view('layout/footer/footer-datatables', $data);
        }
    }

    public function delete($id) {
        // Menghapus data kelas berdasarkan ID
        $this->Kelas_model->delete_kelas($id);
        redirect('kelas');
    }
}
?>
