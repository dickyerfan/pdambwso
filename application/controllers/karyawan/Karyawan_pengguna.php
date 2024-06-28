<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_karyawan');
        $this->load->library('form_validation');
        if ($this->session->userdata('level') != 'Pengguna') {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> Anda harus login sebagai Pengguna...
                      </div>'
            );
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Karyawan PDAM Bondowoso';
        // $data['karyawan'] = $this->Model_karyawan->getAllPengguna();

        // $data['kartotal'] = $this->db->get_where('karyawan', ['aktif' => '1'])->num_rows();
        // $data['kartetap'] = $this->db->get_where('karyawan', [
        //     'status_pegawai' => 'Karyawan Tetap',
        //     'aktif' => '1',
        // ])->num_rows();
        // $data['karkontrak'] = $this->db->get_where('karyawan', [
        //     'status_pegawai' => 'Karyawan Kontrak',
        //     'aktif' => '1',
        // ])->num_rows();
        // $data['karhonorer'] = $this->db->get_where('karyawan', [
        //     'status_pegawai' => 'Karyawan Honorer',
        //     'aktif' => '1',
        // ])->num_rows();
        // $data['karpurna'] = $this->db->get_where('karyawan', [
        //     'aktif' => '0',
        // ])->num_rows();

        $apiUrl = 'http://103.160.148.174/Api_pegawai';

        $output = file_get_contents($apiUrl);
        $response = json_decode($output, true);

        // Mengkonversi output JSON ke array PHP
        $data['karyawan'] = $response['karyawan'];
        $data['kartotal'] = $response['kartotal'];
        $data['kartetap'] = $response['kartetap'];
        $data['karkontrak'] = $response['karkontrak'];
        $data['karhonorer'] = $response['karhonorer'];
        $data['karpurna'] = $response['karpurna'];

        // Pastikan data sudah diambil dengan benar
        if ($data === null) {
            $data = [];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar_pengguna');
        $this->load->view('karyawan/view_karyawanPengguna', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Karyawan PDAM Bondowoso';
        $apiUrl = 'http://103.160.148.174/Api_pegawai/detail/' . $id;

        $output = file_get_contents($apiUrl);
        $response = json_decode($output, true);

        $data['karyawan'] = $response;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_detailKaryawanSemua', $data);
        $this->load->view('templates/footer');
    }
}
