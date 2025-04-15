<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kandidat_model');
        $this->load->model('mhs_model');
        $this->load->model('voting_model');
        $this->load->helper('url');

        if ($this->session->userdata('role') !== 'mhs') {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['kandidat'] = $this->kandidat_model->getAllWithSuara();
        $this->load->view('user/index', $data);
    }

    public function detail($id)
    {
        $data['kandidat'] = $this->kandidat_model->getById($id);
        $user_id = $this->session->userdata('user_id');
        $mhs = $this->mhs_model->getByUserId($user_id);
        $data['sudah_memilih'] = $mhs->sudah_memilih;
        $this->load->view('user/detail', $data);
    }

    public function vote($kandidat_id)
    {
        $user_id = $this->session->userdata('user_id');
        $mhs = $this->mhs_model->getByUserId($user_id);

        $cek_vote = $this->voting_model->getByMhsId($mhs->nim);
        if ($mhs->sudah_memilih == 1 || $cek_vote) {
            $this->session->set_flashdata('error', 'Anda sudah melakukan voting, silakan tunggu hasilnya.');
            redirect('user/index');
        }

        $this->voting_model->insert([
            'mhs_id' => $mhs->nim,
            'kandidat_id' => $kandidat_id
        ]);

        $this->mhs_model->update($mhs->nim, ['sudah_memilih' => 1]);
        redirect('user/index');
    }
}
