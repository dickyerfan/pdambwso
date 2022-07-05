<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_semua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_karyawan');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Karyawan';
        $data['karyawan'] = $this->model_karyawan->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_karyawanSemua', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah Karyawan';
        $data['bagian'] = $this->db->get('bagian')->result();
        $data['subag'] = $this->db->get('subag')->result();
        $data['jabatan'] = $this->db->get('jabatan')->result();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[karyawan.nik]');
        $this->form_validation->set_rules('no_hp', 'NO HP', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('id_bagian', 'Bagian', 'required|trim');
        $this->form_validation->set_rules('id_subag', 'Sub Bagian', 'required|trim');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'required|trim');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar');
        $this->form_validation->set_message('min_length', '%s Minimal 10 digit');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('karyawan/view_tambahKaryawanSemua', $data);
            $this->load->view('templates/footer');
        } else {
            $data['karyawan'] = $this->model_karyawan->tambahData();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Sukses,</strong> Data berhasil di tambah
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('karyawan/karyawan_semua');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Karyawan';
        $data['karyawan'] = $this->model_karyawan->getIdKaryawan($id);
        $data['bagian'] = $this->db->get('bagian')->result();
        $data['subag'] = $this->db->get('subag')->result();
        $data['jabatan'] = $this->db->get('jabatan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_editKaryawanSemua', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->model_karyawan->updateData();
        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('karyawan/karyawan_semua');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Sukses,</strong> Data berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>'
            );
            redirect('karyawan/karyawan_semua');
        }
    }

    public function hapus($id)
    {
        $this->model_karyawan->hapusData($id);
        $this->session->set_flashdata(
            'info',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                    <strong>Sukses,</strong> Data berhasil di hapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                  </div>'
        );
        redirect('karyawan/karyawan_semua');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Karyawan';
        $data['karyawan'] = $this->model_karyawan->getdetail($id);
        // $data['bagian'] = $this->db->get('bagian')->result();
        // $data['subag'] = $this->db->get('subag')->result();
        // $data['jabatan'] = $this->db->get('jabatan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/view_detailKaryawanSemua', $data);
        $this->load->view('templates/footer');
    }
}
