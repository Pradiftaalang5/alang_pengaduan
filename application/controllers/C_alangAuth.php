<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_alangAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            // Gagal validasi
            $data['title'] = 'Login Account';
            $this->load->view('V_alangLogin', $data);
        } else {

            // Lolos validasi
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();

        // jika user ada
        if ($user) {

            // cek password 
            if (password_verify($password, $user['password'])) {

                $data = [
                    'username' => $user['username'],
                    'password' => $user['password'],
                ];


                // kondisi
                $this->session->set_userdata($data);
                if ($this->form_validation->run() == true) {

                    redirect('C_alangDashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Wrong password !
          </div>');
                redirect('C_alangAuth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username is not registered !
		  	</div>');
            redirect('C_alangAuth/');
        }
    }



    public function register()
    {
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'password dont match !',
                'min_length' => 'password too short !',
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            // gagal register
            $data['title'] = 'Register Account';
            $this->load->view('V_alangRegister', $data);
        } else {

            $data = [
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'telp' => htmlspecialchars($this->input->post('telepon', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
            redirect('C_alangAuth');
        }
    }

    public function loginuser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            // Gagal validasi
            $data['title'] = 'Login Account';
            $this->load->view('V_LoginUser', $data);
        } else {

            // Lolos validasi
            $this->_loginuser();
        }
    }

    private function _loginuser()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

        // jika user ada
        if ($user) {

            // cek password 
            if (password_verify($password, $user['password'])) {

                $data = [
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'nik'=>$user['nik'],
                ];

            
                // kondisi
                $this->session->set_userdata($data);
                if ($this->form_validation->run() == true) {

                    redirect('C_alangUser');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Wrong password !
          </div>');
                redirect('C_alangAuth/loginuser');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username is not registered !
		  	</div>');
            redirect('C_alangAuth/loginuser');
        }
    }



    public function registeruser()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'password dont match !',
                'min_length' => 'password too short !',
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            // gagal register
            $data['title'] = 'Register Account';
            $this->load->view('V_RegisterUser', $data);
        } else {

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
            redirect('C_alangAuth/loginuser');
        }
    }

    public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('C_alangAuth');
	}

	public function logoutUser()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('C_alangAuth/loginUser');
	}
}