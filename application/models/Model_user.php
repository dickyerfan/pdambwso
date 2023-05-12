<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_user extends CI_Model
{
    public function getAll()
    {
        $this->db->where('level', 'Admin');
        return $this->db->get('user')->result();
    }
    public function getAllUser()
    {
        $this->db->where('level', 'Pengguna');
        return $this->db->get('user')->result();
    }

    public function tambahData()
    {
        $data = [
            'nama_pengguna' => $this->input->post('nama_pengguna', true),
            'nama_lengkap' => $this->input->post('nama_lengkap', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'level' => $this->input->post('level', true),
        ];
        $this->db->insert('user', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function getIdAdmin($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function updateData()
    {

        $data = [
            'nama_pengguna' => $this->input->post('nama_pengguna', true),
            'nama_lengkap' => $this->input->post('nama_lengkap', true),
            'email' => $this->input->post('email', true),
            'level' => $this->input->post('level', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}
