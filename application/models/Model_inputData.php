<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_inputData extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('nama_upk');
        return $this->db->get()->result();
    }

    public function tambahData()
    {
        $id = $this->input->post('id_upk');
        $tanggal = $this->input->post('tanggal');
        $bln = date('m', strtotime($tanggal));
        $thn = date('Y', strtotime($tanggal));

        $query = $this->db->query("SELECT id_upk,bln,thn FROM data_rekening WHERE id_upk = $id AND  bln = $bln AND thn = $thn");

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:50%;">
                  <strong>Maaf,</strong> data sudah ada, Pilih bulan atau tahun yang lain
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
                </div>'
            );
            redirect('rekening/input_data');
        } else {
            $data = [
                "id_upk" => $this->input->post('id_upk', true),
                "bln" => $bln,
                "thn" => $thn,
                "jml_rek" => $this->input->post('jml_rek', true),
                "air_pakai" => $this->input->post('air_pakai', true),
                "rupiah" => $this->input->post('rupiah', true),
            ];
            $this->db->insert('data_rekening', $data);
        }
    }
}
