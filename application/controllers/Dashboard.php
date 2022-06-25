<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
    }
    public function index()
    {
        $data['judul'] = "Daftar Mahasiswa";
        $data['user'] = "Bilal Zaidan";
        $data['mahasiswa'] = $this->model_dashboard->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa/view_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Mahasiswa";
        $data['user'] = "Bilal Zaidan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa/view_tambahMahasiswa');
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        echo 'OK';
    }
}
