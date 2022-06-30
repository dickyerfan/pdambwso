<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('level') != 'Pengguna') {
            redirect('auth');
        }
        $data['title'] = 'Halaman Pengguna';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        // $this->load->view('templates/sidebar');
        $this->load->view('pengguna/view_pengguna', $data);
        $this->load->view('templates/footer');
    }
}
