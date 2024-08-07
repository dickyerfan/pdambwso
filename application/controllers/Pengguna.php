<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('nama_pengguna')) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> Anda harus login untuk akses halaman ini...
                      </div>'
            );
            redirect('auth');
        }
        if ($this->session->userdata('level') != 'Pengguna') {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	                    <strong>Maaf,</strong> Anda harus login sebagai Pengguna...
	                  </div>'
            );
            redirect('auth');
        }

        $urls = [
            'direktur' => 'http://103.160.148.174/api_pegawai_dashboard/get_direktur',
            'spi' => 'http://103.160.148.174/api_pegawai_dashboard/get_spi',
            'langganan' => 'http://103.160.148.174/api_pegawai_dashboard/get_langganan',
            'umum' => 'http://103.160.148.174/api_pegawai_dashboard/get_umum',
            'keuangan' => 'http://103.160.148.174/api_pegawai_dashboard/get_keuangan',
            'perencanaan' => 'http://103.160.148.174/api_pegawai_dashboard/get_perencanaan',
            'pemeliharaan' => 'http://103.160.148.174/api_pegawai_dashboard/get_pemeliharaan',
            'bondowoso' => 'http://103.160.148.174/api_pegawai_dashboard/get_bondowoso',
            'sukosari_1' => 'http://103.160.148.174/api_pegawai_dashboard/get_sukosari_1',
            'maesan' => 'http://103.160.148.174/api_pegawai_dashboard/get_maesan',
            'tegalampel' => 'http://103.160.148.174/api_pegawai_dashboard/get_tegalampel',
            'tapen' => 'http://103.160.148.174/api_pegawai_dashboard/get_tapen',
            'prajekan' => 'http://103.160.148.174/api_pegawai_dashboard/get_prajekan',
            'tlogosari' => 'http://103.160.148.174/api_pegawai_dashboard/get_tlogosari',
            'wringin' => 'http://103.160.148.174/api_pegawai_dashboard/get_wringin',
            'curahdami' => 'http://103.160.148.174/api_pegawai_dashboard/get_curahdami',
            'tamanan' => 'http://103.160.148.174/api_pegawai_dashboard/get_tamanan',
            'tenggarang' => 'http://103.160.148.174/api_pegawai_dashboard/get_tenggarang',
            'tamankrocok' => 'http://103.160.148.174/api_pegawai_dashboard/get_tamankrocok',
            'wonosari' => 'http://103.160.148.174/api_pegawai_dashboard/get_wonosari',
            'sukosari_2' => 'http://103.160.148.174/api_pegawai_dashboard/get_sukosari_2',
            'amdk' => 'http://103.160.148.174/api_pegawai_dashboard/get_amdk'
        ];

        $data = [];
        foreach ($urls as $key => $url) {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                show_error('Error fetching data from API for ' . $key);
            }
            $data[$key] = json_decode($response, true);
        }

        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar_pengguna');
        $this->load->view('pengguna/view_pengguna', $data);
        $this->load->view('templates/footer');
    }

    // public function index()
    // {
    //     if ($this->session->userdata('level') != 'Pengguna') {
    //         $this->session->set_flashdata(
    //             'info',
    //             '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                     <strong>Maaf,</strong> Anda harus login sebagai Pengguna...
    //                   </div>'
    //         );
    //         redirect('auth');
    //     }
    //     $data['title'] = 'Halaman Pengguna';

    //     $data['direktur'] = $this->db->query("SELECT * FROM karyawan LEFT JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan WHERE jabatan.nama_jabatan = 'Direktur' ")->row();

    //     //SPI
    //     $data['spi'] = $this->db->query("SELECT * FROM karyawan LEFT JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan WHERE jabatan.nama_jabatan = 'Ketua' ")->row();

    //     $data['a_spi'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Anggota' AND bagian.nama_bagian = 'S P I' AND subag.nama_subag = 'S P I' ")->result();

    //     // Langganan
    //     $data['lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Langganan' ")->row();

    //     $data['k_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Langganan' ")->row();

    //     $data['s_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Langganan' ")->result();

    //     $data['k_tagih'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Penagihan' ")->row();

    //     $data['s_tagih'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Penagihan' ")->result();

    //     //Umum
    //     $data['umum'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Umum' ")->row();

    //     $data['k_umum'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Umum' ")->row();

    //     $data['s_umum'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Umum' ")->result();

    //     $data['s_umumSec'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Security)' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Umum' AND aktif = '1' ")->result();

    //     $data['k_admin'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Administrasi' ")->row();

    //     $data['s_admin'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Administrasi' ")->result();

    //     $data['k_person'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Personalia' ")->row();

    //     $data['s_person'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Personalia' ")->result();

    //     //Keuangan
    //     $data['keu'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Keuangan' ")->row();

    //     $data['k_kas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Kas' ")->row();

    //     $data['s_kas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Kas' ")->result();

    //     $data['k_buku'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Pembukuan' ")->row();

    //     $data['s_buku'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Pembukuan' ")->result();

    //     $data['k_rek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Rekening' ")->row();

    //     $data['s_rek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Rekening' ")->result();

    //     //Perencanaan
    //     $data['renc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Perencanaan' ")->row();

    //     $data['k_renc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'Perencanaan' ")->row();

    //     $data['s_renc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'Perencanaan' ")->result();

    //     $data['k_awas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'pengawasan' ")->row();

    //     $data['s_awas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'pengawasan' ")->result();

    //     //Pemeliharaan
    //     $data['peml'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Pemeliharaan' ")->row();

    //     $data['k_peml'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'Pemeliharaan' ")->row();

    //     $data['s_peml_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'Pemeliharaan' ")->result();

    //     $data['s_peml_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'Pemeliharaan' ")->result();

    //     $data['k_alat'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'peralatan' ")->row();

    //     $data['s_alat_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'peralatan' ")->result();

    //     $data['s_alat_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'peralatan' ")->result();

    //     //Bondowoso
    //     $data['bond'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->row();

    //     $data['bond_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->row();

    //     $data['bond_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->result();

    //     $data['bond_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->result();

    //     $data['bond_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->row();

    //     $data['bond_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->result();

    //     $data['bond_p_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Pelayanan Pelanggan' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->row();

    //     $data['bond_s_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Pelayanan Pelanggan' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' AND aktif = '1' ")->result();

    //     // sukosari 1
    //     $data['suko1'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' AND aktif = '1' ")->row();

    //     $data['suko1_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' AND aktif = '1' ")->row();

    //     $data['suko1_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' AND aktif = '1' ")->result();

    //     $data['suko1_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' AND aktif = '1' ")->result();

    //     $data['suko1_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' AND aktif = '1' ")->row();

    //     $data['suko1_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' AND aktif = '1' ")->result();

    //     // Maesan
    //     $data['maesan'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->row();

    //     $data['maesan_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->row();

    //     $data['maesan_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->result();

    //     $data['maesan_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' AND aktif = '1' ")->result();

    //     $data['maesan_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->row();

    //     $data['maesan_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->result();

    //     // Tegalampel
    //     $data['tegalampel'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->row();

    //     $data['tegalampel_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->row();

    //     $data['tegalampel_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->result();

    //     $data['tegalampel_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' AND aktif = '1' ")->result();

    //     $data['tegalampel_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->row();

    //     $data['tegalampel_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->result();


    //     // Tapen
    //     $data['tapen'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->row();

    //     $data['tapen_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->row();

    //     $data['tapen_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->result();

    //     $data['tapen_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' AND aktif = '1' ")->result();

    //     $data['tapen_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->row();

    //     $data['tapen_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->result();

    //     // Prajekan
    //     $data['prajekan'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->row();

    //     $data['prajekan_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->row();

    //     $data['prajekan_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->result();

    //     $data['prajekan_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' AND aktif = '1' ")->result();

    //     $data['prajekan_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->row();

    //     $data['prajekan_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->result();

    //     // Tlogosari
    //     $data['tlogosari'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->row();

    //     $data['tlogosari_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->row();

    //     $data['tlogosari_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->result();

    //     $data['tlogosari_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' AND aktif = '1' ")->result();

    //     $data['tlogosari_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->row();

    //     $data['tlogosari_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->result();

    //     // Wringin
    //     $data['wringin'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->row();

    //     $data['wringin_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->row();

    //     $data['wringin_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->result();

    //     $data['wringin_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' AND aktif = '1' ")->result();

    //     $data['wringin_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->row();

    //     $data['wringin_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->result();

    //     // Curahdami
    //     $data['curahdami'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->row();

    //     $data['curahdami_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->row();

    //     $data['curahdami_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->result();

    //     $data['curahdami_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' AND aktif = '1' ")->result();

    //     $data['curahdami_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'curahdami' ")->row();

    //     $data['curahdami_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->result();

    //     // Tamanan
    //     $data['tamanan'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->row();

    //     $data['tamanan_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->row();

    //     $data['tamanan_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->result();

    //     $data['tamanan_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' AND aktif = '1' ")->result();

    //     $data['tamanan_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->row();

    //     $data['tamanan_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->result();

    //     // Tenggarang
    //     $data['tenggarang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->row();

    //     $data['tenggarang_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->row();

    //     $data['tenggarang_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->result();

    //     $data['tenggarang_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' AND aktif = '1' ")->result();

    //     $data['tenggarang_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->row();

    //     $data['tenggarang_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->result();

    //     // Tamankrocok
    //     $data['tamankrocok'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->row();

    //     $data['tamankrocok_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->row();

    //     $data['tamankrocok_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->result();

    //     $data['tamankrocok_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' AND aktif = '1' ")->result();

    //     $data['tamankrocok_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->row();

    //     $data['tamankrocok_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->result();

    //     // Wonosari
    //     $data['wonosari'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->row();

    //     $data['wonosari_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->row();

    //     $data['wonosari_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->result();

    //     $data['wonosari_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wonosari' AND aktif = '1' ")->result();

    //     $data['wonosari_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->row();

    //     $data['wonosari_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->result();

    //     // Sukosari 2
    //     $data['suko2'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 2' AND aktif = '1' ")->row();

    //     $data['suko2_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 2' AND aktif = '1' ")->row();

    //     $data['suko2_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 2' AND aktif = '1' ")->result();

    //     $data['suko2_s_admPm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi(Pembaca Meter)' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 2' AND aktif = '1' ")->result();

    //     $data['suko2_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 2' AND aktif = '1' ")->row();

    //     $data['suko2_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 2' AND aktif = '1' ")->result();

    //     //Amdk
    //     $data['amdk'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Manager' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'A M D K' ")->row();

    //     $data['amdk_qc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Quality Control' ")->row();

    //     $data['amdk_s_qc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Quality Control' ")->result();

    //     $data['amdk_pro'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Produksi' ")->row();

    //     $data['amdk_s_pro'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Produksi' ")->result();

    //     $data['amdk_pasar'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Pemasaran' AND aktif = '1' ")->row();

    //     $data['amdk_s_pasar'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Pemasaran' AND aktif = '1' ")->result();

    //     $data['amdk_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Administrasi' ")->row();

    //     $data['amdk_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Administrasi' ")->result();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/navbar');
    //     $this->load->view('templates/sidebar_pengguna');
    //     $this->load->view('pengguna/view_pengguna', $data);
    //     $this->load->view('templates/footer');
    // }

}
