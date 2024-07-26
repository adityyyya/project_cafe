<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jenismenu extends CI_Model

{
    public function get_all_jenismenu()
    {
      $sql = "SELECT jenis_menu.* FROM jenis_menu";
      
      return $this->db->get('jenis_menu')->result(); 
    }

    public function get_jenismenu($id_jenis)
    {
      $this->db->where('id_jenis', $id_jenis);
      return $this->db->get('jenis_menu')->row();
    }
 
    public function delete_jensimenu($id_jenis)
    {
      $this->db->where('id_jenis', $id_jenis);
      $this->db->delete('jenis_menu'); 
    }
    
    public function insert($data)
    {
      $this->db->insert('jenis_menu', $data);
    }

    public function update($id_jenis, $data)
    {
      $this->db->where('id_jenis', $id_jenis);
      $this->db->update('jenis_menu', $data); 
    }

    public function check_duplicate($nama_jenis, $id_jenis = null) {
      $this->db->where('nama_jenis', $nama_jenis);
      if ($id_jenis) {
          $this->db->where('id_jenis !=', $id_jenis);
      }
      $query = $this->db->get('jenis_menu');
      return $query->num_rows() > 0;
  }
}
