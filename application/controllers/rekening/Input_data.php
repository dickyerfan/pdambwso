<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_inputData');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Input data';
        $data['upk'] = $this->model_inputData->getAll();
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

            $this->model_inputData->tambahData();
            redirect('rekening/input_data');
        }
    }
}
