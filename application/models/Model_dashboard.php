<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('mahasiswa')->result();
    }

    public function tambahData($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    public function getIdMahasiswa($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row();
    }

    public function updateData($data)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
    }
}
