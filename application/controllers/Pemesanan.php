<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pemesanan');

        // Pengecekan apakah sudah login
        $this->is_logged_in();
    }

    public function is_logged_in()
    {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data_pemesanan = $this->Model_pemesanan->get_all_pemesanan();
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => 'active',
            'menu_menu' => '',
            'data_pemesanan' => $data_pemesanan
        );

        $this->template->load('template/template_admin', 'penjualan/penjualan_list', $data);
    }

    public function hapus_pemesanan($id_pemesanan)
    {
        $this->Model_pemesanan->delete_pemesanan($id_pemesanan);
        redirect(site_url('pemesanan'));
    }

    public function tambah_pemesanan()
    {
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => 'active',
            'menu_menu' => '',
            'action' => site_url('Pemesanan/proses_tambah_pemesanan'), // Corrected action URL
            'id_menu' => set_value('id_menu'),
            'nama_menu' => set_value('nama_menu'),
            'harga' => set_value('harga'),
            'id_jenis' => set_value('id_jenis'),
        );
        
        $this->template->load('template/template_admin', 'penjualan/tambah_pemesanan', $data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_meja', 'Nomor Meja', 'trim|required');
    }

    public function proses_tambah_pemesanan()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_pemesanan();
        } else {
            date_default_timezone_set('Asia/Makassar');

            $data = array(
                'tgl_beli' => date('Y-m-d H:i:s'),
                'status_lunas' => 'T',
                // Hapus 'no_meja' jika kolom tersebut sudah dihapus dari tabel
            );

            $this->Model_pemesanan->insert($data);

            redirect(site_url('Pemesanan'));
        }
    }

    public function ubah_penjualan($id_barang)
    {
        $data_penjualan = $this->Penjualan_model->get_penjualan($id_barang);
        $data = array(
            'menu_penjualan' => 'active',
            'judul' => 'UBAH PENJUALAN',
            'action' => site_url('penjualan/proses_ubah_penjualan'),
            'id_barang' => $data_penjualan->id_barang,
            'tanggal' => $data_penjualan->tanggal,
            'qty' => $data_penjualan->qty,
            'harga' => $data_penjualan->harga,
        );
        
        $this->template->load('template/template_admin', 'penjualan/form_penjualan', $data);
    }

    public function cetak($id_pemesanan)
    {
        $pemesanan_data = $this->Model_pemesanan->get_pemesanan($id_pemesanan);
        $detailpesanan_data = $this->Model_pemesanan->get_item_pesanan($id_pemesanan);
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'tanggal' => $pemesanan_data->tgl_beli,
            'nm_karyawan' => $pemesanan_data->username,
            // Hapus 'no_meja'
            'jlh_menu' => $pemesanan_data->jlh_menu,
            'jlh_item' => $pemesanan_data->jlh_item,
            'total' => $pemesanan_data->total,
            'tunai' => $pemesanan_data->tunai,
            'detailpesanan_data' => $detailpesanan_data
        );

        $this->load->view('nota_generic', $data);
    }

    public function set_lunas($id_pemesanan)
    {
        $data = array(
            'tunai' => $this->input->post('tunai'),
            'status_lunas' => 'Y',
            'id_kasir' => $this->session->userdata('id_kasir')
        );

        $this->Model_pemesanan->update($id_pemesanan, $data);
        redirect(site_url('Pemesanan'));
    }

    public function tambah_pemesanan_otomatis()
    {
        $data = array(
            'tgl_beli' => date('Y-m-d H:i:s'),
            'status_lunas' => 'T',
            // Hapus 'no_meja'
        );

        $this->Model_pemesanan->insert($data);

        $id_pemesanan = $this->db->insert_id();

        redirect('Detailpemesanan/tampil/' . $id_pemesanan);
    }
}
