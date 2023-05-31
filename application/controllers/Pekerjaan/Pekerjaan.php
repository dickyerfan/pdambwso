<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pekerjaan');
        $this->load->model('Model_bagian');
        $this->load->model('Model_subag');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pekerjaan';
        $data['jabatan'] = $this->db->get('jabatan')->num_rows();
        $data['bagian'] = $this->db->get('bagian')->num_rows();
        $data['subag'] = $this->db->get('subag')->num_rows();
        $data['jabatan1'] = $this->Model_pekerjaan->getAll();
        $data['bagian1'] = $this->Model_bagian->getAll();
        $data['subag1'] = $this->Model_subag->getAll();
        $data['jabatanEdit'] = $this->Model_pekerjaan->getJabatan();
        $data['bagianEdit'] = $this->Model_pekerjaan->getBagian();
        $data['subagEdit'] = $this->Model_pekerjaan->getSubag();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pekerjaan/view_pekerjaan', $data);
        $this->load->view('templates/footer');
    }

    // Jabatan
    public function tambahJabatan()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Jabatan Gagal di tambahkan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        } else {
            $this->Model_pekerjaan->tambahDataJabatan();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> data Jabatan Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        }
    }

    public function editJabatan()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Jabatan Gagal di update
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        } else {
            $this->Model_pekerjaan->updateDataJabatan();
            if ($this->db->affected_rows() <= 0) {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('pekerjaan/pekerjaan');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Sukses,</strong> Data Jabatan berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('pekerjaan/pekerjaan');
            }
        }
    }
    public function hapusJabatan($id)
    {
        $this->Model_pekerjaan->hapusDataJabatan($id);
        $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sukses,</strong> data Jabatan Berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>');
        redirect('pekerjaan/pekerjaan');
    }

    // bagian
    public function tambahBagian()
    {
        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Bagian Gagal di tambahkan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        } else {
            $this->Model_pekerjaan->tambahDataBagian();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> data Bagian Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        }
    }

    public function editBagian()
    {
        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Bagian Gagal di update
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        } else {
            $this->Model_pekerjaan->updateDataBagian();
            if ($this->db->affected_rows() <= 0) {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('pekerjaan/pekerjaan');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Sukses,</strong> Data Bagian berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('pekerjaan/pekerjaan');
            }
        }
    }
    public function hapusBagian($id)
    {
        $this->Model_pekerjaan->hapusDataBagian($id);
        $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sukses,</strong> data Bagian Berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>');
        redirect('pekerjaan/pekerjaan');
    }

    // Subag
    public function tambahSubag()
    {
        $this->form_validation->set_rules('nama_subag', 'Nama Sub Bagian', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Sub Bagian Gagal di tambahkan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        } else {
            $this->Model_pekerjaan->tambahDataSubag();
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Sukses,</strong> data Sub Bagian Berhasil di simpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        }
    }

    public function editSubag()
    {
        $this->form_validation->set_rules('nama_subag', 'Nama Sub Bagian', 'required|trim');
        $this->form_validation->set_message('required', '%s Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Data Sub Bagian Gagal di update
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
            );
            redirect('pekerjaan/pekerjaan');
        } else {
            $this->Model_pekerjaan->updateDataSubag();
            if ($this->db->affected_rows() <= 0) {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf,</strong> tidak ada perubahan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('pekerjaan/pekerjaan');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Sukses,</strong> Data Sub Bagian berhasil di update
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                );
                redirect('pekerjaan/pekerjaan');
            }
        }
    }
    public function hapusSubag($id)
    {
        $this->Model_pekerjaan->hapusDataSubag($id);
        $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sukses,</strong> data Sub Bagian Berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
        </div>');
        redirect('pekerjaan/pekerjaan');
    }
}
