<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model
{
    public function get_all_menu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('jenis_menu', 'jenis_menu.id_jenis = menu.id_jenis', 'left');  // Menggunakan LEFT JOIN
        return $this->db->get()->result(); 
    }

    public function get_menu_by_jenis($id_jenis)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('jenis_menu', 'jenis_menu.id_jenis = menu.id_jenis', 'left');  // Menggunakan LEFT JOIN
        $this->db->where('menu.id_jenis', $id_jenis);  
        return $this->db->get()->result(); 
    }

    public function get_menu($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        return $this->db->get('menu')->row();
    }

    public function delete_menu($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('menu'); 
    }

    public function insert($data)
    {
        $this->db->insert('menu', $data);
    }

    public function update($id_menu, $data)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->update('menu', $data); 
    }

    public function get_jlh_menu()
    {
        $sql = "SELECT COUNT(id_menu) AS jlh_menu FROM menu";
        return $this->db->query($sql)->row();
    }

    public function get_jlh_menu_hbs()
    {
        $sql = "SELECT COUNT(id_menu) AS jlh_menu_hbs FROM menu WHERE status_habis = 'Y'";
        return $this->db->query($sql)->row();
    }

    public function set_habis($id_menu, $data)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->update('menu', $data); 
    }

    public function set_ada($id_menu, $data)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->update('menu', $data); 
    }

    public function inqlastid()
    {   
        $query = $this->db->query('SELECT LAST_INSERT_ID() as lastid');
        $res = $query->row();
        return $res;
    }

    public function reset_foto($id_menu)
    {
        $data = array('foto' => NULL);
        $this->db->where('id_menu', $id_menu);
        return $this->db->update('menu', $data);
    }

    public function get_filtered_menu($id_jenis = null)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('jenis_menu', 'jenis_menu.id_jenis = menu.id_jenis', 'left');  // Menggunakan LEFT JOIN

        // Jika id_jenis ada, tambahkan kondisi filter
        if ($id_jenis) {
            $this->db->where('menu.id_jenis', $id_jenis);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_jenis_menu()
    {
        $this->db->select('*');
        $this->db->from('jenis_menu');
        $query = $this->db->get();
        return $query->result();
    }
    public function is_nama_menu_exist($nama_menu, $id_menu = null)
    {
        $this->db->from('menu');
        $this->db->where('nama_menu', $nama_menu);
        if ($id_menu) {
            $this->db->where('id_menu !=', $id_menu);
        }
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }
    public function is_menu_in_order($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $query = $this->db->get('pemesanan'); // Ganti 'pesanan' dengan nama tabel pesanan Anda

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>
