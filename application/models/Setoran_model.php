<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran_model extends CI_Model {
    public function get_setoran_by_month($month, $year) {
        $this->db->select('setoran.*, siswa.Nama_siswa, surah_quran.nama_surah, guru.Nama_guru, periode.tahun_ajar');
        $this->db->from('setoran');
        $this->db->join('siswa', 'setoran.Nisn = siswa.nisn');
        $this->db->join('surah_quran', 'setoran.Id_Surah = surah_quran.id_surah');
        $this->db->join('guru', 'setoran.Id_guru = guru.id_guru');
        $this->db->join('periode', 'setoran.Id_periode = periode.id_periode');
        $this->db->where('MONTH(setoran.tanggal_setor)', $month);
        $this->db->where('YEAR(setoran.tanggal_setor)', $year);
    
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_setoran_bulanan() {
        $this->db->select('MONTH(tanggal_setor) as month, YEAR(tanggal_setor) as year, COUNT(*) as total');
        $this->db->from('setoran');
        $this->db->group_by('YEAR(tanggal_setor), MONTH(tanggal_setor)');
        $this->db->order_by('YEAR(tanggal_setor), MONTH(tanggal_setor)');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_setoran_per_bulan() {
        $this->db->select('MONTH(tanggal_setor) as bulan, COUNT(*) as jumlah');
        $this->db->group_by('bulan');
        $this->db->order_by('bulan', 'ASC');
        $query = $this->db->get('setoran');
        return $query->result();
    }
    public function get_all_setoran() {
        $this->db->select('setoran.*, siswa.Nama_siswa, surah_quran.nama_surah, guru.Nama_guru,periode.tahun_ajar');
        $this->db->from('setoran');
        $this->db->join('siswa', 'setoran.Nisn = siswa.nisn');
        $this->db->join('surah_quran', 'setoran.Id_Surah = surah_quran.id_surah');
        $this->db->join('guru', 'setoran.Id_guru = guru.id_guru');
        $this->db->join('periode', 'setoran.Id_periode = periode.id_periode');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_setoran($data) {
        return $this->db->insert('setoran', $data);
    }
    

    public function get_setoran($id_setoran) {
        $this->db->select('setoran.*, siswa.Nama_siswa, surah_quran.nama_surah, guru.Nama_guru');
        $this->db->from('setoran');
        $this->db->join('siswa', 'setoran.Nisn = siswa.nisn');
        $this->db->join('surah_quran', 'setoran.Id_Surah = surah_quran.id_surah');
        $this->db->join('guru', 'setoran.Id_guru = guru.id_guru');
        $this->db->where('setoran.Id_setoran', $id_setoran);
        $query = $this->db->get();
        return $query->row_array();
    }
    

    public function update_setoran($id_setoran, $data) {
        $this->db->where('Id_setoran', $id_setoran);
        return $this->db->update('setoran', $data);
    }

    public function delete_setoran($id_setoran) {
        $this->db->where('Id_setoran', $id_setoran);
        return $this->db->delete('setoran');
    }

    public function get_all_siswa() {
        return $this->db->get('siswa')->result_array();
    }

    public function get_all_surah() {
        return $this->db->get('surah_quran')->result_array();
    }

    public function get_all_guru() {
        return $this->db->get('guru')->result_array();
    }
    public function get_setoran_by_nisn($nisn) {
        $this->db->select('setoran.*, siswa.Nama_siswa, surah_quran.nama_surah, guru.Nama_guru');
        $this->db->from('setoran');
        $this->db->join('siswa', 'setoran.nisn = siswa.nisn');
        $this->db->join('surah_quran', 'setoran.Id_Surah = surah_quran.id_surah');
        $this->db->join('guru', 'setoran.Id_guru = guru.id_guru');
        $this->db->where('setoran.nisn', $nisn);
        return $this->db->get()->result();
    }
   
    public function get_all_kelas() {
        return $this->db->get('kelas')->result_array();
    }
    public function get_siswa_by_kelas($id_kelas) {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('Id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
