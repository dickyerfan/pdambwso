<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_message('required', '%s masih kosong');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/view_login', $data);
        } else {
            $cek_nama_pengguna = $this->db->get_where('user', ['nama_pengguna' => $this->input->post('nama_pengguna', true)])->row();
            if ($cek_nama_pengguna) { //Jika nama_pengguna benar
                if (password_verify($this->input->post('password', true), $cek_nama_pengguna->password)) {
                    if ($cek_nama_pengguna->level == 'Admin') {
                        $data_session = [
                            'nama_pengguna' => $cek_nama_pengguna->nama_pengguna,
                            'nama_lengkap' => $cek_nama_pengguna->nama_lengkap,
                            'email' => $cek_nama_pengguna->email,
                            'password' => $cek_nama_pengguna->password,
                            'level' => $cek_nama_pengguna->level
                        ];
                        $this->session->set_userdata($data_session);
                        $this->session->set_flashdata('info',         '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Selamat,</strong> Anda Berhasil Login
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>');
                        redirect('dashboard');
                    } else {
                        $data_session = [
                            'nama_pengguna' => $cek_nama_pengguna->nama_pengguna,
                            'nama_lengkap' => $cek_nama_pengguna->nama_lengkap,
                            'email' => $cek_nama_pengguna->email,
                            'password' => $cek_nama_pengguna->password,
                            'level' => $cek_nama_pengguna->level
                        ];
                        $this->session->set_userdata($data_session);
                        $this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:50%;">
                        <strong>Selamat,</strong> Anda Berhasil Login
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                      </div>');
                        redirect('pengguna');
                    }
                } else { //jika password salah
                    $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Password Anda Salah.!</div>');
                    redirect('auth');
                }
            } else { //jika nama_pengguna salah
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, nama pengguna Anda Salah.!</div>');
                redirect('auth');
            }
            redirect('dashboard');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('nama_pengguna')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim|min_length[5]|is_unique[user.nama_pengguna]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        $this->form_validation->set_message('required', '%s masih kosong');
        $this->form_validation->set_message('valid_email', '%s Harus Valid');
        $this->form_validation->set_message('is_unique', '%s Sudah terdaftar, Ganti yang lain');
        $this->form_validation->set_message('min_length', '%s Minimal 5 karakter');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('auth/view_registrasi', $data);
        } else {
            $this->model_auth->registrasi();
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('nama_pengguna');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Selamat, Anda Berhasil Logout!</div>');
        redirect('auth');
    }
}
