<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bagian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_bagian');
    $this->load->library('form_validation');
    if (!$this->session->userdata('nama_pengguna')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = 'Daftar Bagian';
    $data['bagian'] = $this->model_bagian->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('bagian/view_Bagian', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'Form Tambah Bagian';
    $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required|trim');

    $this->form_validation->set_message('required', '%s Harus di isi');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/sidebar');
      $this->load->view('bagian/view_tambahBagian', $data);
      $this->load->view('templates/footer');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                <strong>Sukses,</strong> data Bagian Berhasil di simpan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );

      $this->model_bagian->tambahData();
      redirect('pekerjaan/Bagian');
    }
  }

  public function edit($id)
  {
    $data['bagian'] = $this->model_bagian->getIdBagian($id);
    $data['title'] = 'Form Edit Bagian';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('bagian/view_editBagian', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->model_bagian->updateData();
    if ($this->db->affected_rows() <= 0) {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                  <strong>Maaf,</strong> tidak ada perubahan data
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
      );
      redirect('pekerjaan/bagian');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                <strong>Sukses,</strong> Data berhasil di update
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );
      redirect('pekerjaan/bagian');
    }
  }

  public function hapus($id)
  {
    $this->model_bagian->hapusData($id);
    $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Sukses,</strong> data Bagian Berhasil di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>');
    redirect('pekerjaan/Bagian');
  }
}
