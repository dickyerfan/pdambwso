<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_merk');
    $this->load->library('form_validation');
    if (!$this->session->userdata('nama_pengguna')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = 'Daftar Merk';
    $data['merk'] = $this->model_merk->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('kendaraan/view_Merk', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'Form Tambah Merk';
    $this->form_validation->set_rules('nama_merk', 'Nama Merk', 'required|trim');

    $this->form_validation->set_message('required', '%s Harus di isi');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/sidebar');
      $this->load->view('kendaraan/view_tambahMerk', $data);
      $this->load->view('templates/footer');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses,</strong> data Merk Berhasil di simpan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );

      $this->model_merk->tambahData();
      redirect('kendaraan/merk');
    }
  }

  public function edit($id)
  {
    $data['merk'] = $this->model_merk->getIdMerk($id);
    $data['title'] = 'Form Edit Merk';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('kendaraan/view_editMerk', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->model_merk->updateData();
    if ($this->db->affected_rows() <= 0) {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Maaf,</strong> tidak ada perubahan data
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
      );
      redirect('kendaraan/merk');
    }
    $this->session->set_flashdata(
      'info',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Sukses,</strong> Data berhasil di update
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>'
    );
    redirect('kendaraan/merk');
  }

  public function hapus($id)
  {
    $this->model_merk->hapusData($id);
    $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sukses,</strong> data Merk Berhasil di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('kendaraan/merk');
  }
}
