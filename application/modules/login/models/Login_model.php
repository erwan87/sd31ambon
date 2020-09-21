<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function auth_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');

        // Associative array method:
        $array = array('username' => $username, 'password' => $password);

        $this->db->where($array);
        $query = $this->db->get();
        return $query;
    }

    public function view()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $query = $this->db->get();
        return $query;
    }

    // Exclude Administor
    public function view1()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where('id !=', '1');
        $query = $this->db->get();
        return $query;
    }

    // Insert new admin data
    public function insert_users($input)
    {
        return $this->db->insert('tbl_users', $input);
    }
    
    // Cek Username
    public function cek_User($username, $no_hp)
    {
        $this->db->select('username,notelp');
        $this->db->from('tbl_users');

        // Associative array method:
        $where = array('username' => $username, 'notelp' => $no_hp);
        
        $this->db->where($where);

        $query = $this->db->get();

        return $query;
    }
    
    // Update Password
    public function updatePass($input)
    {
        return $this->db->where('username', $input['username'])->update('tbl_users', $input);
    }
}
