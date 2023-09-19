<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_rekening');
        $this->load->library('form_validation');

        if (!$this->session->userdata('nama_pengguna')) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> Anda harus login 
                      </div>'
            );
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

        $totals = array();

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $this->db->select('sum(rupiah) as total');
            $this->db->from('data_rekening');
            $this->db->where('bln', $bulan);
            $this->db->where('thn', $tahun);
            $result = $this->db->get()->result();

            foreach ($result as $row) {
                $totals[$bulan] = $row->total;
            }
        }

        $totalJumRek = array();

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $this->db->select('sum(jml_rek) as total');
            $this->db->from('data_rekening');
            $this->db->where('bln', $bulan);
            $this->db->where('thn', $tahun);
            $result = $this->db->get()->result();

            foreach ($result as $row) {
                $totalJumRek[$bulan] = $row->total;
            }
        }

        $totalAirPakai = array();

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $this->db->select('sum(air_pakai) as total');
            $this->db->from('data_rekening');
            $this->db->where('bln', $bulan);
            $this->db->where('thn', $tahun);
            $result = $this->db->get()->result();

            foreach ($result as $row) {
                $totalAirPakai[$bulan] = $row->total;
            }
        }

        $data['title'] = 'Data Rekening';
        $data['titlePendapatan'] = 'Rekap Jumlah Pendapatan (Rupiah)';
        $data['titleJumrek'] = 'Rekap Jumlah Rekening Air (Lembar)';
        $data['titleAirPakai'] = 'Rekap Jumlah Pemakaian Air (M3)';
        $data['upk'] = $this->Model_rekening->getUpk();

        // $data = array();
        $bulan = array('jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'ags', 'sep', 'okt', 'nov', 'des');

        foreach ($bulan as $index => $nama_bulan) {
            $data[$nama_bulan] = $this->Model_rekening->getDataByMonth($index + 1, $tahun);
        }

        $data['totalJan'] = $totals[1];
        $data['totalFeb'] = $totals[2];
        $data['totalMar'] = $totals[3];
        $data['totalApr'] = $totals[4];
        $data['totalMei'] = $totals[5];
        $data['totalJun'] = $totals[6];
        $data['totalJul'] = $totals[7];
        $data['totalAgs'] = $totals[8];
        $data['totalSep'] = $totals[9];
        $data['totalOkt'] = $totals[10];
        $data['totalNov'] = $totals[11];
        $data['totalDes'] = $totals[12];

        $data['totalJan2'] = $totalJumRek[1];
        $data['totalFeb2'] = $totalJumRek[2];
        $data['totalMar2'] = $totalJumRek[3];
        $data['totalApr2'] = $totalJumRek[4];
        $data['totalMei2'] = $totalJumRek[5];
        $data['totalJun2'] = $totalJumRek[6];
        $data['totalJul2'] = $totalJumRek[7];
        $data['totalAgs2'] = $totalJumRek[8];
        $data['totalSep2'] = $totalJumRek[9];
        $data['totalOkt2'] = $totalJumRek[10];
        $data['totalNov2'] = $totalJumRek[11];
        $data['totalDes2'] = $totalJumRek[12];

        $data['totalJan3'] = $totalAirPakai[1];
        $data['totalFeb3'] = $totalAirPakai[2];
        $data['totalMar3'] = $totalAirPakai[3];
        $data['totalApr3'] = $totalAirPakai[4];
        $data['totalMei3'] = $totalAirPakai[5];
        $data['totalJun3'] = $totalAirPakai[6];
        $data['totalJul3'] = $totalAirPakai[7];
        $data['totalAgs3'] = $totalAirPakai[8];
        $data['totalSep3'] = $totalAirPakai[9];
        $data['totalOkt3'] = $totalAirPakai[10];
        $data['totalNov3'] = $totalAirPakai[11];
        $data['totalDes3'] = $totalAirPakai[12];

        // awal kode untuk pendapatan per upk
        $months = array(
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        );

        // for ($i = 1; $i <= 12; $i++) {
        //     $monthName = $months[$i];

        //     $this->db->select("SUM(rupiah) as bon$monthName");
        //     $this->db->from('data_rekening');
        //     $this->db->where('bln', $i);
        //     $this->db->where('thn', $tahun);
        //     $this->db->where('id_upk', 1);
        //     $bon = $this->db->get()->result();

        //     foreach ($bon as $row) {
        //         $bonAmount[$i] = $row->{"bon$monthName"};
        //     }

        //     $this->db->select("SUM(rupiah) as suko1$monthName");
        //     $this->db->from('data_rekening');
        //     $this->db->where('bln', $i);
        //     $this->db->where('thn', $tahun);
        //     $this->db->where('id_upk', 2);
        //     $suko1 = $this->db->get()->result();

        //     foreach ($suko1 as $row) {
        //         $suko1Amount[$i] = $row->{"suko1$monthName"};
        //     }

        //     $this->db->select("SUM(rupiah) as maesan$monthName");
        //     $this->db->from('data_rekening');
        //     $this->db->where('bln', $i);
        //     $this->db->where('thn', $tahun);
        //     $this->db->where('id_upk', 3);
        //     $maesan = $this->db->get()->result();

        //     foreach ($maesan as $row) {
        //         $maesanAmount[$i] = $row->{"maesan$monthName"};
        //     }

        //     $this->db->select("SUM(rupiah) as tegalampel$monthName");
        //     $this->db->from('data_rekening');
        //     $this->db->where('bln', $i);
        //     $this->db->where('thn', $tahun);
        //     $this->db->where('id_upk', 4);
        //     $tegalampel = $this->db->get()->result();

        //     foreach ($tegalampel as $row) {
        //         $tegalampelAmount[$i] = $row->{"tegalampel$monthName"};
        //     }
        // }
        for ($i = 1; $i <= 12; $i++) {
            $monthName = $months[$i];

            $upks = [
                1 => 'bon',
                2 => 'suko1',
                3 => 'msn',
                4 => 'tgl',
                5 => 'tpn',
                6 => 'pjk',
                7 => 'tlg',
                8 => 'wrg',
                9 => 'crd',
                10 => 'tmn',
                11 => 'tgr',
                12 => 'tmk',
                13 => 'wns',
                14 => 'klb',
                15 => 'suko2'
            ];

            foreach ($upks as $upkId => $upkName) {
                $columnName = $upkName . $monthName;

                $this->db->select("SUM(rupiah) as $columnName");
                $this->db->from('data_rekening');
                $this->db->where('bln', $i);
                $this->db->where('thn', $tahun);
                $this->db->where('id_upk', $upkId);

                $result = $this->db->get()->result();

                foreach ($result as $row) {
                    ${$upkName . 'Amount'}[$i] = $row->$columnName;
                }
            }
        }

        foreach ($months as $monthNumber => $monthName) {
            $data["bon$monthName"] = $bonAmount[$monthNumber];
            $data["suko1$monthName"] = $suko1Amount[$monthNumber];
            $data["msn$monthName"] = $msnAmount[$monthNumber];
            $data["tgl$monthName"] = $tglAmount[$monthNumber];
            $data["tpn$monthName"] = $tpnAmount[$monthNumber];
            $data["pjk$monthName"] = $pjkAmount[$monthNumber];
            $data["tlg$monthName"] = $tlgAmount[$monthNumber];
            $data["wrg$monthName"] = $wrgAmount[$monthNumber];
            $data["crd$monthName"] = $crdAmount[$monthNumber];
            $data["tmn$monthName"] = $tmnAmount[$monthNumber];
            $data["tgr$monthName"] = $tgrAmount[$monthNumber];
            $data["tmk$monthName"] = $tmkAmount[$monthNumber];
            $data["wns$monthName"] = $wnsAmount[$monthNumber];
            $data["klb$monthName"] = $klbAmount[$monthNumber];
            $data["suko2$monthName"] = $suko2Amount[$monthNumber];
        }
        // akhir kode untuk pendapatan per upk

        // awal kode untuk jumlah rekening per upk

        for ($i = 1; $i <= 12; $i++) {
            $monthName = $months[$i];

            foreach ($upks as $upkId => $upkName) {
                $jumRekName = $upkName . $monthName;

                $this->db->select("SUM(jml_rek) as $jumRekName");
                $this->db->from('data_rekening');
                $this->db->where('bln', $i);
                $this->db->where('thn', $tahun);
                $this->db->where('id_upk', $upkId);

                $result = $this->db->get()->result();

                foreach ($result as $row) {
                    ${$upkName . 'JumRek'}[$i] = $row->$jumRekName;
                }
            }
        }

        foreach ($months as $monthNumber => $monthName) {
            $data["bonJumRek$monthName"] = $bonJumRek[$monthNumber];
            $data["suko1JumRek$monthName"] = $suko1JumRek[$monthNumber];
            $data["msnJumRek$monthName"] = $msnJumRek[$monthNumber];
            $data["tglJumRek$monthName"] = $tglJumRek[$monthNumber];
            $data["tpnJumRek$monthName"] = $tpnJumRek[$monthNumber];
            $data["pjkJumRek$monthName"] = $pjkJumRek[$monthNumber];
            $data["tlgJumRek$monthName"] = $tlgJumRek[$monthNumber];
            $data["wrgJumRek$monthName"] = $wrgJumRek[$monthNumber];
            $data["crdJumRek$monthName"] = $crdJumRek[$monthNumber];
            $data["tmnJumRek$monthName"] = $tmnJumRek[$monthNumber];
            $data["tgrJumRek$monthName"] = $tgrJumRek[$monthNumber];
            $data["tmkJumRek$monthName"] = $tmkJumRek[$monthNumber];
            $data["wnsJumRek$monthName"] = $wnsJumRek[$monthNumber];
            $data["klbJumRek$monthName"] = $klbJumRek[$monthNumber];
            $data["suko2JumRek$monthName"] = $suko2JumRek[$monthNumber];
        }
        // akhir kode untuk jumlah rekening per upk

        // awal kode untuk Air Pakai per upk

        for ($i = 1; $i <= 12; $i++) {
            $monthName = $months[$i];

            foreach ($upks as $upkId => $upkName) {
                $airPakaiName = $upkName . $monthName;

                $this->db->select("SUM(air_pakai) as $airPakaiName");
                $this->db->from('data_rekening');
                $this->db->where('bln', $i);
                $this->db->where('thn', $tahun);
                $this->db->where('id_upk', $upkId);

                $result = $this->db->get()->result();

                foreach ($result as $row) {
                    ${$upkName . 'AirPakai'}[$i] = $row->$airPakaiName;
                }
            }
        }

        foreach ($months as $monthNumber => $monthName) {
            $data["bonAirPakai$monthName"] = $bonAirPakai[$monthNumber];
            $data["suko1AirPakai$monthName"] = $suko1AirPakai[$monthNumber];
            $data["msnAirPakai$monthName"] = $msnAirPakai[$monthNumber];
            $data["tglAirPakai$monthName"] = $tglAirPakai[$monthNumber];
            $data["tpnAirPakai$monthName"] = $tpnAirPakai[$monthNumber];
            $data["pjkAirPakai$monthName"] = $pjkAirPakai[$monthNumber];
            $data["tlgAirPakai$monthName"] = $tlgAirPakai[$monthNumber];
            $data["wrgAirPakai$monthName"] = $wrgAirPakai[$monthNumber];
            $data["crdAirPakai$monthName"] = $crdAirPakai[$monthNumber];
            $data["tmnAirPakai$monthName"] = $tmnAirPakai[$monthNumber];
            $data["tgrAirPakai$monthName"] = $tgrAirPakai[$monthNumber];
            $data["tmkAirPakai$monthName"] = $tmkAirPakai[$monthNumber];
            $data["wnsAirPakai$monthName"] = $wnsAirPakai[$monthNumber];
            $data["klbAirPakai$monthName"] = $klbAirPakai[$monthNumber];
            $data["suko2AirPakai$monthName"] = $suko2AirPakai[$monthNumber];
        }
        // akhir kode untuk Air Pakai per upk

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('rekening/view_rekening', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar_pengguna');
            $this->load->view('rekening/view_rekening', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tambahUpk()
    {
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data UPK Gagal di tambahkan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('rekening/rekening');
        } else {
            $this->Model_rekening->tambahDataUpk();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> data UPK Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('rekening/rekening');
        }
    }

    public function editUpk()
    {
        $this->form_validation->set_rules('nama_upk', 'Nama UPK', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data UPK Gagal di update
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('rekening/rekening');
        } else {
            $this->Model_rekening->updateUpk();
            if ($this->db->affected_rows() <= 0) {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('rekening/rekening');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Sukses,</strong> Data UPK berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('rekening/rekening');
            }
        }
    }
    public function hapusUpk($id)
    {
        $this->Model_rekening->hapusUpk($id);
        $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sukses,</strong> data UPK Berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>');
        redirect('rekening/rekening');
    }

    public function tambahData()
    {
        $data['upk'] = $this->Model_rekening->getUpk();
        $this->form_validation->set_rules('id_upk', 'Id UPK', 'required|trim');
        $this->form_validation->set_rules('jml_rek', 'Jumlah Rekening', 'required|trim|integer');
        $this->form_validation->set_rules('air_pakai', 'Air pakai', 'required|trim|integer');
        $this->form_validation->set_rules('rupiah', 'Rupiah', 'required|trim|integer');

        $this->form_validation->set_message('required', '%s Harus di isi');
        $this->form_validation->set_message('integer', '%s Harus berupa angka');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Input Gagal di tambahkan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('rekening/rekening');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                  <strong>Sukses,</strong> Data Input Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );

            $this->Model_rekening->tambahData();
            redirect('rekening/rekening');
        }
    }
}
