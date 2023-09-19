<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_inputData');
        $this->load->library('form_validation');
        // if (!$this->session->userdata('nama_pengguna')) {
        //     redirect('auth');
        // }
        if ($this->session->userdata('level') != 'Admin') {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> Anda harus login sebagai Admin...
                      </div>'
            );
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Input data';
        $data['upk'] = $this->Model_inputData->getAll();
        $this->form_validation->set_rules('id_upk', 'Id UPK', 'required|trim');
        $this->form_validation->set_rules('jml_rek', 'Jumlah Rekening', 'required|trim|integer');
        $this->form_validation->set_rules('air_pakai', 'Air pakai', 'required|trim|integer');
        $this->form_validation->set_rules('rupiah', 'Rupiah', 'required|trim|integer');

        $this->form_validation->set_message('required', '%s Harus di isi');
        $this->form_validation->set_message('integer', '%s Harus berupa angka');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('rekening/view_inputdata', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                  <strong>Sukses,</strong> data Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );

            $this->Model_inputData->tambahData();
            redirect('rekening/input_data');
        }
    }

    public function tambahUpk()
    {
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data UPK Gagal di tambahkan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('rekening/input_data');
        } else {
            $this->Model_inputData->tambahDataUpk();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> data UPK Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('rekening/input_data');
        }
    }

    public function editUpk()
    {
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data UPK Gagal di update
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('rekening/input_data');
        } else {
            $this->Model_inputData->updateUpk();
            if ($this->db->affected_rows() <= 0) {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('rekening/input_data');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Sukses,</strong> Data UPK berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('rekening/input_data');
            }
        }
    }
    public function hapusUpk($id)
    {
        $this->Model_inputData->hapusUpk($id);
        $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sukses,</strong> data UPK Berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>');
        redirect('rekening/input_data');
    }
}
