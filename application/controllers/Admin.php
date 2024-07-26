<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
    	$this->load->model('Model_pemesanan');
    	$this->load->model('Model_menu');

		// Pengecekan apakah sudah login
		$this->is_logged_in();
	}

	public function is_logged_in()
	{
		if ($this->session->userdata('logged_in')==FALSE)
		{
			redirect('Login');
		} 
	}

	public function index()
	{
		$jlh_blm = $this->Model_pemesanan->get_jlh_blm()->jlh_blm;
		$jlh_menu = $this->Model_menu->get_jlh_menu()->jlh_menu;
		$jlh_menu_hbs = $this->Model_menu->get_jlh_menu_hbs()->jlh_menu_hbs;
		$jlh_total_pemesanan = $this->Model_pemesanan->get_jlh_total_pemesanan_belum_lunas(); // Ambil total pemesanan yang belum dilunasi
		$data = array(
			'menu_dashboard' => 'active',
			'menu_penjualan' => '',
			'menu_menu' => '',
			'jlh_blm' => $jlh_blm,
			'jlh_menu' => $jlh_menu,
			'jlh_menu_hbs' => $jlh_menu_hbs,
			'jlh_total_pemesanan' => $jlh_total_pemesanan, // Tambahkan ke data
		);

		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('sidebar', $data);
		$this->load->view('footer');
	}
	
	public function Penjualan()
	{
		$data = array(
			
			'id_barang' => set_value('id_barang'),
			'tanggal' => set_value('tanggal'),
			'qty' => set_value('qty'),
			'harga' => set_value('harga'),
		);
		$this->load->view('penjualan/penjualan_list');
	}
}
