<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['kandidat_model', 'voting_model', 'mhs_model']);
        $this->load->library('session');
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $mhs = $this->MhsModel->getByUserId($user->id);

        if ($mhs->sudah_memilih) {
            echo "Kamu sudah memilih.";
            return;
        }

        $data['kandidat'] = $this->KandidatModel->getAllWithMhs();
        $this->load->view('voting/index', $data);
    }

    public function pilih($kandidat_id)
    {
        $user = $this->session->userdata('user');
        $mhs = $this->MhsModel->getByUserId($user->id);

        if ($mhs->sudah_memilih) {
            redirect('voting');
        }

        $this->VotingModel->insert([
            'mhs_id' => $mhs->nim,
            'kandidat_id' => $kandidat_id
        ]);

        $this->MhsModel->updateStatusMemilih($mhs->nim);
        redirect('voting');
    }
}
