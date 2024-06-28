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
        // $data['karyawanTetap'] = $this->model_karyawan->getKaryawanKontrak();
        $apiUrl = 'http://103.160.148.174/Api_pegawai';

        $output = file_get_contents($apiUrl);
        $response = json_decode($output, true);

        $data['karyawanKontrak'] = $response['karyawanKontrak'];

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('karyawan/view_karyawanKontrak', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar_pengguna');
            $this->load->view('karyawan/view_karyawanKontrak', $data);
            $this->load->view('templates/footer');
        }
    }
}
