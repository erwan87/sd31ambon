<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Siswa_model');
        $this->load->model('dashboard/Dashboard_model');
    }
    
    public function index()
    {
        $id     = $this->session->userdata('id');
        $data	= [
            'titles'	=> "Dashboard Siswa",
            'user'	    => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
            'siswa'	    => true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "Siswa",
            'view'		=> "v_siswa"
        ];
        $this->load->view("index", $data);
    }

    // View Profile User
    public function profuser($id = 0)
    {
        if ($id != 0) {
            $data = [
                'titles'		=> "Dashboard Administrator",
                'user'	        => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
                'profile'		=> true,
                'breadcumb'		=> "Profile",
                'view'			=> "v_profuser"
            ];
            $this->load->view("index", $data);
        }
    }

    // Edit Profile User
    public function profedit()
    {
        $id	= $this->session->userdata('id');
        
        $this->form_validation->set_rules("nama_admin", "Nama_admin", "trim|min_length[5]|required");
        if ($this->form_validation->run() == false) {
            $data = [
                'titles'		=> "Dashboard Administrator",
                'user'  		=> $this->Siswa_model->viewprof($id)->result_array(),
                'profile'		=> true,
                'breadcumb'		=> "Profile",
                'view'			=> "v_profuser"
            ];
            $this->load->view("index", $data);
        } else {
            $input = [
                'name'	        => htmlspecialchars($this->input->post('nama_admin'))
            ];
            if ($this->Siswa_model->update_prof($id, $input)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil di Update <br>Username : ' . $input['name'] . '</div>');
            }
            redirect('dashboard/profedit');
        }
    }

    // Jadwal
    public function jadwal()
    {
        $id     = $this->session->userdata('id');
        // Ambil Data berdasr session
        $cek        = $this->Dashboard_model->viewu('tbl_siswa', 'nama_siswa', $this->session->userdata('name'))->result_array();
        $data = [
                'titles'		=> "Dashboard Siswa",
                'user'	        => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
                // Ambil Jadwal Berdasar kelas
                'jdwl'          => $this->Siswa_model->viewJadwal($cek[0]['kelas'])->result_array(),
                'icons'         => "fa fa-calendar",
                'jadwal'		=> true,
                'breadcumb'		=> "Jadwal",
                'view'			=> "v_jadwal"
            ];

        $this->load->view("index", $data);
    }

    // Nilai
    public function nilai()
    {
        $id     = $this->session->userdata('id');
        // Ambil Data berdasr session
        $cek        = $this->Dashboard_model->viewu('tbl_siswa', 'nama_siswa', $this->session->userdata('name'))->result_array();
        $data = [
                'titles'		=> "Dashboard Siswa",
                'user'	        => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
                'nli'           => $this->Siswa_model->viewNilai($cek[0]['id_siswa'])->result_array(),
                // Ambil Nilai Berdasar session name
                'nilai'         => '',
                'icons'         => "fa fa-book",
                'nilai'		    => true,
                'breadcumb'		=> "Nilai",
                'view'			=> "v_nilai"
            ];

        $this->load->view("index", $data);
    }

    // Module About
    public function about()
    {
        $id     = $this->session->userdata('id');
        $data	= [
            'titles'	=> "Dashboard Siswa",
            'user'	    => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
            'About'	    => true,
            'icons'     => "fa fa-info",
            'breadcumb'	=> "About",
            'view'		=> "v_about"
        ];
        $this->load->view("index", $data);
    }
}
