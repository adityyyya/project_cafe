<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model

{
    public function get_penjualan()
    {
      return $this->db->get('v_penjualan')->result(); 
    }
}
