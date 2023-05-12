<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('level') != 'Pengguna') {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> Anda harus login sebagai Pengguna...
                      </div>'
            );
            redirect('auth');
        }
        $data['title'] = 'Halaman Pengguna';

        $data['direktur'] = $this->db->query("SELECT * FROM karyawan LEFT JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan WHERE jabatan.nama_jabatan = 'Direktur' ")->row();

        //SPI
        $data['spi'] = $this->db->query("SELECT * FROM karyawan LEFT JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan WHERE jabatan.nama_jabatan = 'Ketua' ")->row();

        $data['a_spi'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Anggota' AND bagian.nama_bagian = 'S P I' AND subag.nama_subag = 'S P I' ")->result();

        // Langganan
        $data['lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Langganan' ")->row();

        $data['k_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Langganan' ")->row();

        $data['s_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Langganan' ")->result();

        $data['k_tagih'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Penagihan' ")->row();

        $data['s_tagih'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Langganan' AND subag.nama_subag = 'Penagihan' ")->result();

        //Umum
        $data['umum'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Umum' ")->row();

        $data['k_umum'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Umum' ")->row();

        $data['s_umum'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Umum' ")->result();

        $data['k_admin'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Administrasi' ")->row();

        $data['s_admin'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Administrasi' ")->result();

        $data['k_person'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Personalia' ")->row();

        $data['s_person'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Umum' AND subag.nama_subag = 'Personalia' ")->result();

        //Keuangan
        $data['keu'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Keuangan' ")->row();

        $data['k_kas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Kas' ")->row();

        $data['s_kas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Kas' ")->result();

        $data['k_buku'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Pembukuan' ")->row();

        $data['s_buku'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Pembukuan' ")->result();

        $data['k_rek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Rekening' ")->row();

        $data['s_rek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Keuangan' AND subag.nama_subag = 'Rekening' ")->result();

        //Perencanaan
        $data['renc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Perencanaan' ")->row();

        $data['k_renc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'Perencanaan' ")->row();

        $data['s_renc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'Perencanaan' ")->result();

        $data['k_awas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'pengawasan' ")->row();

        $data['s_awas'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Perencanaan' AND subag.nama_subag = 'pengawasan' ")->result();

        //Pemeliharaan
        $data['peml'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'Pemeliharaan' ")->row();

        $data['k_peml'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'Pemeliharaan' ")->row();

        $data['s_peml_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'Pemeliharaan' ")->result();

        $data['s_peml_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'Pemeliharaan' ")->result();

        $data['k_alat'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kasubag' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'peralatan' ")->row();

        $data['s_alat_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'peralatan' ")->result();

        $data['s_alat_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'Pemeliharaan' AND subag.nama_subag = 'peralatan' ")->result();

        //Bondowoso
        $data['bond'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->row();

        $data['bond_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->row();

        $data['bond_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->result();

        $data['bond_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->row();

        $data['bond_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->result();

        $data['bond_p_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Pengaduan Pelanggan' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->row();

        $data['bond_s_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Pengaduan Pelanggan' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Bondowoso' ")->result();

        // sukosari 1
        $data['suko1'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' ")->row();

        $data['suko1_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' ")->row();

        $data['suko1_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' ")->result();

        $data['suko1_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' ")->row();

        $data['suko1_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Sukosari 1' ")->result();

        // Maesan
        $data['maesan'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->row();

        $data['maesan_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->row();

        $data['maesan_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->result();

        $data['maesan_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->row();

        $data['maesan_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Maesan' ")->result();

        // Tegalampel
        $data['tegalampel'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->row();

        $data['tegalampel_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->row();

        $data['tegalampel_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->result();

        $data['tegalampel_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->row();

        $data['tegalampel_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tegalampel' ")->result();


        // Tapen
        $data['tapen'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->row();

        $data['tapen_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->row();

        $data['tapen_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->result();

        $data['tapen_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->row();

        $data['tapen_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tapen' ")->result();

        // Prajekan
        $data['prajekan'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->row();

        $data['prajekan_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->row();

        $data['prajekan_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->result();

        $data['prajekan_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->row();

        $data['prajekan_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Prajekan' ")->result();

        // Tlogosari
        $data['tlogosari'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->row();

        $data['tlogosari_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->row();

        $data['tlogosari_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->result();

        $data['tlogosari_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->row();

        $data['tlogosari_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tlogosari' ")->result();

        // Wringin
        $data['wringin'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->row();

        $data['wringin_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->row();

        $data['wringin_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->result();

        $data['wringin_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->row();

        $data['wringin_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Wringin' ")->result();

        // Curahdami
        $data['curahdami'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->row();

        $data['curahdami_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->row();

        $data['curahdami_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->result();

        $data['curahdami_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'curahdami' ")->row();

        $data['curahdami_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Curahdami' ")->result();

        // Tamanan
        $data['tamanan'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->row();

        $data['tamanan_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->row();

        $data['tamanan_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->result();

        $data['tamanan_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->row();

        $data['tamanan_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamanan' ")->result();

        // Tenggarang
        $data['tenggarang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->row();

        $data['tenggarang_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->row();

        $data['tenggarang_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->result();

        $data['tenggarang_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->row();

        $data['tenggarang_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tenggarang' ")->result();

        // Tamankrocok
        $data['tamankrocok'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->row();

        $data['tamankrocok_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->row();

        $data['tamankrocok_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->result();

        $data['tamankrocok_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->row();

        $data['tamankrocok_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'Tamankrocok' ")->result();

        // Wonosari
        $data['wonosari'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->row();

        $data['wonosari_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->row();

        $data['wonosari_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->result();

        $data['wonosari_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->row();

        $data['wonosari_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'wonosari' ")->result();

        // Sukosari 2
        $data['suko2'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Ka UPK' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'suko2' ")->row();

        $data['suko2_p_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'suko2' ")->row();

        $data['suko2_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'suko2' ")->result();

        $data['suko2_p_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Pelaksana Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'suko2' ")->row();

        $data['suko2_s_tek'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Teknik' AND bagian.nama_bagian = 'U P K' AND subag.nama_subag = 'suko2' ")->result();

        //Amdk
        $data['amdk'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Manager' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'A M D K' ")->row();

        $data['amdk_qc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Quality Control' ")->row();

        $data['amdk_s_qc'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Quality Control' ")->result();

        $data['amdk_pro'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Produksi' ")->row();

        $data['amdk_s_pro'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf Administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Produksi' ")->result();

        $data['amdk_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Langganan' ")->row();

        $data['amdk_s_lang'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Langganan' ")->result();

        $data['amdk_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Kabag' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Administrasi' ")->row();

        $data['amdk_s_adm'] = $this->db->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan JOIN bagian ON karyawan.id_bagian = bagian.id_bagian JOIN subag ON karyawan.id_subag = subag.id_subag WHERE jabatan.nama_jabatan = 'Staf administrasi' AND bagian.nama_bagian = 'A M D K' AND subag.nama_subag = 'Administrasi' ")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar_pengguna');
        $this->load->view('pengguna/view_pengguna', $data);
        $this->load->view('templates/footer');
    }
}
