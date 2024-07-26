<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detailpemesanan extends CI_Model

{
    public function get_all_detailpesanan($id_pemesanan)
    {
      $sql = "SELECT *,
              (detail_pesanan.harga * detail_pesanan.jumlah) AS subtotal
              FROM detail_pesanan, pemesanan, menu
              WHERE pemesanan.id_pemesanan = detail_pesanan.id_pemesanan 
              AND menu.id_menu = detail_pesanan.id_menu 
              and detail_pesanan.id_pemesanan = $id_pemesanan";

      
      return $this->db->query($sql)->result(); 
    }
    
    public function get_detailpemesanan($id_menu, $id_pemesanan)
    {
      $this->db->where('id_pemesanan', $id_pemesanan);
      $this->db->where('id_menu', $id_menu);
      return $this->db->get('detail_pesanan')->row();
    }

    public function delete_detailpemesanan($id_menu, $id_pemesanan)
    {
      $this->db->where('id_menu', $id_menu);
      $this->db->where('id_pemesanan', $id_pemesanan);
      $this->db->delete('detail_pesanan'); 
    }
    public function insert($data)
    {
      $this->db->insert('jenis_menu', $data);
    }

    public function update($id_jenis, $data)
    {
      $this->db->where('id_jenis', $id_jenis);
      $this->db->update('nama_jenis', $data); 
    }

    public function insert_item($id_pemesanan, $id_menu, $jumlah, $harga){
      $this->db->query('INSERT INTO detail_pesanan values('.$id_pemesanan.',' . $id_menu . ',' . $jumlah . ','. $harga .')');

      return true;
  }
}
