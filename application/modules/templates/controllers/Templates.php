<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Templates extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('aktif') != true) && ($this->session->userdata('level') == 1)) {
            redirect('dashboard');
        } elseif (($this->session->userdata('aktif') != true) && ($this->session->userdata('level') == 2)) {
            redirect('user');
        }
    }

    public function index()
    {
        $data 	= [
            'titles'	=> 'Login',
            'login'		=> 'Log In',
            'view'		=> "v_login"
        ];
        $this->load->view("index", $data);
    }
}
