<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Dashboard_model');
    }
    
    public function index()
    {
        $data	= [
            'titles'	=> "Dashboard Administrator",
            'user'	    => $this->Dashboard_model->view()->result_array(),
            'dashboard'	=> true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "Dashboard",
            'view'		=> "v_dashboard"
        ];
        $this->load->view("index", $data);
    }

    // View Profile User
    public function profuser($id = 0)
    {
        if ($id != 0) {
            $data = [
                'titles'		=> "Dashboard Administrator",
                'user'  		=> $this->Dashboard_model->viewprof($id)->result_array(),
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
        // $this->form_validation->set_rules("password", "Password", "trim|required");
        // $this->form_validation->set_rules("repassword", "Repassword", "trim|required|matches[password]");
        if ($this->form_validation->run() == false) {
            $data = [
                'titles'		=> "Dashboard Administrator",
                'user'  		=> $this->Dashboard_model->viewprof($id)->result_array(),
                'profile'		=> true,
                'breadcumb'		=> "Profile",
                'view'			=> "v_profuser"
            ];
            $this->load->view("index", $data);
        } else {
            $input = [
                'name'	        => htmlspecialchars($this->input->post('nama_admin'))
            ];
            if ($this->Dashboard_model->update_prof($id, $input)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil di Update <br>Username : ' . $input['name'] . '</div>');
            }
            redirect('dashboard/profedit');
        }
    }

    // USER
    public function user()
    {
        $data	= [
            'titles'	    => "Dashboard User",
            'user'	        => $this->Dashboard_model->view()->result_array(),
            'dashboard'	    => true,
            'icons'         => "fas fa-user-circle",
            'breadcumb'	    => "User",
            'view'		    => "v_user"
        ];
        $this->load->view("index", $data);
    }

    // Guru
    public function guru()
    {
        $data	= [
            'titles'	    => "Dashboard Guru",
            'user'	        => $this->Dashboard_model->view()->result_array(),
            'guru'          => $this->Dashboard_model->viewGuru()->result_array(),
            'agama'         => $this->Dashboard_model->views('tbl_agama')->result_array(),
            'kelas'         => $this->Dashboard_model->views('tbl_kelas')->result_array(),
            'status'        => $this->Dashboard_model->views('tbl_statusguru')->result_array(),
            'pendidikan'    => $this->Dashboard_model->views('tbl_pendidikan')->result_array(),
            'dashboard'	    => true,
            'icons'         => "fas fa-user",
            'breadcumb'	    => "Guru",
            'view'		    => "v_guru"
        ];
        $this->load->view("index", $data);
    }

    public function addGuru()
    {
        $tempatLahir        = $this->input->post('tempat');
        $tgl                = $this->input->post('tgl');
        $gnttgl             = str_replace('/', '-', $tgl);
        $ttl                = $tempatLahir.', '.$gnttgl;
        $input  = [
            'nisp'          => $this->input->post('nip'),
            'nama_guru'     => $this->input->post('nameGuru'),
            'ttl'           => $ttl,
            'jenkel'        => $this->input->post('jenkel'),
            'agama'         => $this->input->post('agama'),
            'pendidikan'    => $this->input->post('pendidikan'),
            'telp'          => $this->input->post('telp'),
            'alamat'        => $this->input->post('alamat'),
            'walikelas'     => $this->input->post('kelas'),
            'statusguru'    => $this->input->post('stat')
        ];

        // Insert data kedalam database
        if ($this->Dashboard_model->inserts('tbl_guru', $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di tambahkan !!!</div>');
        }
        redirect('dashboard/guru', 'refresh');
    }

    // Update Guru
    public function updateGuru()
    {
        $tempatLahir        = htmlentities($this->input->post('tempat'));
        $tgl                = htmlentities($this->input->post('tgl'));
        $gnttgl             = str_replace('/', '-', $tgl);
        $ttl                = $tempatLahir.', '.$gnttgl;
        $id                 = htmlentities($this->input->post('id'));
        $update  = [
            'nisp'          => htmlentities($this->input->post('nip')),
            'nama_guru'     => htmlentities($this->input->post('nameGuru')),
            'ttl'           => $ttl,
            'jenkel'        => htmlentities($this->input->post('jenkel')),
            'agama'         => htmlentities($this->input->post('agama')),
            'pendidikan'    => htmlentities($this->input->post('pendidikan')),
            'telp'          => htmlentities($this->input->post('telp')),
            'alamat'        => htmlentities($this->input->post('alamat')),
            'walikelas'     => htmlentities($this->input->post('kelas')),
            'statusguru'    => htmlentities($this->input->post('stat'))
        ];
        
        // Update Data Guru
        if ($this->Dashboard_model->updates('tbl_guru', 'id_guru', $id, $update)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di Ubah !!!</div>');
        }
        redirect('dashboard/guru', 'refresh');
    }

    // Delete Guru
    public function delGuru($id)
    {
        if ($this->Dashboard_model->deletes('id_guru', 'tbl_guru', $id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Data ID = [' .$id.'] has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error</div>');
        }
        redirect('dashboard/guru', 'refresh');
    }
}
