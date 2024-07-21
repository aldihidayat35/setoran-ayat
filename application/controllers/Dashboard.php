<?php
// application/controllers/Dashboard.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Kelas_model');
        $this->load->model('Setoran_model');
    }

    public function index() {
        $kelas_id = $this->input->get('kelas_id');

        $data['jumlah_siswa'] = $this->Dashboard_model->get_jumlah_siswa();
        $data['jumlah_setoran'] = $this->Dashboard_model->get_jumlah_setoran_periode();
        $data['jumlah_siswa_wisuda'] = $this->Dashboard_model->get_jumlah_siswa_wisuda();
        $data['jumlah_guru'] = $this->Dashboard_model->get_jumlah_guru();
        $data['wisudawan_per_periode'] = $this->Dashboard_model->get_wisudawan_per_periode();
        $data['kelas_list'] = $this->Kelas_model->get_all_kelas();
        $data['selected_kelas'] = $kelas_id;
        $data['setoran_terbaru'] = $this->Dashboard_model->get_setoran_terbaru();
        $data['title'] = 'Dashboard';

        // Mendapatkan data siswa tercapai dan tidak tercapai
        $siswa_tercapai_tidak_tercapai = $this->Dashboard_model->get_siswa_tercapai_tidak_tercapai($kelas_id);
        $data['siswa_tercapai'] = $siswa_tercapai_tidak_tercapai['tercapai'];
        $data['siswa_tidak_tercapai'] = $siswa_tercapai_tidak_tercapai['tidak_tercapai'];

        // Menghitung persentase
        $total_siswa = $data['siswa_tercapai'] + $data['siswa_tidak_tercapai'];
        $data['persentase_tercapai'] = $total_siswa > 0 ? ($data['siswa_tercapai'] / $total_siswa) * 100 : 0;
        $data['persentase_tidak_tercapai'] = $total_siswa > 0 ? ($data['siswa_tidak_tercapai'] / $total_siswa) * 100 : 0;

        $data['setoran_bulanan'] = $this->Setoran_model->get_setoran_bulanan();

        $this->load->view('layout/header/header-datatables', $data);
        $this->load->view('layout/menu/top', $data);
        $this->load->view('layout/menu/left', $data);
        $this->load->view('Dashboard/index', $data);
        $this->load->view('layout/footer/footer-datatables', $data);
    }
}

?>
