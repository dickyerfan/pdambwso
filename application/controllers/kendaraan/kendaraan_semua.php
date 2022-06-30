<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_semua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kendaraan');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Kendaraan';
        $data['kendaraan'] = $this->model_kendaraan->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('kendaraan/view_kendaraanSemua', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah Kendaraan';
        $data['karyawan'] = $this->db->get('karyawan')->result();
        $data['merk'] = $this->db->get('merk')->result();
        $data['type'] = $this->db->get('type')->result();
        $this->form_validation->set_rules('id_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('id_merk', 'Merk', 'required|trim');
        $this->form_validation->set_rules('id_type', 'Type', 'required|trim');
        $this->form_validation->set_rules('no_plat', 'No Kendaraan ', 'required|trim|is_unique[kendaraan.no_plat]');
        $this->form_validation->set_rules('no_rangka', 'No Rangka', 'required|trim|is_unique[kendaraan.no_rangka]');
        $this->form_validation->set_rules('no_mesin', 'No Mesin', 'required|trim|is_unique[kendaraan.no_mesin]');
        $this->form_validation->set_rules('jumlah_roda', 'Jumlah Roda', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('warna', 'Warna', 'required|trim');
        $this->form_validation->set_rules('bahan_bakar', 'Bahan Bakar', 'required|trim');
        $this->form_validation->set_rules('berlaku_sampai', 'Masa berlaku', 'required|trim');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('kendaraan/view_tambahKendaraanSemua', $data);
            $this->load->view('templates/footer');
        } else {

            $data['kendaraan'] = $this->model_kendaraan->tambahData();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Sukses,</strong> Data berhasil ditambah
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('kendaraan/kendaraan_semua');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Kendaraan';
        $data['kendaraan'] = $this->model_kendaraan->getIdKendaraan($id);
        $data['karyawan'] = $this->db->get('karyawan')->result();
        $data['merk'] = $this->db->get('merk')->result();
        $data['type'] = $this->db->get('type')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('kendaraan/view_editKendaraanSemua', $data);
        $this->load->view('templates/footer');
    }


    public function update()
    {
        $this->model_kendaraan->updateData();
        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('kendaraan/kendaraan_semua');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                    <strong>Sukses,</strong> Data berhasil di update
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>'
            );
            redirect('kendaraan/kendaraan_semua');
        }
    }

    public function hapus($id)
    {
        $this->model_kendaraan->hapusData($id);
        $this->session->set_flashdata(
            'info',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                    <strong>Sukses,</strong> Data berhasil di hapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>'
        );
        redirect('kendaraan/kendaraan_semua');
    }
}
