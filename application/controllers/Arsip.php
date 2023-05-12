<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_arsip');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['kartotal'] = $this->db->get_where('karyawan', ['aktif' => '1'])->num_rows();

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
            $data['tentang'] = $this->input->post('tentang');
            $data['tgl_upload'] = $this->input->post('tgl_upload');
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
            'tgl_upload' => $this->input->post('tgl_upload'),
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
            <strong>Sukses,</strong> Data Ebook berhasil di hapus
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
}
