<?php
class Surah_model extends CI_Model {

    public function get_all_surah() {
        return $this->db->get('surah_quran')->result_array();
    }

    public function insert_surah($data) {
        return $this->db->insert('surah_quran', $data);
    }

    public function get_surah($id_surah) {
        return $this->db->get_where('surah_quran', array('id_surah' => $id_surah))->row_array();
    }

    public function update_surah($id_surah, $data) {
        $this->db->where('id_surah', $id_surah);
        return $this->db->update('surah_quran', $data);
    }

    public function delete_surah($id_surah) {
        $this->db->where('id_surah', $id_surah);
        return $this->db->delete('surah_quran');
    }
}
?>
