<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('kandidat_model');
        $this->load->helper(['form', 'url']);

        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('user/index');
        }
    }


    public function index()
    {
        // Mengambil data kandidat dari database
        $data['kandidat'] = $this->kandidat_model->getAllWithSuara();

        // Menampilkan halaman dashboard yang ada di dalam folder admin
        $this->load->view('admin/dashboard', $data);
    }

    public function form()
    {
        $this->load->model('mhs_model');
        $data['mahasiswa'] = $this->mhs_model->getAll();
        $this->load->view('admin/form', $data);
    }

    public function store()
    {
        $mhs_id = $this->input->post('mhs_id');
        $no_urut = $this->input->post('no_urut');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'kandidat_' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];
        } else {
            $foto = null;
        }

        // Validasi
        if ($mhs_id && $no_urut && $foto) {
            $this->kandidat_model->insert([
                'mhs_id' => $mhs_id,
                'no_urut' => $no_urut,
                'foto' => $foto,
                'visi' => $visi,
                'misi' => $misi
            ]);
            redirect('dashboard');
        } else {
            echo "Data tidak lengkap atau foto gagal diupload.";
        }
    }

    public function edit($id)
    {
        
    $data['kandidat'] = $this->kandidat_model->getById($id);

    if (!$data['kandidat']) {
        redirect('dashboard');
    }

    $this->load->view('admin/form_edit', $data);

    }


    public function update($id)
    {
        $mhs_id = $this->input->post('mhs_id');
        $no_urut = $this->input->post('no_urut');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');

        // Handle upload foto
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1024; // 1MB
        $config['file_name'] = 'kandidat_' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];
        } else {
            // $foto = null; // If no file uploaded, keep the existing one
            $kandidat = $this->kandidat_model->getById($id);
            $foto = $kandidat['foto'];
        }

        $this->kandidat_model->update($id, [
            'mhs_id' => $mhs_id,
            'no_urut' => $no_urut,
            'foto' => $foto,
            'visi' => $visi,
            'misi' => $misi
        ]);

        redirect('dashboard');
    }

    public function delete($id)
    {
        $this->kandidat_model->delete($id);
        redirect('dashboard');
    }
}
