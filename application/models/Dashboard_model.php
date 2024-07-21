<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    // Menghitung jumlah total siswa
    public function get_jumlah_siswa() {
        return $this->db->count_all('siswa');
    }

    // Menghitung jumlah setoran berdasarkan periode tertentu (jika periode_id disediakan)
    public function get_jumlah_setoran_periode($periode_id = null) {
        if ($periode_id) {
            $this->db->where('id_periode', $periode_id);
        }
        return $this->db->count_all_results('setoran');
    }
    
    // Menghitung jumlah siswa yang sudah siap untuk wisuda berdasarkan kriteria tertentu
    public function get_jumlah_siswa_wisuda() {
        $this->db->select('COUNT(DISTINCT siswa.nisn) as jumlah_wisuda');
        $this->db->join('setoran', 'siswa.nisn = setoran.nisn');
        $this->db->where('setoran.Juz >=', 5);
        $query = $this->db->get('siswa');
        return $query->row()->jumlah_wisuda;
    }



    // Menghitung jumlah total guru
    public function get_jumlah_guru() {
        return $this->db->count_all('guru');
    }


    // Menghitung jumlah wisudawan per periode (dibatasi hanya 5 periode terakhir)
    public function get_wisudawan_per_periode() {
        $this->db->select('periode.tahun_ajar, COUNT(DISTINCT siswa.nisn) as jumlah_wisudawan');
        $this->db->from('siswa');
        $this->db->join('setoran', 'siswa.nisn = setoran.nisn');
        $this->db->join('periode', 'setoran.id_periode = periode.id_periode');
        $this->db->where('setoran.Juz >=', 5);
        $this->db->group_by('periode.id_periode');
        $this->db->order_by('periode.id_periode', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    // // Menghitung jumlah siswa yang mencapai target dan tidak mencapai target
    // public function get_siswa_tercapai_tidak_tercapai($kelas_id = null) {
    //     $this->db->select('siswa.*, MAX(setoran.Juz) as max_juz, MAX(setoran.Juz) as setoran_terakhir');
    //     $this->db->from('siswa');
    //     $this->db->join('setoran', 'siswa.nisn = setoran.nisn', 'left');
        
    //     if ($kelas_id) {
    //         $this->db->where('siswa.id_kelas', $kelas_id);
    //     }-
        
    //     $this->db->group_by('siswa.nisn');
    //     return $this->db->get()->result();
    // } 
    // Mengambil 10 setoran terbaru



    public function get_setoran_terbaru() {
        $this->db->select('setoran.id_setoran, siswa.Nama_siswa, setoran.juz, setoran.tanggal_setor');
        $this->db->join('siswa', 'siswa.nisn = setoran.nisn');
        $this->db->order_by('setoran.tanggal_setor', 'DESC');
        $this->db->limit(16); // Misal kita ambil 10 setoran terbaru
        return $this->db->get('setoran')->result();
    }



    public function get_siswa_tercapai_tidak_tercapai($kelas_id = null) {
        $this->db->select('siswa.nisn, MAX(setoran.Juz) as max_juz');
        $this->db->from('siswa');
        $this->db->join('setoran', 'siswa.nisn = setoran.nisn', 'left');
        
        if ($kelas_id) {
            $this->db->where('siswa.id_kelas', $kelas_id);
        }

        $this->db->group_by('siswa.nisn');
        $result = $this->db->get()->result();

        $tercapai = 0;
        $tidak_tercapai = 0;

        foreach ($result as $santri) {
            if (in_array($santri->max_juz, [3, 6, 9, 12, 15, 18, 21, 24, 27, 30])) {
                $tercapai++;
            } else {
                $tidak_tercapai++;
            }
        }

        return ['tercapai' => $tercapai, 'tidak_tercapai' => $tidak_tercapai];
    }
}
?>
