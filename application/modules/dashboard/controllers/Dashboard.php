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

    // Siswa
    public function siswa()
    {
        $data	= [
            'titles'	    => "Dashboard Administrator",
            'user'	        => $this->Dashboard_model->view()->result_array(),
            'sis'           => $this->Dashboard_model->viewSiswa()->result_array(),
            'agama'         => $this->Dashboard_model->views('tbl_agama')->result_array(),
            'kls'           => $this->Dashboard_model->views('tbl_kelas')->result_array(),
            'siswa'	        => true,
            'icons'         => "",
            'breadcumb'	    => "Siswa",
            'view'		    => "v_siswa"
        ];
        $this->load->view("index", $data);
    }

    public function addSiswa()
    {
        $tempatLahir        = $this->input->post('tempat');
        $tgl                = $this->input->post('tgl');
        $gnttgl             = str_replace('/', '-', $tgl);
        $ttl                = $tempatLahir.', '.$gnttgl;
        $input  = [
            'nisn'          => $this->input->post('nisn'),
            'nama_siswa'    => $this->input->post('namaSiswa'),
            'ttl'           => $ttl,
            'jenkel'        => $this->input->post('jenkel'),
            'agama'         => $this->input->post('agama'),
            'alamat'        => $this->input->post('alamat'),
            'nama_ayah'     => $this->input->post('namaAyah'),
            'nama_ibu'      => $this->input->post('namaIbu'),
            'alamat_ortu'   => $this->input->post('alamatOrtu'),
            'telp_ortu'     => $this->input->post('telpOrtu'),
            'kelas'         => $this->input->post('kelas')
        ];

        // Insert data kedalam database
        if ($this->Dashboard_model->inserts('tbl_siswa', $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di tambahkan !!!</div>');
        }
        redirect('dashboard/siswa', 'refresh');
    }

    // Update Guru
    public function updateSiswa()
    {
        $tempatLahir        = htmlentities($this->input->post('tempat'));
        $tgl                = htmlentities($this->input->post('tgl'));
        $gnttgl             = str_replace('/', '-', $tgl);
        $ttl                = $tempatLahir.', '.$gnttgl;
        $id                 = htmlentities($this->input->post('id'));
        $update  = [
            'nisn'          => htmlentities($this->input->post('nisn')),
            'nama_siswa'    => htmlentities($this->input->post('namaSiswa')),
            'ttl'           => $ttl,
            'jenkel'        => htmlentities($this->input->post('jenkel')),
            'agama'         => htmlentities($this->input->post('agama')),
            'alamat'        => htmlentities($this->input->post('alamat')),
            'nama_ayah'     => htmlentities($this->input->post('namaAyah')),
            'nama_ibu'      => htmlentities($this->input->post('namaIbu')),
            'alamat_ortu'   => htmlentities($this->input->post('alamatOrtu')),
            'telp_ortu'     => htmlentities($this->input->post('telp')),
            'kelas'         => htmlentities($this->input->post('kelas'))
        ];
        // Update Data Siswa
        if ($this->Dashboard_model->updates('tbl_siswa', 'id_siswa', $id, $update)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di Ubah !!!</div>');
        }
        redirect('dashboard/siswa', 'refresh');
    }

    // Delete Siswa
    public function delSiswa($id)
    {
        if ($this->Dashboard_model->deletes('id_siswa', 'tbl_siswa', $id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Data ID = [' .$id.'] has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error</div>');
        }
        redirect('dashboard/siswa', 'refresh');
    }

    // Kelas
    public function kelas()
    {
        $data	= [
            'titles'	=> "Dashboard Administrator",
            'user'	    => $this->Dashboard_model->view()->result_array(),
            'kls'       => $this->Dashboard_model->views('tbl_kelas')->result_array(),
            'kelas'	    => true,
            'icons'     => "",
            'breadcumb'	=> "Ruangan Kelas",
            'view'		=> "v_kelas"
        ];
        $this->load->view("index", $data);
    }

    public function addKelas()
    {
        $input  = [
            'kode_kelas'    => $this->input->post('kdkelas'),
            'nama_kelas'    => $this->input->post('namaKelas')
        ];

        // Insert data kedalam database
        if ($this->Dashboard_model->inserts('tbl_kelas', $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di tambahkan !!!</div>');
        }
        redirect('dashboard/kelas', 'refresh');
    }

    public function updateKelas()
    {
        $id                 = htmlentities($this->input->post('id'));
        $update  = [
            'kode_kelas'    => htmlentities($this->input->post('kdkelas')),
            'nama_kelas'    => htmlentities($this->input->post('namaKelas'))
        ];

        // Update Data Kelas
        if ($this->Dashboard_model->updates('tbl_kelas', 'id_kelas', $id, $update)) {
            $this->session->set_flashdata(' message', '<div class="alert alert-success" role="succes">Data Berhasil di Ubah !!!</div>');
        }
        redirect('dashboard/kelas', 'refresh');
    }
    
    // Delete Kelas
    public function delKelas($id)
    {
        if ($this->Dashboard_model->deletes('id_kelas', 'tbl_kelas', $id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Data ID = [' .$id.'] has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error</div>');
        }
        redirect('dashboard/kelas', 'refresh');
    }

    // Mata Pelajaran
    public function mapel()
    {
        $data	= [
            'titles'	=> "Dashboard Administrator",
            'user'	    => $this->Dashboard_model->view()->result_array(),
            'mapel'     => $this->Dashboard_model->views('tbl_mapel')->result_array(),
            'matapel'   => true,
            'icons'     => "",
            'breadcumb'	=> "Mata Pelajaran",
            'view'		=> "v_mapel"
        ];
        $this->load->view("index", $data);
    }

    public function addMapel()
    {
        $input  = [
            'kode_mapel'    => $this->input->post('kdMapel'),
            'nama_mapel'    => $this->input->post('namaMapel')
        ];

        // Insert data kedalam database
        if ($this->Dashboard_model->inserts('tbl_mapel', $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di tambahkan !!!</div>');
        }
        redirect('dashboard/mapel', 'refresh');
    }

    public function updateMapel()
    {
        $id                 = htmlentities($this->input->post('id'));
        $update  = [
            'kode_mapel'    => htmlentities($this->input->post('kdMapel')),
            'nama_mapel'    => htmlentities($this->input->post('namaMapel'))
        ];

        // Update Data Mata Pelajaran
        if ($this->Dashboard_model->updates('tbl_mapel', 'id_mapel', $id, $update)) {
            $this->session->set_flashdata(' message', '<div class="alert alert-success" role="succes">Data Berhasil di Ubah !!!</div>');
        }
        redirect('dashboard/mapel', 'refresh');
    }

    // Delete Mata Pelajaran
    public function delMapel($id)
    {
        if ($this->Dashboard_model->deletes('id_mapel', 'tbl_mapel', $id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Data ID = [' .$id.'] has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error</div>');
        }
        redirect('dashboard/mapel', 'refresh');
    }

    // Jadwal MAPEL
    public function jadwal()
    {
        $data	= [
            'titles'	=> "Dashboard Administrator",
            'user'	    => $this->Dashboard_model->view()->result_array(),
            'jadmap'    => $this->Dashboard_model->viewJadwal()->result_array(),
            'mapel'     => $this->Dashboard_model->views('tbl_mapel')->result_array(),
            'guru'      => $this->Dashboard_model->views('tbl_guru')->result_array(),
            'kls'       => $this->Dashboard_model->views('tbl_kelas')->result_array(),
            'hari'      => $this->Dashboard_model->views('tbl_hari')->result_array(),
            'jadwal'    => true,
            'icons'     => "",
            'breadcumb'	=> "Jadwal",
            'view'		=> "v_jadwal"
        ];
        $this->load->view("index", $data);
    }

    public function addJadwal()
    {
        $mulai  = htmlentities($this->input->post('mulai'));
        $akhir  = htmlentities($this->input->post('akhir'));
        $jam    = $mulai.' - ' .$akhir;
        $input  = [
            'mapel'     => htmlentities($this->input->post('mapel')),
            'guru'      => htmlentities($this->input->post('guru')),
            'kelas'     => htmlentities($this->input->post('kelas')),
            'hari'      => htmlentities($this->input->post('hari')),
            'jam'       => $jam
        ];

        // Insert data kedalam database
        if ($this->Dashboard_model->inserts('tbl_jadwal', $input)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di tambahkan !!!</div>');
        }
        redirect('dashboard/jadwal', 'refresh');
    }

    public function updateJadwal()
    {
        $mulai  = htmlentities($this->input->post('mulai'));
        $akhir  = htmlentities($this->input->post('akhir'));
        $jam    = $mulai.' - ' .$akhir;
        $id                 = htmlentities($this->input->post('id'));
        $update  = [
            'mapel'     => htmlentities($this->input->post('mapel')),
            'guru'      => htmlentities($this->input->post('guru')),
            'kelas'     => htmlentities($this->input->post('kelas')),
            'hari'      => htmlentities($this->input->post('hari')),
            'jam'       => $jam
        ];

        // Update Data Jadwal
        if ($this->Dashboard_model->updates('tbl_jadwal', 'id_jadwal', $id, $update)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="succes">Data Berhasil di Ubah !!!</div>');
        }
        redirect('dashboard/jadwal', 'refresh');
    }

    // Delete Jadwal
    public function delJadwal($id)
    {
        if ($this->Dashboard_model->deletes('id_jadwal', 'tbl_jadwal', $id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrulation your Data ID = [' .$id.'] has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error</div>');
        }
        redirect('dashboard/jadwal', 'refresh');
    }

    // Module About
    public function about()
    {
        $data	= [
            'titles'	=> "Dashboard Administrator",
            'user'	    => $this->Dashboard_model->view()->result_array(),
            'about'	    => true,
            'icons'     => "fa fa-home",
            'breadcumb'	=> "About",
            'view'		=> "v_about"
        ];
        $this->load->view("index", $data);
    }
}
