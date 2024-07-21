<?php
class Ustadz_model extends CI_Model {

    public function get_all_ustadz() {
        return $this->db->get('guru')->result_array();
    }

    public function insert_ustadz($data) {
        return $this->db->insert('guru', $data);
    }

    public function get_ustadz($id_guru) {
        return $this->db->get_where('guru', array('id_guru' => $id_guru))->row_array();
    }

    public function update_ustadz($id_guru, $data) {
        $this->db->where('id_guru', $id_guru);
        return $this->db->update('guru', $data);
    }

    public function delete_ustadz($id_guru) {
        $this->db->where('id_guru', $id_guru);
        return $this->db->delete('guru');
    }
}
?>
