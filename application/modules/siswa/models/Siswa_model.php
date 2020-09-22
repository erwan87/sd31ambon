<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function viewJadwal($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        $this->db->where('kelas', $where);
        $this->db->join('tbl_mapel', 'tbl_jadwal.mapel=tbl_mapel.id_mapel', 'LEFT');
        $this->db->join('tbl_guru', 'tbl_jadwal.guru=tbl_guru.id_guru', 'LEFT');
        $this->db->join('tbl_hari', 'tbl_jadwal.hari=tbl_hari.id_hari', 'LEFT');
        $this->db->join('tbl_kelas', 'tbl_jadwal.kelas=tbl_kelas.id_kelas', 'LEFT');
        $query  = $this->db->get();

        return $query;
    }
}
