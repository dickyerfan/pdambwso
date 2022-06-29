<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_bagian extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('bagian')->result();
    }

    public function tambahData()
    {
        $data = [
            "nama_bagian" => $this->input->post('nama_bagian', true),
        ];
        $this->db->insert('bagian', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_bagian', $id);
        $this->db->delete('bagian');
    }

    public function getIdbagian($id)
    {
        return $this->db->get_where('bagian', ['id_bagian' => $id])->row();
    }

    public function updateData()
    {

        $data = [
            "nama_bagian" => $this->input->post('nama_bagian', true),
        ];
        $this->db->where('id_bagian', $this->input->post('id'));
        $this->db->update('bagian', $data);
    }
}
