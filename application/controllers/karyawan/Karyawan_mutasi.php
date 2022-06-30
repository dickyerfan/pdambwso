<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_mutasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_karyawan');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Mutasi Karyawan';
        $data['karyawan'] = $this->model_karyawan->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_karyawanMutasi', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Mutasi Karyawan';
        $data['karyawan'] = $this->model_karyawan->getIdKaryawan($id);
        $data['bagian'] = $this->db->get('bagian')->result();
        $data['subag'] = $this->db->get('subag')->result();
        $data['jabatan'] = $this->db->get('jabatan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_editKaryawanMutasi', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->model_karyawan->updateDataMutasi();
        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('karyawan/karyawan_mutasi');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Sukses,</strong> Data berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('karyawan/karyawan_mutasi');
        }
    }
}
