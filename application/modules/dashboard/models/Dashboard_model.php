<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    // Global View dengna $tbl sebagai nama tabel nya
    public function views($tbl)
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $query  = $this->db->get();

        return $query;
    }

    // Global Insert dengan $table sebagai nama tabel dan $input sebagai data nya
    public function inserts($table, $input)
    {
        return $this->db->insert($table, $input);
    }

    // Global Update dengan $table sebagai nama tabel dan $input sebagai inputan datanya
    public function updates($table, $where, $id, $update)
    {
        return $this->db->where($where, $id)->update($table, $update);
    }

    // Global Delete dengan $where sebagai kondisi data yang ingin di eksekusi $table sebagai nama tabel dan $id sebagai acuan yang ingin di eksekusi
    public function deletes($where, $tabel, $id)
    {
        $this->db->where($where, $id);
        $this->db->delete($tabel);
        return true;
    }

    // View Data User Login
    public function view()
    {
        $this->db->select('*,tbl_users.id AS userid, tbl_role.id AS roleId, tbl_users.name AS userName, tbl_role.name AS roleName');
        $this->db->from('tbl_users');
        $this->db->join('tbl_role', 'tbl_users.role_id=tbl_role.id', 'LEFT');
        $query  = $this->db->get();

        return $query;
    }

    // Cek Jumlah Users yang ada pada database
    public function allUser()
    {
        $allUser = $this->db->get('tbl_users');
        if ($allUser->num_rows() > 0) {
            return $allUser->num_rows();
        } else {
            return 0;
        }
    }

    // View Profile User with id
    public function viewprof()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    // Update Profile User with id
    public function update_prof($id, $input)
    {
        $id= $this->session->userdata('id');
        return $this->db->where('id', $id)->update('tbl_users', $input);
    }

    // View Guru
    public function viewGuru()
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_agama', 'tbl_guru.agama=tbl_agama.id_agama', 'LEFT');
        $this->db->join('tbl_pendidikan', 'tbl_guru.pendidikan=tbl_pendidikan.id_pendidikan', 'LEFT');
        $this->db->join('tbl_kelas', 'tbl_guru.walikelas=tbl_kelas.id_kelas', 'LEFT');
        $this->db->join('tbl_statusguru', 'tbl_guru.statusguru=tbl_statusguru.id_stat', 'LEFT');
        $query  = $this->db->get();
        
        return $query;
    }

    public function viewSiswa()
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_agama', 'tbl_siswa.agama=tbl_agama.id_agama', 'LEFT');
        $this->db->join('tbl_kelas', 'tbl_siswa.kelas=tbl_kelas.id_kelas', 'LEFT');
        $query  = $this->db->get();
        
        return $query;
    }
}
