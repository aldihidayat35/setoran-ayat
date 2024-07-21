<?php
class Siswa_model extends CI_Model {

    public function get_all_siswa() {
 $this->db->select('siswa.*, kelas.Nama_kelas');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.Id_kelas = kelas.Id_kelas', 'left');
        return $this->db->get()->result_array();
        
    }

        public function get_kelas() {
            return $this->db->get('kelas')->result_array();
        }
    
        public function insert_siswa($data) {
            return $this->db->insert('siswa', $data);
        }
    
        public function get_siswa($nisn) {
            return $this->db->get_where('siswa', array('nisn' => $nisn))->row_array();
        }
    
        public function update_siswa($nisn, $data) {
            $this->db->where('nisn', $nisn);
            return $this->db->update('siswa', $data);
        }
    
        public function delete_siswa($nisn) {
            $this->db->where('nisn', $nisn);
            return $this->db->delete('siswa');
        }
    
    
}
?>
