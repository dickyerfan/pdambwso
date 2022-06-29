<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_type');
    $this->load->library('form_validation');
    if (!$this->session->userdata('nama_pengguna')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = 'Daftar Type';
    $data['type'] = $this->model_type->getAll();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('kendaraan/view_type', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['title'] = 'Form Tambah Type';
    $this->form_validation->set_rules('nama_type', 'Nama Type', 'required|trim');

    $this->form_validation->set_message('required', '%s Harus di isi');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/sidebar');
      $this->load->view('kendaraan/view_tambahType', $data);
      $this->load->view('templates/footer');
    } else {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                <strong>Sukses,</strong> data type Berhasil di simpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
      );

      $this->model_type->tambahData();
      redirect('kendaraan/type');
    }
  }

  public function edit($id)
  {
    $data['type'] = $this->model_type->getIdType($id);
    $data['title'] = 'Form Edit Type';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar');
    $this->load->view('kendaraan/view_editType', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->model_type->updateData();
    if ($this->db->affected_rows() <= 0) {
      $this->session->set_flashdata(
        'info',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                      <strong>Maaf,</strong> tidak ada perubahan data
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>'
      );
      redirect('kendaraan/type');
    }
    $this->session->set_flashdata(
      'info',
      '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                  <strong>Sukses,</strong> Data berhasil di update
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'
    );
    redirect('kendaraan/type');
  }

  public function hapus($id)
  {
    $this->model_type->hapusData($id);
    $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
        <strong>Sukses,</strong> data type Berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('kendaraan/type');
  }
}
