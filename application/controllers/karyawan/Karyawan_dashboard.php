<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan_dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard Karyawan';

        $data['kartotal'] = $this->db->get_where('karyawan', ['aktif' => '1'])->num_rows();
        $data['kartetap'] = $this->db->get_where('karyawan', [
            'status_pegawai' => 'Karyawan Tetap',
            'aktif' => '1',
        ])->num_rows();
        $data['karkontrak'] = $this->db->get_where('karyawan', [
            'status_pegawai' => 'Karyawan Kontrak',
            'aktif' => '1',
        ])->num_rows();
        $data['karhonorer'] = $this->db->get_where('karyawan', [
            'status_pegawai' => 'Karyawan Honorer',
            'aktif' => '1',
        ])->num_rows();
        $data['karpurna'] = $this->db->get_where('karyawan', [
            'aktif' => '0',
        ])->num_rows();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_karyawanDashboard', $data);
        $this->load->view('templates/footer');
    }
}
