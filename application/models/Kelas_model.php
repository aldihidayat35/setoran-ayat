<?php
class Kelas_model extends CI_Model {

    // Mengambil semua data kelas
    public function get_all_kelas() {
        $this->db->select('kelas.*, COUNT(siswa.Id_kelas) as jumlah_siswa');
        $this->db->from('kelas');
        $this->db->join('siswa', 'kelas.Id_kelas = siswa.Id_kelas', 'left');
        $this->db->group_by('kelas.Id_kelas');
        return $this->db->get()->result_array();
    }

    // Menambahkan data kelas baru
    public function insert_kelas($data) {
        return $this->db->insert('kelas', $data);
    }

    // Mengambil data kelas berdasarkan ID
    public function get_kelas($id) {
        return $this->db->get_where('kelas', array('Id_kelas' => $id))->row_array();
    }

    // Memperbarui data kelas berdasarkan ID
    public function update_kelas($id, $data) {
        $this->db->where('Id_kelas', $id);
        return $this->db->update('kelas', $data);
    }

    // Menghapus data kelas berdasarkan ID
    public function delete_kelas($id) {
        $this->db->where('Id_kelas', $id);
        return $this->db->delete('kelas');
    }  
    
}

?>
