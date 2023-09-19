<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_rekening extends CI_Model
{

    public function getDataByMonth($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', $bulan);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }

    public function getUpk()
    {
        $this->db->select('*');
        $this->db->from('nama_upk');
        return $this->db->get()->result();
    }

    public function tambahDataUpk()
    {
        $data = [
            "nama_upk" => $this->input->post('nama_upk', true),
        ];
        $this->db->insert('nama_upk', $data);
    }

    public function updateUpk()
    {
        $data = [
            "nama_upk" => $this->input->post('nama_upk', true),
        ];
        $this->db->where('id_upk', $this->input->post('id_upk'));
        $this->db->update('nama_upk', $data);
    }

    public function hapusUpk($id)
    {
        $this->db->where('id_upk', $id);
        $this->db->delete('nama_upk');
    }

    public function getdetail($tahun, $id)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('thn', $tahun);
        $this->db->where('nama_upk.id_upk', $id);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
}
