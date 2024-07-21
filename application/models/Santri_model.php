<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

    // Mengambil semua data santri
    public function get_all_santri() {
        return $this->db->get('siswa')->result();
    }

    // Mengambil data santri berdasarkan NISN
    public function get_santri_by_nisn($nisn) {
        return $this->db->get_where('siswa', ['nisn' => $nisn])->row();
    }

    // Mengambil data santri yang sudah siap untuk wisuda
    public function get_wisuda_santri() {
        $this->db->select('siswa.Nama_siswa, siswa.nisn, MAX(setoran.Juz) as max_juz');
        $this->db->from('siswa');
        $this->db->join('setoran', 'siswa.nisn = setoran.nisn', 'left');
        $this->db->group_by('siswa.nisn');
        $this->db->having('max_juz >=', 5);
        $query = $this->db->get();
        return $query->result();
    }

    // Mengambil data santri yang sudah siap untuk wisuda berdasarkan periode
    public function get_wisuda_santri_by_periode($periode_id) {
        $this->db->select('siswa.*, MAX(setoran.Juz) as max_juz');
        $this->db->from('siswa');
        $this->db->join('setoran', 'siswa.nisn = setoran.nisn');
        $this->db->where('setoran.id_periode', $periode_id);
        $this->db->group_by('siswa.nisn');
        $this->db->having('max_juz >=', 5);
        return $this->db->get()->result();
    }

    // Mengambil laporan per semester berdasarkan periode dan kelas
    public function get_laporan_persemester($periode_id = null, $kelas_id = null) {
        $this->db->select('siswa.*, MAX(setoran.Juz) as max_juz, MAX(setoran.Juz) as setoran_terakhir');
        $this->db->from('siswa');
        $this->db->join('setoran', 'siswa.nisn = setoran.nisn', 'left');
        
        if ($periode_id) {
            $this->db->where('setoran.id_periode', $periode_id);
        }

        if ($kelas_id) {
            $this->db->where('siswa.id_kelas', $kelas_id);
        }

        $this->db->group_by('siswa.nisn');
        return $this->db->get()->result();
    }
}
?>
