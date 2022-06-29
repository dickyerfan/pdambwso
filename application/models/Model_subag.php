<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_subag extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('subag')->result();
    }

    public function tambahData()
    {
        $data = [
            "nama_subag" => $this->input->post('nama_subag', true),
        ];
        $this->db->insert('subag', $data);
    }
    public function hapusData($id)
    {
        $this->db->where('id_subag', $id);
        $this->db->delete('subag');
    }

    public function getIdsubag($id)
    {
        return $this->db->get_where('subag', ['id_subag' => $id])->row();
    }

    public function updateData()
    {

        $data = [
            "nama_subag" => $this->input->post('nama_subag', true),
        ];
        $this->db->where('id_subag', $this->input->post('id'));
        $this->db->update('subag', $data);
    }
}
