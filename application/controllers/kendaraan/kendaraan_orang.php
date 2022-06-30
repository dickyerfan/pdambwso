<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_orang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kendaraan');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Pemegang Kendaraan';
        $data['kendaraan'] = $this->model_kendaraan->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('kendaraan/view_kendaraanOrang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Pemegang Kendaraan';
        $data['kendaraan'] = $this->model_kendaraan->getIdKendaraanOrang($id);
        $data['karyawan'] = $this->db->get_where('karyawan', ['aktif' => '1'])->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_editKendaraanOrang', $data);
        $this->load->view('templates/footer');
    }

    public function updateOrang()
    {
        $this->model_kendaraan->updateData_kendOrang();
        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('kendaraan/kendaraan_orang');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Sukses,</strong> Data berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('kendaraan/kendaraan_orang');
        }
    }

    public function hapus($id)
    {
        $this->model_karyawan->hapusData($id);
        redirect('kendaraan/kendaraan_orang');
    }
}
