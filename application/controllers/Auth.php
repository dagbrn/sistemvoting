<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('mhs_model');
        $this->load->library('session');
        $this->load->helper(['form', 'url']);
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function register_process()
    {
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');

        // Simpan ke tabel users
        $this->user_model->insert([
            'email' => $email,
            'password' => $password,
            'role' => 'mhs'
        ]);

        // Ambil ID user yang barusan dibuat
        $user_id = $this->db->insert_id();

        // Simpan ke tabel mhs
        $this->mhs_model->insert([
            'user_id' => $user_id,
            'nim' => $nim,
            'nama' => $nama,
            'sudah_memilih' => 0
        ]);

        redirect('auth/login');
    }


    public function login()
    {
        $this->load->view('auth/login');
    }

    public function login_process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user_model->findByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => true
            ]);
            redirect('dashboard');
        } else {
            // echo "Login gagal. Cek email dan password.";
            $this->session->set_flashdata('error', 'Email atau password salah');
			redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
