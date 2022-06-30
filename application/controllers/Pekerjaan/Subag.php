<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subag extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_subag');
    $this->load->library('form_validation');
    if (!$this->session->userdata('nama_pengguna')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = 'Daftar Sub Bagian / UPK';
    $data['subag'] = $this->model_subag->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('subag/view_subag', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'Form Tambah Sub Bagian / UPK';
    $this->form_validation->set_rules('nama_subag', 'Nama Sub Bagian', 'required|trim');

    $this->form_validation->set_message('required', '%s Harus diisi');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/sidebar');
      $this->load->view('subag/view_tambahSubag', $data);
      $this->load->view('templates/footer');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                <strong>Sukses,</strong> data Sub Bagian Berhasil di simpan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );

      $this->model_subag->tambahData();
      redirect('pekerjaan/subag');
    }
  }

  public function edit($id)
  {
    $data['bagian'] = $this->model_subag->getIdsubag($id);
    $data['title'] = 'Form Edit Sub Bagian / UPK';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('subag/view_editSubag', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->model_subag->updateData();
    if ($this->db->affected_rows() <= 0) {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                  <strong>Maaf,</strong> tidak ada perubahan data
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
      );
      redirect('pekerjaan/subag');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                <strong>Sukses,</strong> Data berhasil di update
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
      );
      redirect('pekerjaan/subag');
    }
  }

  public function hapus($id)
  {
    $this->model_subag->hapusData($id);
    $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Sukses,</strong> data Sub Bagian Berhasil di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>');
    redirect('pekerjaan/subag');
  }
}
