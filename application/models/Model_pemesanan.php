<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pemesanan extends CI_Model

{
    public function get_all_pemesanan()
    {
      $sql = "SELECT * FROM pemesanan 
              LEFT JOIN kasir ON kasir.id_kasir = pemesanan.id_kasir 
              ORDER BY id_pemesanan DESC";
      
      return $this->db->query($sql)->result(); 
    }
    public function get_pemesanan($id_pemesanan)
    {
        $sql = "SELECT *,
                (SELECT SUM(detail_pesanan.jumlah * detail_pesanan.harga) FROM detail_pesanan WHERE detail_pesanan.id_pemesanan = pemesanan.id_pemesanan) AS total,
                (SELECT COUNT(detail_pesanan.id_menu) FROM detail_pesanan WHERE detail_pesanan.id_pemesanan = pemesanan.id_pemesanan) AS jlh_menu, 
                (SELECT SUM(detail_pesanan.jumlah) FROM detail_pesanan WHERE detail_pesanan.id_pemesanan = pemesanan.id_pemesanan) AS jlh_item
                from pemesanan
                LEFT JOIN kasir ON kasir.id_kasir = pemesanan.id_kasir
                WHERE pemesanan.id_pemesanan = $id_pemesanan";

        return $this->db->query($sql)->row();
    }

    public function get_item_pesanan($id_pemesanan){

      $sql = "SELECT *,
              (detail_pesanan.jumlah * detail_pesanan.harga) AS subtotal 
              from pemesanan, detail_pesanan, menu
              WHERE pemesanan.id_pemesanan = detail_pesanan.id_pemesanan
              AND menu.id_menu = detail_pesanan.id_menu
              AND detail_pesanan.id_pemesanan = $id_pemesanan";

      return $this->db->query($sql)->result();
  }

    public function delete_pemesanan($id_pemesanan)
    {
      $this->db->where('id_pemesanan', $id_pemesanan);
      $this->db->delete('pemesanan'); 
    }
    public function insert($data)
    {
      $this->db->insert('pemesanan', $data);
    }

    public function update($id_pemesanan, $data)
    {
      $this->db->where('id_pemesanan', $id_pemesanan);
      $this->db->update('pemesanan', $data); 
    }

    public function get_jlh_blm(){

      $sql = "SELECT COUNT(pemesanan.id_pemesanan) AS jlh_blm FROM pemesanan WHERE pemesanan.status_lunas = 'T'";

      return $this->db->query($sql)->row();
    }
    public function get_jlh_total_pemesanan_belum_lunas()
{
  $today = date('Y-m-d');
    $sql = "SELECT COUNT(id_pemesanan) AS jlh_total 
            FROM pemesanan 
            WHERE status_lunas = 'Y'
            AND DATE(tgl_beli) = '$today'";

    return $this->db->query($sql)->row()->jlh_total;
}

    public function inqlastid()
	{   
       $query = $this->db->query('SELECT LAST_INSERT_ID() as lastid');
        
       $res = $query->row();
       return $res;

	}

}



?>


