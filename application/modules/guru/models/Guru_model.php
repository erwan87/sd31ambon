<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    // Jadwal Guru
    public function viewJadwal($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        $this->db->where('guru', $id);
        $this->db->join('tbl_mapel', 'tbl_jadwal.mapel=tbl_mapel.id_mapel', 'LEFT');
        $this->db->join('tbl_guru', 'tbl_jadwal.guru=tbl_guru.id_guru', 'LEFT');
        $this->db->join('tbl_hari', 'tbl_jadwal.hari=tbl_hari.id_hari', 'LEFT');
        $this->db->join('tbl_kelas', 'tbl_jadwal.kelas=tbl_kelas.id_kelas', 'LEFT');
        $query  = $this->db->get();

        return $query;
    }

    public function viewCariMap($cari)
    {
        $this->db->select('*');
        $this->db->from('tbl_nilai');
        $this->db->join('tbl_siswa', 'tbl_nilai.nisn=tbl_siswa.id_siswa', 'LEFT');
        $this->db->join('tbl_mapel', 'tbl_nilai.mapel=tbl_mapel.id_mapel', 'LEFT');
        $this->db->where('mapel', $cari);
        $query = $this->db->get();

        return $query;
    }

    // View Siswa
    public function viewSis()
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $query  = $this->db->get();

        return  $query;
    }

    // Nilai Siswa
    public function viewNilai($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_nilai');
        $this->db->where('mapel', $id);
        // $this->db->join('tbl_mapel', 'tbl_jadwal.mapel=tbl_mapel.id_mapel', 'LEFT');
        // $this->db->join('tbl_guru', 'tbl_jadwal.guru=tbl_guru.id_guru', 'LEFT');
        // $this->db->join('tbl_hari', 'tbl_jadwal.hari=tbl_hari.id_hari', 'LEFT');
        // $this->db->join('tbl_kelas', 'tbl_jadwal.kelas=tbl_kelas.id_kelas', 'LEFT');
        $query  = $this->db->get();

        return $query;
    }
}
