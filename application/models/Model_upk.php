<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_upk extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getJan($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 1);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getFeb($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 2);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getMar($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 3);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getApr($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 4);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getMei($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 5);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getJun($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 6);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getJul($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 7);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getAgs($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 8);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getSep($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 9);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getOkt($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 10);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getNov($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 11);
        $this->db->where('thn', $tahun);
        $this->db->order_by('id_rek', 'ASC');
        $this->db->group_by('data_rekening.id_upk');
        return $this->db->get()->result();
    }
    public function getDes($tahun)
    {
        $this->db->select('*');
        $this->db->from('data_rekening');
        $this->db->join('nama_upk', 'nama_upk.id_upk = data_rekening.id_upk');
        $this->db->where('bln', 12);
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
}
