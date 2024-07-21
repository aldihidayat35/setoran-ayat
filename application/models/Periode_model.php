<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Mengambil semua data periode
    public function get_all_periode() {
        $query = $this->db->get('periode');
        return $query->result_array();
    }

    // Menambahkan data periode baru
    public function insert_periode($data) {
        return $this->db->insert('periode', $data);
    }

    // Mengambil data periode berdasarkan ID
    public function get_periode_by_id($id) {
        $query = $this->db->get_where('periode', array('id_periode' => $id));
        return $query->row_array();
    }

    // Memperbarui data periode berdasarkan ID
    public function update_periode($id, $data) {
        $this->db->where('id_periode', $id);
        return $this->db->update('periode', $data);
    }

    // Menghapus data periode berdasarkan ID
    public function delete_periode($id) {
        $this->db->where('id_periode', $id);
        return $this->db->delete('periode');
    }
    public function get_periode_name_by_id($periode_id) {
        $this->db->select('tahun_ajar');
        $this->db->from('periode');
        $this->db->where('id_periode', $periode_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->tahun_ajar;
        } else {
            return null;
        }
    }
}
?>
