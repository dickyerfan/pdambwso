<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('mahasiswa')->result();
    }
}
