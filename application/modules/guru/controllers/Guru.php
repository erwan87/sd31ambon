<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Guru_model');
        $this->load->model('dashboard/Dashboard_model');
    }
    
    public function index()
    {
        $id     = $this->session->userdata('id');
        $data	= [
            'titles'	=> "Dashboard Guru",
            'user'	    => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
            'guru'	    => true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "Guru",
            'view'		=> "v_guru"
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

    public function jadwal()
    {
        $id     = $this->session->userdata('id');
        // Ambil Data berdasr session
        $cek        = $this->Dashboard_model->viewu('tbl_guru', 'nama_guru', $this->session->userdata('name'))->result_array();
        $data	= [
            'titles'	=> "Dashboard Guru",
            'user'	    => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
            // Ambil Jadwal Berdasar Guru
            'jdwl'      => $this->Guru_model->viewJadwal($cek[0]['id_guru'])->result_array(),
            'jadwal'    => true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "Jadwal",
            'view'		=> "v_jadwal"
        ];
        $this->load->view("index", $data);
    }

    // Nilai
    public function Nilai()
    {
        // Cek Session ID Guru
        $id     = $this->session->userdata('id');

        // Ambil Data berdasar session
        $cek        = $this->Dashboard_model->viewu('tbl_guru', 'nama_guru', $this->session->userdata('name'))->result_array();
        
        // Cek jadwal Guru dan ambil nilai id mapelnya
        $jdwl   = $this->Dashboard_model->viewu('tbl_jadwal', 'guru', $cek[0]['id_guru'])->result_array();
        $data	= [
            'titles'	=> "Dashboard Guru",
            'user'	    => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
            // Ambil Jadwal Berdasar Guru
            'mapel'     => $this->Dashboard_model->viewJadwal($cek[0]['id_guru'])->result_array(),
            'nilai'     => true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "Nilai",
            'view'		=> "v_nilai"
        ];
        $this->load->view("index", $data);
    }

    // Search Berdasar Mata Pelajaran
    public function cari()
    {
        // Cek Session ID Guru
        $id         = $this->session->userdata('id');

        // Ambil Data berdasar session
        $cek        = $this->Dashboard_model->viewu('tbl_guru', 'nama_guru', $this->session->userdata('name'))->result_array();
        
        $cari       = htmlentities($this->input->post('mapel'));

        $data	= [
            'titles'	=> "Dashboard Guru",
            'user'	    => $this->Dashboard_model->viewu('tbl_users', 'id', $id)->result_array(),
            // Ambil Jadwal Berdasar Guru
            'mapel'     => $this->Dashboard_model->viewJadwal($cek[0]['id_guru'])->result_array(),
            'mapjad'    => $this->Guru_model->viewCariMap($cari)->result_array(),
            'sis'       => $this->Guru_model->viewSis()->result_array(),
            'nilai'     => true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "Nilai",
            'view'		=> "v_nilai1"
        ];
        $this->load->view("index", $data);
    }

    public function addNilai()
    {
        $input   = [
            'mapel'         => htmlentities($this->input->post('mapel')),
            'nisn'          => htmlentities($this->input->post('siswa')),
            'nilai'         => htmlentities($this->input->post('nilmapel')),
            'pengetahuan'   => htmlentities($this->input->post('nilpeng')),
            'semester'      => htmlentities($this->input->post('smstr')),
            'ketrampilan'   => htmlentities($this->input->post('nilket'))
        ];

        // Insert data kedalam database
        if ($this->Dashboard_model->inserts('tbl_nilai', $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di tambahkan !!!</div>');
        }
        redirect('guru/nilai', 'refresh');
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
