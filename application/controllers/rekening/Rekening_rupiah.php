<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_rupiah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_rekRupiah');
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
        $this->db->select('sum(rupiah) as totalJan');
        $this->db->from('data_rekening');
        $this->db->where('bln', 1);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJan = $row->totalJan;
        }

        $this->db->select('sum(rupiah) as totalFeb');
        $this->db->from('data_rekening');
        $this->db->where('bln', 2);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalFeb = $row->totalFeb;
        }
        $this->db->select('sum(rupiah) as totalMar');
        $this->db->from('data_rekening');
        $this->db->where('bln', 3);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalMar = $row->totalMar;
        }
        $this->db->select('sum(rupiah) as totalApr');
        $this->db->from('data_rekening');
        $this->db->where('bln', 4);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalApr = $row->totalApr;
        }
        $this->db->select('sum(rupiah) as totalMei');
        $this->db->from('data_rekening');
        $this->db->where('bln', 5);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalMei = $row->totalMei;
        }
        $this->db->select('sum(rupiah) as totalJun');
        $this->db->from('data_rekening');
        $this->db->where('bln', 6);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJun = $row->totalJun;
        }
        $this->db->select('sum(rupiah) as totalJul');
        $this->db->from('data_rekening');
        $this->db->where('bln', 7);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalJul = $row->totalJul;
        }
        $this->db->select('sum(rupiah) as totalAgs');
        $this->db->from('data_rekening');
        $this->db->where('bln', 8);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalAgs = $row->totalAgs;
        }
        $this->db->select('sum(rupiah) as totalSep');
        $this->db->from('data_rekening');
        $this->db->where('bln', 9);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalSep = $row->totalSep;
        }
        $this->db->select('sum(rupiah) as totalOkt');
        $this->db->from('data_rekening');
        $this->db->where('bln', 10);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalOkt = $row->totalOkt;
        }
        $this->db->select('sum(rupiah) as totalNov');
        $this->db->from('data_rekening');
        $this->db->where('bln', 11);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalNov = $row->totalNov;
        }
        $this->db->select('sum(rupiah) as totalDes');
        $this->db->from('data_rekening');
        $this->db->where('bln', 12);
        $this->db->where('thn', $tahun);
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $totalDes = $row->totalDes;
        }

        // $this->db->select('sum(rupiah) as bonJan');
        // $this->db->from('data_rekening');
        // $this->db->where('bln', 1);
        // $this->db->where('thn', $tahun);
        // $this->db->where('id_upk', 1);
        // $bon = $this->db->get()->result();
        // foreach ($bon as $row) {
        //     $bonJan = $row->bonJan;
        // }

        // $this->db->select('sum(rupiah) as bonFeb');
        // $this->db->from('data_rekening');
        // $this->db->where('bln', 2);
        // $this->db->where('thn', $tahun);
        // $this->db->where('id_upk', 1);
        // $bon = $this->db->get()->result();
        // foreach ($bon as $row) {
        //     $bonFeb = $row->bonFeb;
        // }
        // $this->db->select('sum(rupiah) as bonMar');
        // $this->db->from('data_rekening');
        // $this->db->where('bln', 3);
        // $this->db->where('thn', $tahun);
        // $this->db->where('id_upk', 1);
        // $bon = $this->db->get()->result();
        // foreach ($bon as $row) {
        //     $bonMar = $row->bonMar;
        // }

        $months = array(
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
        );

        for ($i = 1; $i <= 12; $i++) {
            $monthName = $months[$i];

            $this->db->select("SUM(rupiah) as bon$monthName");
            $this->db->from('data_rekening');
            $this->db->where('bln', $i);
            $this->db->where('thn', $tahun);
            $this->db->where('id_upk', 1);
            $bon = $this->db->get()->result();

            foreach ($bon as $row) {
                $bonAmount[$i] = $row->{"bon$monthName"};
            }

            $this->db->select("SUM(rupiah) as suko1$monthName");
            $this->db->from('data_rekening');
            $this->db->where('bln', $i);
            $this->db->where('thn', $tahun);
            $this->db->where('id_upk', 2);
            $suko1 = $this->db->get()->result();

            foreach ($suko1 as $row) {
                $suko1Amount[$i] = $row->{"suko1$monthName"};
            }

            $this->db->select("SUM(rupiah) as maesan$monthName");
            $this->db->from('data_rekening');
            $this->db->where('bln', $i);
            $this->db->where('thn', $tahun);
            $this->db->where('id_upk', 3);
            $maesan = $this->db->get()->result();

            foreach ($maesan as $row) {
                $maesanAmount[$i] = $row->{"maesan$monthName"};
            }
        }


        $data['title'] = 'Rekap Jumlah Pendapatan (Rupiah)';
        $data['upk'] = $this->model_rekRupiah->getUpk();

        $data['jan'] = $this->model_rekRupiah->getJan($tahun);
        $data['feb'] = $this->model_rekRupiah->getFeb($tahun);
        $data['mar'] = $this->model_rekRupiah->getMar($tahun);
        $data['apr'] = $this->model_rekRupiah->getApr($tahun);
        $data['mei'] = $this->model_rekRupiah->getMei($tahun);
        $data['jun'] = $this->model_rekRupiah->getJun($tahun);
        $data['jul'] = $this->model_rekRupiah->getJul($tahun);
        $data['ags'] = $this->model_rekRupiah->getAgs($tahun);
        $data['sep'] = $this->model_rekRupiah->getSep($tahun);
        $data['okt'] = $this->model_rekRupiah->getOkt($tahun);
        $data['nov'] = $this->model_rekRupiah->getNov($tahun);
        $data['des'] = $this->model_rekRupiah->getDes($tahun);

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

        // $data['bonJan'] = $bonAmount[1];
        // $data['bonFeb'] = $bonAmount[2];
        // $data['bonMar'] = $bonAmount[3];
        // $data['bonApr'] = $bonAmount[4];
        // $data['bonMei'] = $bonAmount[5];
        // $data['bonJun'] = $bonAmount[6];
        // $data['bonJul'] = $bonAmount[7];
        // $data['bonAgs'] = $bonAmount[8];
        // $data['bonSep'] = $bonAmount[9];
        // $data['bonOkt'] = $bonAmount[10];
        // $data['bonNov'] = $bonAmount[11];
        // $data['bonDes'] = $bonAmount[12];

        // $data['suko1Jan'] = $suko1Amount[1];
        // $data['suko1Feb'] = $suko1Amount[2];
        // $data['suko1Mar'] = $suko1Amount[3];
        // $data['suko1Apr'] = $suko1Amount[4];
        // $data['suko1Mei'] = $suko1Amount[5];
        // $data['suko1Jun'] = $suko1Amount[6];
        // $data['suko1Jul'] = $suko1Amount[7];
        // $data['suko1Ags'] = $suko1Amount[8];
        // $data['suko1Sep'] = $suko1Amount[9];
        // $data['suko1Okt'] = $suko1Amount[10];
        // $data['suko1Nov'] = $suko1Amount[11];
        // $data['suko1Des'] = $suko1Amount[12];

        $months = array(
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        );

        foreach ($months as $monthNumber => $monthName) {
            $data["bon$monthName"] = $bonAmount[$monthNumber];
            $data["suko1$monthName"] = $suko1Amount[$monthNumber];
            $data["maesan$monthName"] = $maesanAmount[$monthNumber];
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rekening/view_rekeningRupiah', $data);
        $this->load->view('templates/footer', $data);
    }
}
