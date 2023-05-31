<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_tetap extends CI_Controller
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
        $data['title'] = 'Daftar Karyawan tetap';
        $data['karyawanTetap'] = $this->model_karyawan->getKaryawanTetap();
        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('karyawan/view_karyawanTetap', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar_pengguna');
            $this->load->view('karyawan/view_karyawanTetap', $data);
            $this->load->view('templates/footer');
        }
    }
}
