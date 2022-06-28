<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = "Daftar Mahasiswa";
        $data['user'] = "Bilal Zaidan";
        $data['mahasiswa'] = $this->model_dashboard->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa/view_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Mahasiswa";
        $data['user'] = "Bilal Zaidan";

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|trim|min_length[10]|is_unique[mahasiswa.nrp]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('valid_email', '%s harus valid');
        $this->form_validation->set_message('min_length', '%s Minimal 10 digit');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('mahasiswa/view_tambahMahasiswa');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'nrp' => $this->input->post('nrp', true),
                'email' => $this->input->post('email', true),
                'jurusan' => $this->input->post('jurusan', true),
            ];
            $this->model_dashboard->tambahData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
            <strong>Sukses</strong> Data Berhasil di tambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('dashboard');
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Update Mahasiswa";
        $data['user'] = "Bilal Zaidan";
        $data['mahasiswa'] = $this->model_dashboard->getIdMahasiswa($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa/view_editMahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'nrp' => $this->input->post('nrp', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),
        ];
        $this->model_dashboard->updateData($data);
        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:50%;">
            <strong>Maaf</strong> Tidak ada Update yang dilakukan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="width:50%;">
            <strong>Sukses</strong> Data Berhasil di update
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('dashboard');
        }
    }

    public function hapus($id)
    {
        $this->model_dashboard->hapusData($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Sukses</strong> Data Berhasil di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('dashboard');
    }
}
