<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Setoran_model');
        $this->load->library('session');
        $this->load->model('Periode_model');
                $this->load->helper('dompdf_helper');


    }

    private function check_session() {
        if (!$this->session->userdata('id_guru')) {
            redirect('login');
        }
    }

    public function index() {
        $data['title'] = 'Master Setoran';
        
        // Get the month and year from the form submission
        $month = $this->input->post('month');
        $year = $this->input->post('year');
    
        if ($month && $year) {
            // If month and year are provided, fetch the filtered data
            $data['setoran'] = $this->Setoran_model->get_setoran_by_month($month, $year);
        } else {
            // Otherwise, fetch all data
            $data['setoran'] = $this->Setoran_model->get_all_setoran();
        }
    
        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('setoran/index', $data);
        $this->load->view('layout/footer/footer-datatables', $data);
    }
    
    public function print_pdf() {
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        
        // Dapatkan data yang difilter
        $data['setoran'] = $this->Setoran_model->get_setoran_by_month($month, $year);
           // Tambahkan $month dan $year ke data
    $data['month'] = $month;
    $data['year'] = $year;
      
        // Load view untuk PDF
        $html = $this->load->view('setoran/print', $data, true);
        
        // Create PDF using Dompdf
        pdf_create($html, ' data_setoran');
        $this->pdf->stream('Setoran_' . $month . '_' . $year . '.pdf', array('Attachment' => 0));

    }
    
public function create() {
        $data['title'] = 'Filter Kelas';
        $data['kelas_list'] = $this->Setoran_model->get_all_kelas();

        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('setoran/filter', $data);
        $this->load->view('layout/footer/footer-datatables', $data);
    }

    public function create_filtered() {
        $id_kelas = $this->input->post('kelas');
        $data['title'] = 'Master Setoran';
        $data['kelas_list'] = $this->Setoran_model->get_all_kelas();
        $data['siswa'] = $this->Setoran_model->get_siswa_by_kelas($id_kelas);
        $data['surah'] = $this->Setoran_model->get_all_surah();
        $data['guru'] = $this->Setoran_model->get_all_guru();
        $data['periode'] = $this->Periode_model->get_all_periode();

        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('setoran/create', $data);
        $this->load->view('layout/footer/footer-datatables', $data);
    }
    public function store() {
        $data = [
            'Nisn' => $this->input->post('Nisn'),
            'Id_Surah' => $this->input->post('Id_Surah'),
            'Setor_dari' => $this->input->post('Setor_dari'),
            'Setor_sampai' => $this->input->post('Setor_sampai'),
            'Juz' => $this->input->post('Juz'),
            'Id_guru' => $this->input->post('Id_guru'),
            'id_periode' => $this->input->post('id_periode'),
            'tanggal_setor' => $this->input->post('tanggal_setor'),
            'keterangan' => $this->input->post('keterangan')
        ];
    
        if ($this->Setoran_model->create_setoran($data)) {
            // Jika sukses menyimpan, set session flash data
            $this->session->set_flashdata('success', 'Setoran berhasil disimpan.');
        } else {
            // Jika gagal menyimpan, set session flash data
            $this->session->set_flashdata('error', 'Gagal menyimpan setoran. Silakan coba lagi.');
        }
    
        redirect('setoran/create');
    }
    

    public function edit($id_setoran) {
        $data['title'] = 'Master Setoran';
        $data['setoran'] = $this->Setoran_model->get_setoran($id_setoran);
        $data['siswa'] = $this->Setoran_model->get_all_siswa();
        $data['surah'] = $this->Setoran_model->get_all_surah();
        $data['guru'] = $this->Setoran_model->get_all_guru();

        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('setoran/edit', $data);
        $this->load->view('layout/footer/footer-datatables', $data);
    }

    public function update($id_setoran) {
        $data = [
            'Nisn' => $this->input->post('nisn'),
            'Id_Surah' => $this->input->post('Id_Surah'),
            'Setor_dari' => $this->input->post('Setor_dari'),
            'Setor_sampai' => $this->input->post('Setor_sampai'),
            'Juz' => $this->input->post('Juz'),
            'Id_guru' => $this->input->post('Id_guru'),
            'tanggal_setor' => $this->input->post('tanggal_setor'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->Setoran_model->update_setoran($id_setoran, $data);
        redirect('setoran');
    }

    public function delete($id_setoran) {
        $this->Setoran_model->delete_setoran($id_setoran);
        redirect('setoran');
    }

    public function laporan_wisuda() {
        $data['title'] = 'Laporan Wisuda';
        $data['wisuda'] = $this->Setoran_model->get_wisuda_laporan();

        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('setoran/laporan_wisuda', $data);
        $this->load->view('layout/footer/footer-datatables', $data);
     }
     
}
?>