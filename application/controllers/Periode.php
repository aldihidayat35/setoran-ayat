<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Periode_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // Tampilkan daftar periode
    public function index() {
        // Mengambil semua data periode
        $data['periode'] = $this->Periode_model->get_all_periode();
        $data['title'] = 'Master Periode';

        // Memuat view dengan data yang sudah disiapkan
        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);        
        $this->load->view('layout/menu/left', $data);        
        $this->load->view('periode/index', $data);        
        $this->load->view('layout/footer/footer-datatables', $data);                
    }

    // Tambah periode
    public function create() {
        // Menentukan aturan validasi untuk form
        $data['title'] = 'Master Periode';

        $this->form_validation->set_rules('tahun_ajar', 'Tahun Ajar', 'required');
        if ($this->form_validation->run() === FALSE) {

        // Memuat view dengan data yang sudah disiapkan
        $this->load->view('layout/header/header-datatables' );
        $this->load->view('layout/menu/top' );
        $this->load->view('layout/menu/left' ); 
        $this->load->view('periode/create');
        $this->load->view('layout/footer/footer-datatables' );

        } else {
            // Jika validasi berhasil, simpan data periode ke database
            $data = array(
                'tahun_ajar' => $this->input->post('tahun_ajar'),
            );
            $this->Periode_model->insert_periode($data);
            redirect('periode');
        }
    }

    // Edit periode
    public function edit($id) {
        $data['title'] = 'Master Periode';

        // Mengambil data periode berdasarkan ID
        $data['periode'] = $this->Periode_model->get_periode_by_id($id);

        // Menentukan aturan validasi untuk form
        $this->form_validation->set_rules('tahun_ajar', 'Tahun Ajar', 'required');

        if ($this->form_validation->run() === FALSE) {
        // Jika validasi gagal, tampilkan form edit
        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('periode/edit', $data);
        $this->load->view('layout/footer/footer-datatables', $data);


        } else {
            // Jika validasi berhasil, update data periode di database
            $update_data = array(
                'tahun_ajar' => $this->input->post('tahun_ajar'),
            );
            $this->Periode_model->update_periode($id, $update_data);
            redirect('periode');
        }
    }

    // Hapus periode
    public function delete($id) {
        // Menghapus data periode berdasarkan ID
        $this->Periode_model->delete_periode($id);
        redirect('periode');
    }
}
?>