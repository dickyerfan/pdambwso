<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pekerjaan extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('jabatan')->result();
    }

    public function tambahData()
    {
        $data = [
            "nama_jabatan" => $this->input->post('nama_jabatan', true),
        ];
        $this->db->insert('jabatan', $data);
    }
    public function hapusData($id)
    {
        $this->db->where('id_jabatan', $id);
        $this->db->delete('jabatan');
    }

    public function getIdJabatan($id)
    {
        return $this->db->get_where('jabatan', ['id_jabatan' => $id])->row();
    }

    public function updateData()
    {

        $data = [
            "nama_jabatan" => $this->input->post('nama_jabatan', true),
        ];
        $this->db->where('id_jabatan', $this->input->post('id'));
        $this->db->update('jabatan', $data);
    }
}
