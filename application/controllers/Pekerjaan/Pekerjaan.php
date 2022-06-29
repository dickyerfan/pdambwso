<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pekerjaan';

        $data['jabatan'] = $this->db->get('jabatan')->num_rows();
        $data['bagian'] = $this->db->get('bagian')->num_rows();
        $data['subag'] = $this->db->get('subag')->num_rows();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pekerjaan/view_pekerjaan', $data);
        $this->load->view('templates/footer');
    }
}
