<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_pekerjaan');
    $this->load->library('form_validation');
    if (!$this->session->userdata('nama_pengguna')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = 'Daftar Jabatan';
    $data['pekerjaan'] = $this->model_pekerjaan->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('pekerjaan/view_jabatan', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'Form Tambah Jabatan';
    $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');

    $this->form_validation->set_message('required', '%s Harus diisi');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/sidebar');
      $this->load->view('pekerjaan/view_tambahJabatan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses,</strong> data Jabatan Berhasil di simpan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );

      $this->model_pekerjaan->tambahData();
      redirect('pekerjaan/jabatan');
    }
  }

  public function edit($id)
  {
    $data['jabatan'] = $this->model_pekerjaan->getIdJabatan($id);
    $data['title'] = 'Form Edit Jabatan';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('pekerjaan/view_editJabatan', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->model_pekerjaan->updateData();
    if ($this->db->affected_rows() <= 0) {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Maaf,</strong> tidak ada perubahan data
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
      );
      redirect('pekerjaan/jabatan');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses,</strong> Data Jabatan berhasil di update
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );
      redirect('pekerjaan/jabatan');
    }
  }

  public function hapus($id)
  {
    $this->model_pekerjaan->hapusData($id);
    $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sukses,</strong> data Jabatan Berhasil di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>');
    redirect('pekerjaan/jabatan');
  }
}
