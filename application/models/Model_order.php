<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_order extends CI_Model

  {
    public function select_value($id_pemesanan, $id_menu)
    {
     $sql = "SELECT *
         FROM pemesanan p, detail_pesanan d, menu m
         WHERE p.id_pemesanan = d.id_pemesanan
         AND m.id_menu = d.id_menu
         AND d.id_pemesanan=$id_pemesanan
         AND d.id_menu=$id_menu";
 
     $res = $this->db->query($sql)->row();
 
     if(isset($res))
     {
       return $res->jumlah;
     } else {
       return 0;
     }
    }

    public function insert_item($id_pemesanan, $id_menu, $jumlah, $harga){
      $this->db->query('INSERT INTO detail_pesanan(id_pemesanan,id_menu,jumlah,harga) values(' . $id_pemesanan . ',' . $id_menu . ',' . $jumlah . ',' . $harga . ') 
                          ON DUPLICATE KEY update jumlah=jumlah+1');

      return true;
     }

     public function kurang_item($id_pemesanan, $id_menu, $jumlah, $harga){
      $this->db->query('INSERT INTO detail_pesanan(id_pemesanan,id_menu,jumlah,harga) values(' . $id_pemesanan . ',' . $id_menu . ',' . $jumlah . ',' . $harga . ') 
                          ON DUPLICATE KEY update jumlah=jumlah-1');

      return true;
     }

     public function hapus_item($id_pemesanan, $id_menu){
      $this->db->query("DELETE FROM detail_pesanan WHERE id_pemesanan=$id_pemesanan AND id_menu=$id_menu");

      return true;
     }

  }



?>


