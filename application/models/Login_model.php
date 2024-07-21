<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Method untuk autentikasi user berdasarkan email dan password
    public function authenticate($email, $password) {
        // Query ke database untuk mencari user berdasarkan email dan password
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
        $query = $this->db->get('guru');

        // Jika user ditemukan, kembalikan data user
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            // Jika tidak ditemukan, kembalikan null
            return null;
        }
    }
}
?>
