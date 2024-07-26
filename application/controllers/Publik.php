<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {

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
		
	}

	public function index()
	{
		//memanggil view 
		// $this->load->view('publik/header');
		// $this->load->view('publik/content');
		$this->load->view('publik/halaman_depan_publik');
	}
	public function login()
	{
		$this->load->view('publik/header');
		$this->load->view('publik/login');
		$this->load->view('publik/footer');
	}

	public function new_order($no_meja)
	{
		
		date_default_timezone_set('Asia/Makassar');

		$data = array(
		'tgl_beli' => date('Y-m-d H:i:s'),
		'no_meja' => $no_meja,
		'status_lunas' => 'T',
		'id_kasir' => NULL
		);

		$this->Model_pemesanan->insert($data);

		$lastid = $this->Model_pemesanan->inqlastid()->lastid;

		redirect(site_url('Order/pick_menu/'.$lastid));
	}

	public function join_order($no_meja)
	{
		$data = array(
			
			'no_meja' => $no_meja

		);

		$this->load->view('publik/lheader');
		$this->load->view('publik/join', $data);
		$this->load->view('publik/footer');
		// $this->template->load('template/template_order', 'publik/landing');
	}

	public function cek_join_order($no_meja)
	{
		$id_pemesanan = $this->input->post('id_pemesanan');

		$query = $this->db->query("SELECT * FROM pemesanan WHERE id_pemesanan=$id_pemesanan");

		if($query->num_rows() > 0) 
		{
			$row = $query->row();
			if($row->status_lunas == 'T') {
				redirect(site_url('Order/pick_menu/'.$id_pemesanan));
			} else {
				redirect(site_url('Publik/join_order/'.$no_meja));
			}
		} else {
			redirect(site_url('Publik/join_order/'.$no_meja));
		}
	}
}
