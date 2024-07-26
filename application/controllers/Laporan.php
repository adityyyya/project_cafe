<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
    	$this->load->model('Model_laporan');
		
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
		$data_laporan_penjualan = $this->Model_laporan->get_penjualan();
		$data = array(
			'menu_dashboard' => '',
			'menu_penjualan' => 'active',
			'menu_menu' => '',
			'data_laporan_penjualan' => $data_laporan_penjualan

		);

		$this->template->load('template/template_admin', 'laporan/laporan_list', $data);
	}

	public function cetak_penjualan()
	{
		$data_laporan_penjualan = $this->Model_laporan->get_penjualan();
		$data = array(
			'menu_dashboard' => '',
			'menu_penjualan' => 'active',
			'menu_menu' => '',
			'data_laporan_penjualan' => $data_laporan_penjualan

		);

		$this->load->view('header');
		$this->load->view('laporan/cetak_penjualan', $data);
	}
}