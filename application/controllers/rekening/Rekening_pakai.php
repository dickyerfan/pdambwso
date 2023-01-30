<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_pakai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_rekPakai');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        if (isset($_POST['pilih'])) {
            $tahun = $this->input->post('tahun');
        } else {
            $tahun = date('Y');
        }
        $this->db->select('sum(air_pakai) as totalJan');
        $this->db->from('data_rekening');
        $this->db->where('bln', 1);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJan = $row->totalJan;
        }

        $this->db->select('sum(air_pakai) as totalFeb');
        $this->db->from('data_rekening');
        $this->db->where('bln', 2);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalFeb = $row->totalFeb;
        }
        $this->db->select('sum(air_pakai) as totalMar');
        $this->db->from('data_rekening');
        $this->db->where('bln', 3);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalMar = $row->totalMar;
        }
        $this->db->select('sum(air_pakai) as totalApr');
        $this->db->from('data_rekening');
        $this->db->where('bln', 4);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalApr = $row->totalApr;
        }
        $this->db->select('sum(air_pakai) as totalMei');
        $this->db->from('data_rekening');
        $this->db->where('bln', 5);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalMei = $row->totalMei;
        }
        $this->db->select('sum(air_pakai) as totalJun');
        $this->db->from('data_rekening');
        $this->db->where('bln', 6);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJun = $row->totalJun;
        }
        $this->db->select('sum(air_pakai) as totalJul');
        $this->db->from('data_rekening');
        $this->db->where('bln', 7);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJul = $row->totalJul;
        }
        $this->db->select('sum(air_pakai) as totalAgs');
        $this->db->from('data_rekening');
        $this->db->where('bln', 8);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalAgs = $row->totalAgs;
        }
        $this->db->select('sum(air_pakai) as totalSep');
        $this->db->from('data_rekening');
        $this->db->where('bln', 9);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalSep = $row->totalSep;
        }
        $this->db->select('sum(air_pakai) as totalOkt');
        $this->db->from('data_rekening');
        $this->db->where('bln', 10);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalOkt = $row->totalOkt;
        }
        $this->db->select('sum(air_pakai) as totalNov');
        $this->db->from('data_rekening');
        $this->db->where('bln', 11);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalNov = $row->totalNov;
        }
        $this->db->select('sum(air_pakai) as totalDes');
        $this->db->from('data_rekening');
        $this->db->where('bln', 12);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalDes = $row->totalDes;
        }

        $data['title'] = 'Rekap Jumlah Air Pakai (M3)';
        $data['upk'] = $this->model_rekPakai->getUpk();
        $data['jan'] = $this->model_rekPakai->getJan($tahun);
        $data['feb'] = $this->model_rekPakai->getFeb($tahun);
        $data['mar'] = $this->model_rekPakai->getMar($tahun);
        $data['apr'] = $this->model_rekPakai->getApr($tahun);
        $data['mei'] = $this->model_rekPakai->getMei($tahun);
        $data['jun'] = $this->model_rekPakai->getJun($tahun);
        $data['jul'] = $this->model_rekPakai->getJul($tahun);
        $data['ags'] = $this->model_rekPakai->getAgs($tahun);
        $data['sep'] = $this->model_rekPakai->getSep($tahun);
        $data['okt'] = $this->model_rekPakai->getOkt($tahun);
        $data['nov'] = $this->model_rekPakai->getNov($tahun);
        $data['des'] = $this->model_rekPakai->getDes($tahun);
        $data['totalJan'] = $totalJan;
        $data['totalFeb'] = $totalFeb;
        $data['totalMar'] = $totalMar;
        $data['totalApr'] = $totalApr;
        $data['totalMei'] = $totalMei;
        $data['totalJun'] = $totalJun;
        $data['totalJul'] = $totalJul;
        $data['totalAgs'] = $totalAgs;
        $data['totalSep'] = $totalSep;
        $data['totalOkt'] = $totalOkt;
        $data['totalNov'] = $totalNov;
        $data['totalDes'] = $totalDes;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rekening/view_rekeningPakai', $data);
        $this->load->view('templates/footer');
    }
}
