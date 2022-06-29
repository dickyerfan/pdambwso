<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_merk extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('merk')->result();
    }

    public function tambahData()
    {
        $data = [
            'nama_merk' => $this->input->post('nama_merk', true),
        ];
        $this->db->insert('merk', $data);
    }

    public function getIdMerk($id)
    {
        return $this->db->get_where('merk', ['id_merk' => $id])->row();
    }

    public function updateData()
    {
        $data = [
            'nama_merk' => $this->input->post('nama_merk', true),
        ];
        $this->db->where('id_merk', $this->input->post('id'));
        $this->db->update('merk', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_merk', $id);
        $this->db->delete('merk');
    }
}
