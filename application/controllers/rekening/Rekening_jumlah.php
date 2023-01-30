<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_jumlah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_upk');
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

        $this->db->select('sum(jml_rek) as totalJan');
        $this->db->from('data_rekening');
        $this->db->where('bln', 1);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJan = $row->totalJan;
        }

        $this->db->select('sum(jml_rek) as totalFeb');
        $this->db->from('data_rekening');
        $this->db->where('bln', 2);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalFeb = $row->totalFeb;
        }
        $this->db->select('sum(jml_rek) as totalMar');
        $this->db->from('data_rekening');
        $this->db->where('bln', 3);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalMar = $row->totalMar;
        }
        $this->db->select('sum(jml_rek) as totalApr');
        $this->db->from('data_rekening');
        $this->db->where('bln', 4);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalApr = $row->totalApr;
        }
        $this->db->select('sum(jml_rek) as totalMei');
        $this->db->from('data_rekening');
        $this->db->where('bln', 5);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalMei = $row->totalMei;
        }
        $this->db->select('sum(jml_rek) as totalJun');
        $this->db->from('data_rekening');
        $this->db->where('bln', 6);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJun = $row->totalJun;
        }
        $this->db->select('sum(jml_rek) as totalJul');
        $this->db->from('data_rekening');
        $this->db->where('bln', 7);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJul = $row->totalJul;
        }
        $this->db->select('sum(jml_rek) as totalAgs');
        $this->db->from('data_rekening');
        $this->db->where('bln', 8);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalAgs = $row->totalAgs;
        }
        $this->db->select('sum(jml_rek) as totalSep');
        $this->db->from('data_rekening');
        $this->db->where('bln', 9);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalSep = $row->totalSep;
        }
        $this->db->select('sum(jml_rek) as totalOkt');
        $this->db->from('data_rekening');
        $this->db->where('bln', 10);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalOkt = $row->totalOkt;
        }
        $this->db->select('sum(jml_rek) as totalNov');
        $this->db->from('data_rekening');
        $this->db->where('bln', 11);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalNov = $row->totalNov;
        }
        $this->db->select('sum(jml_rek) as totalDes');
        $this->db->from('data_rekening');
        $this->db->where('bln', 12);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalDes = $row->totalDes;
        }



        $data['title'] = 'Rekap Jumlah Rekening Air (Lembar)';
        $data['upk'] = $this->model_upk->getUpk();
        $data['jan'] = $this->model_upk->getJan($tahun);
        $data['feb'] = $this->model_upk->getFeb($tahun);
        $data['mar'] = $this->model_upk->getMar($tahun);
        $data['apr'] = $this->model_upk->getApr($tahun);
        $data['mei'] = $this->model_upk->getMei($tahun);
        $data['jun'] = $this->model_upk->getJun($tahun);
        $data['jul'] = $this->model_upk->getJul($tahun);
        $data['ags'] = $this->model_upk->getAgs($tahun);
        $data['sep'] = $this->model_upk->getSep($tahun);
        $data['okt'] = $this->model_upk->getOkt($tahun);
        $data['nov'] = $this->model_upk->getNov($tahun);
        $data['des'] = $this->model_upk->getDes($tahun);
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
        $this->load->view('rekening/view_rekeningJumlah', $data);
        $this->load->view('templates/footer');
    }
}
