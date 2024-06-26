<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_arsip');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['sk'] = $this->db->get_where('arsip', [
            'jenis' => 'Surat Keputusan',
        ])->num_rows();
        $data['per'] = $this->db->get_where('arsip', [
            'jenis' => 'Peraturan',
        ])->num_rows();
        $data['bk'] = $this->db->get_where('arsip', [
            'jenis' => 'Berkas Kerja',
        ])->num_rows();
        $data['dk'] = $this->db->get_where('arsip', [
            'jenis' => 'Dokumen',
        ])->num_rows();

        $data['title'] = 'Data Arsip PDAM';
        $data['arsip'] = $this->Model_arsip->getAll();
        $data['daftarEska'] = $this->Model_arsip->getModalEska();
        $data['daftarPer'] = $this->Model_arsip->getModalPer();
        $data['daftarBer'] = $this->Model_arsip->getModalBer();
        $data['daftarDok'] = $this->Model_arsip->getModalDok();
        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_arsip', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar_pengguna');
            $this->load->view('arsip/view_arsip', $data);
            $this->load->view('templates/footer');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[2]|max_length[4]|numeric');
        $this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required|trim|is_unique[arsip.nama_dokumen]');
        // $this->form_validation->set_rules('nama_file', 'Nama File', 'required|trim');
        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
        // $this->form_validation->set_rules('tgl_upload', 'Tanggal Upload', 'required|trim');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar');
        $this->form_validation->set_message('min_length', '%s Minimal 2 digit');
        $this->form_validation->set_message('max_length', '%s Maksimal 4 digit');
        $this->form_validation->set_message('numeric', '%s harus di isi angka');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_upload', $data);
            $this->load->view('templates/footer');
        } else {

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
            $config['max_size']             = 20000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('nama_file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $data['title'] = 'Upload Data';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar');
                $this->load->view('templates/sidebar');
                $this->load->view('arsip/view_upload', $data);
                $this->load->view('templates/footer');
            } else {
                $data['nama_file'] = $this->upload->data("file_name");
                $data['nama_dokumen'] = $this->input->post('nama_dokumen');
                $data['jenis'] = $this->input->post('jenis');
                $data['tahun'] = $this->input->post('tahun');
                // $data['tentang'] = $this->input->post('tentang');
                $data['tentang'] = ucwords(strtolower($this->input->post('tentang')));
                // $data['tgl_upload'] = $this->input->post('tgl_upload');
                $data['tgl_upload'] = date('Y-m-d');
                $data['tgl_dokumen'] = $this->input->post('tgl_dokumen');
                $data['keterangan'] = $this->input->post('keterangan');
                $this->db->insert('arsip', $data);
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> Data berhasil di tambahkan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
                );
                redirect('arsip');
            }
        }
    }

    public function edit($id_arsip)
    {
        $data['arsip'] = $this->db->get_where('arsip', ['id_arsip' => $id_arsip])->row();
        $data['title'] = 'Form Edit Data';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('arsip/view_Edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'nama_dokumen' => $this->input->post('nama_dokumen'),
            'jenis' => $this->input->post('jenis'),
            'tahun' => $this->input->post('tahun'),
            'tentang' => $this->input->post('tentang'),
            // 'tgl_upload' => $this->input->post('tgl_upload'),
            'tgl_dokumen' => $this->input->post('tgl_dokumen'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_arsip', $this->input->post('id_arsip'));
        $this->db->update('arsip', $data);

        if ($this->db->affected_rows() <= 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Maaf,</strong> tidak ada perubahan data
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('arsip');
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses,</strong> Data berhasil di update
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
              </div>'
            );
            redirect('arsip');
        }
    }

    public function hapus($id_arsip)
    {
        $cekFileLama = $this->db->get_where('arsip', ['id_arsip' => $id_arsip])->row();

        if (isset($cekFileLama->nama_file)) {
            unlink('uploads/' . $cekFileLama->nama_file);
        }

        $this->db->where('id_arsip', $id_arsip);
        $this->db->delete('arsip');

        $this->session->set_flashdata(
            'info',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses,</strong> File/Dokumen berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>'
        );
        redirect('arsip');
    }

    public function baca($id_arsip)
    {
        $data = $this->db->get_where('arsip', ['id_arsip' => $id_arsip])->row();
        header("content-type: application/pdf");
        readfile('uploads/' . $data->nama_file);
    }

    public function download($id_arsip)
    {
        $data = $this->db->get_where('arsip', ['id_arsip' => $id_arsip])->row();
        force_download('uploads/' . $data->nama_file, null);
    }

    public function detail($id)
    {
        $data['title'] = 'Data Detail Arsip';
        $data['detail_arsip'] = $this->Model_arsip->getDetail($id);
        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar_pengguna');
            $this->load->view('arsip/view_detail', $data);
            $this->load->view('templates/footer');
        }
    }
}
