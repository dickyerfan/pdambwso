<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_karyawan extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
        $this->db->join('subag', 'subag.id_subag = karyawan.id_subag');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        // $this->db->order_by('nama', 'ASC');
        // $this->db->order_by('bagian.nama_bagian', 'ASC');
        // $this->db->order_by('subag.nama_subag', 'ASC');
        // $this->db->where('aktif', '1');
        return $this->db->get()->result();
    }
    public function getdetail($id)
    {
        $this->db->select('*, bagian.nama_bagian,subag.nama_subag, jabatan.nama_jabatan');
        $this->db->from('karyawan');
        $this->db->join('bagian', 'bagian.id_bagian = karyawan.id_bagian');
        $this->db->join('subag', 'subag.id_subag = karyawan.id_subag');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function tambahData()
    {
        $nama = ucwords(strtolower($this->input->post('nama', true)));

        $data = [
            'nama' => $nama,
            'alamat' => $this->input->post('alamat', true),
            'nik' => $this->input->post('nik', true),
            'no_hp' => $this->input->post('no_hp', true),
            'agama' => $this->input->post('agama', true),
            'status_pegawai' => $this->input->post('status_pegawai', true),
            'jenkel' => $this->input->post('jenkel', true),
            'tmp_lahir' => $this->input->post('tmp_lahir', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'tgl_masuk' => $this->input->post('tgl_masuk', true),
            'id_bagian' => $this->input->post('id_bagian', true),
            'id_subag' => $this->input->post('id_subag', true),
            'id_jabatan' => $this->input->post('id_jabatan', true)
        ];
        $this->db->insert('karyawan', $data);
    }

    public function getIdKaryawan($id)
    {
        return $this->db->get_where('karyawan', ['id' => $id])->row();
    }

    public function updateData()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'nik' => $this->input->post('nik', true),
            'no_hp' => $this->input->post('no_hp', true),
            'agama' => $this->input->post('agama', true),
            'status_pegawai' => $this->input->post('status_pegawai', true),
            'jenkel' => $this->input->post('jenkel', true),
            'tmp_lahir' => $this->input->post('tmp_lahir', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'tgl_masuk' => $this->input->post('tgl_masuk', true),
            // 'id_bagian' => $this->input->post('id_bagian', true),
            // 'id_subag' => $this->input->post('id_subag', true),
            // 'id_jabatan' => $this->input->post('id_jabatan', true),
            // 'aktif' => $this->input->post('aktif', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('karyawan', $data);
    }

    public function updateDataMutasi()
    {
        $data = [
            'id_bagian' => $this->input->post('id_bagian', true),
            'id_subag' => $this->input->post('id_subag', true),
            'id_jabatan' => $this->input->post('id_jabatan', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('karyawan', $data);
    }
    public function updateDataPurna()
    {
        $data = [
            'aktif' => $this->input->post('aktif', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('karyawan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('karyawan');
    }

    public function getKaryawanTetap()
    {
        return $this->db->get_where('karyawan', [
            'status_pegawai' => 'Karyawan Tetap',
            'aktif' => '1'
        ])->result();
    }
    public function getKaryawanKontrak()
    {
        return $this->db->get_where('karyawan', [
            'status_pegawai' => 'Karyawan Kontrak',
            'aktif' => '1'
        ])->result();
    }
    public function getKaryawanHonorer()
    {
        return $this->db->get_where('karyawan', [
            'status_pegawai' => 'Karyawan Honorer',
            'aktif' => '1'
        ])->result();
    }
    public function getKaryawanPurna()
    {
        return $this->db->get_where('karyawan', ['aktif' => '0'])->result();
    }
}
