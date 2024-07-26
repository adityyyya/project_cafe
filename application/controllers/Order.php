<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
    	$this->load->model('Model_menu');
    	$this->load->model('Model_jenismenu');
    	$this->load->model('Model_order');
    	$this->load->model('Model_detailpemesanan');
    	$this->load->model('Model_pemesanan');
		
	}

	public function pick_menu($id_pemesanan)
	{
		$data_jenismenu = $this->Model_jenismenu->get_all_jenismenu();
		$data = array(
			'id_pemesanan' => $id_pemesanan,
			'data_jenismenu' => $data_jenismenu
		);

		$this->template->load('template/template_order', 'publik/content', $data);
	}

	public function landing($no_meja)
	{
		$data = array(
			
			'no_meja' => $no_meja

		);

		$this->load->view('publik/lheader');
		$this->load->view('publik/landing', $data);
		$this->load->view('publik/footer');
		// $this->template->load('template/template_order', 'publik/landing');
	}

	public function done($id_pemesanan)
	{
		$data_detailpemesanan = $this->Model_detailpemesanan->get_all_detailpesanan($id_pemesanan);
		$data_pemesanan = $this->Model_pemesanan->get_pemesanan($id_pemesanan);
		$data = array(
			'data_pemesanan' => $data_pemesanan,
			'id_pemesanan' => $id_pemesanan,
			'data_detailpemesanan' => $data_detailpemesanan,

		);

		$this->load->view('publik/lheader');
		$this->load->view('publik/done', $data);
		$this->load->view('publik/footer');
		// $this->template->load('template/template_order', 'publik/landing');
	}

	public function tambah_item($id_pemesanan, $id_menu)
	{
		$menu_data = $this->Model_menu->get_menu($id_menu);
		$jumlah = 1;
		$harga = $menu_data->harga;
		

		$this->Model_order->insert_item($id_pemesanan, $id_menu, $jumlah, $harga);

		redirect(site_url('Order/pick_menu/'.$id_pemesanan.'#menu'.$id_menu));
	
	}

	public function kurang_item($id_pemesanan, $id_menu)
	{
		$jumlah_order = $this->Model_order->select_value($id_pemesanan, $id_menu);

		$menu_data = $this->Model_menu->get_menu($id_menu);
		$jumlah = 1;
		$harga = $menu_data->harga;
		
		if($jumlah_order > 1) {
			$this->Model_order->kurang_item($id_pemesanan, $id_menu, $jumlah, $harga);
		} else {
			$this->Model_order->hapus_item($id_pemesanan, $id_menu);
		}

		redirect(site_url('Order/pick_menu/'.$id_pemesanan.'#menu'.$id_menu));
	
	}
}