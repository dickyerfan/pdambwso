<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_kontrak extends CI_Controller
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
        $data['title'] = 'Daftar Karyawan Kontrak';
        $data['karyawanTetap'] = $this->model_karyawan->getKaryawanKontrak();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_karyawanKontrak', $data);
        $this->load->view('templates/footer');
    }
}
