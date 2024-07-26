<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasir extends CI_Model

{

    public function get_kasir($username, $password)
    {
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      return $this->db->get('kasir')->row();
    }
 
}
