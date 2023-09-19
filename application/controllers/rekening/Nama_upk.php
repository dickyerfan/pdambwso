<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nama_upk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_upk');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar U P K';
        $data['upk'] = $this->Model_upk->getUpk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rekening/view_upk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah UPK';
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');

        $this->form_validation->set_message('required', '%s Harus di isi');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('rekening/view_tambahUpk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> data UPK Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            $this->Model_upk->tambahData();
            redirect('rekening/nama_upk');
        }
    }

    public function edit($id)
    {
        $data['upk'] = $this->Model_upk->getIdUpk($id);
        $data['title'] = 'Form Edit UPK';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rekening/view_editUpk', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->Model_upk->updateData();
        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf,</strong> tidak ada perubahan data
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                  </div>'
            );
            redirect('rekening/nama_upk');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> Data berhasil di update
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('rekening/nama_upk');
        }
    }

    public function hapus($id)
    {
        $this->Model_upk->hapusData($id);
        $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sukses,</strong> data UPK Berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>');
        redirect('rekening/nama_upk');
    }
}
