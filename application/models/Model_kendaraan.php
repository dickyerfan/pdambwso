<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kendaraan extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
        $this->db->join('merk', 'merk.id_merk = kendaraan.id_merk');
        $this->db->join('type', 'type.id_type = kendaraan.id_type');
        $this->db->join('karyawan', 'karyawan.id = kendaraan.id_karyawan');
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result();
    }

    public function tambahData()
    {
        $data = [
            'id_karyawan' => $this->input->post('id_karyawan', true),
            'id_merk' => $this->input->post('id_merk', true),
            'id_type' => $this->input->post('id_type', true),
            'no_plat' => $this->input->post('no_plat', true),
            'no_rangka' => $this->input->post('no_rangka', true),
            'no_mesin' => $this->input->post('no_mesin', true),
            'jumlah_roda' => $this->input->post('jumlah_roda', true),
            'tahun' => $this->input->post('tahun', true),
            'warna' => $this->input->post('warna', true),
            'bahan_bakar' => $this->input->post('bahan_bakar', true),
            'berlaku_sampai' => $this->input->post('berlaku_sampai', true)
        ];
        $this->db->insert('kendaraan', $data);
    }


    public function getIdKendaraan($id)
    {
        return $this->db->get_where('kendaraan', ['id_kendaraan' => $id])->row();
    }
    public function getIdKendaraanOrang($id)
    {
        return $this->db->get_where('kendaraan', ['id_kendaraan' => $id])->row();
    }

    public function updateData_kendOrang()
    {
        $data = [
            'id_karyawan' => $this->input->post('id_karyawan', true),
        ];
        $this->db->where('id_kendaraan', $this->input->post('id_kendaraan'));
        $this->db->update('kendaraan', $data);
    }

    public function updateData()
    {
        $data = [
            // 'id_karyawan' => $this->input->post('id_karyawan', true),
            'id_merk' => $this->input->post('id_merk', true),
            'id_type' => $this->input->post('id_type', true),
            'no_plat' => $this->input->post('no_plat', true),
            'no_rangka' => $this->input->post('no_rangka', true),
            'no_mesin' => $this->input->post('no_mesin', true),
            'jumlah_roda' => $this->input->post('jumlah_roda', true),
            'tahun' => $this->input->post('tahun', true),
            'warna' => $this->input->post('warna', true),
            'bahan_bakar' => $this->input->post('bahan_bakar', true),
            'berlaku_sampai' => $this->input->post('berlaku_sampai', true)
        ];
        $this->db->where('id_kendaraan', $this->input->post('id_kendaraan'));
        $this->db->update('kendaraan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_kendaraan', $id);
        $this->db->delete('kendaraan');
    }
}
