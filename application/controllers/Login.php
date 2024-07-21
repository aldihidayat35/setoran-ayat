<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model'); // Load model login
        $this->load->library('session');
    }

    // Method untuk menampilkan form login
    public function index() {
        $this->load->view('login');
    }

    // Method untuk memproses login
    public function process_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        $user = $this->Login_model->authenticate($email, $password);
    
        if ($user) {
            // Jika user ditemukan, set session data
            $session_data = array(
                'id_guru' => $user['id_guru'],
                'email' => $user['Email'],
                'Hak_akses' => $user['Hak_akses'], // Tambahkan level pengguna ke session
                // Tambahkan data session lain jika diperlukan
            );

            $this->session->set_userdata($session_data);
            redirect('Dashboard'); // Redirect ke halaman dashboard atau halaman lainnya
        } else {
            // Jika login gagal, tampilkan pesan alert
            $this->session->set_flashdata('login_error', 'Username atau Password salah.');
            redirect('login');
        }
    }

    // Method untuk logout
    public function logout() {
        $this->session->unset_userdata('id_guru'); // Hapus data session
        $this->session->unset_userdata('Hak_akses'); // Hapus data session level pengguna
        redirect('login'); // Redirect kembali ke halaman login
    }
}
?>
