<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailpemesanan extends CI_Controller {

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
    	$this->load->model('Model_detailpemesanan');
		$this->load->model('Model_menu');
		$this->load->model('Model_pemesanan');
	// Pengece	kan apakah sudah login
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
		$data_detailpemesanan = $this->Model_detailpemesanan->get_all_detailpesanan($id_pemesanan);
		$data = array(
			'menu_dashboard' => '',
			'menu_penjualan' => 'active',
			'menu_menu' => '',
			'data_detailpemesanan' => $data_detailpemesanan
		);

		$this->template->load('template/template_admin', 'penjualan/detailpenjualan', $data);
	}

	public function tampil($id_pemesanan)
	{
		$data_detailpemesanan = $this->Model_detailpemesanan->get_all_detailpesanan($id_pemesanan);
		$data_pemesanan = $this->Model_pemesanan->get_pemesanan($id_pemesanan);
		$data_menu = $this->Model_menu->get_all_menu();
		$data = array(
			'menu_dashboard' => '',
			'menu_penjualan' => 'active',
			'menu_menu' => '',
			'data_detailpemesanan' => $data_detailpemesanan,
			'data_menu' => $data_menu,
			'data_pemesanan' => $data_pemesanan,
			'id_pemesanan' => $id_pemesanan

		);

		$this->template->load('template/template_admin', 'penjualan/detailpenjualan', $data);
	}

	public function hapus_detailpesanan($id_pemesanan, $id_menu)
	{
	
		$detailpemesanan = $this->Model_detailpemesanan->get_detailpemesanan($id_menu, $id_pemesanan);

		if($detailpemesanan){
			$this->Model_detailpemesanan->delete_detailpemesanan($id_menu, $id_pemesanan);

			$this->tampil($id_pemesanan);
		}else{
			$this->tampil($id_pemesanan);
		}
	
    }


	public function tambah_detailpemesanan()
	{
		$data = array(
			'menu_penjualan' => 'active',
			'judul' => 'TAMBAH PENJUALAN',
			'action' => site_url('Detailpemesanan/proses_tambah_pemesanan'),
			'data_menu' => $this->Model_menu->get_all_menu(),
			'id_pemesanan' => set_value('id_pemesanan'),
			'id_menu' => set_value('id_menu'),
			'jumlah' => set_value('jumlah'),
		);
		
		$this->template->load('template/template_admin', 'penjualan/tambah_detailpenjualan', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_pemesanan','ID Pemesanan','trim|required');
		$this->form_validation->set_rules('id_menu','Menu','trim|required');
		$this->form_validation->set_rules('jumlah','Quantity','trim|required');
	}

	public function proses_tambah_pemesanan()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_detailpemesanan();
		} else {
			$data = array(
			'id_barang' => $this->input->post('id_barang'),
			'tanggal' => $this->input->post('tanggal'),
			'qty' => $this->input->post('qty'),
			'harga' => $this->input->post('harga'),
			);

			$this->Penjualan_model->insert($data);
			redirect(site_url('Penjualan'));
		}
	}
	

	public function ubah_detailpemesanan($id_pemesanan)
	{
		$data_pemesanan = $this->Model_detailpemesanan->get_detailpemesanan($id_pemesanan);
		$data = array(
			'menu_penjualan' => 'active',
			'judul' => 'TAMBAH PENJUALAN',
			'action' => site_url('detailpemesanan/proses_tambah_pemesanan'),
			'data_menu' => $this->Model_menu->get_all_menu(),
			'id_pemesanan' => set_value('id_pemesanan'),
			'id_menu' => set_value('id_menu'),
			'jumlah' => set_value('jumlah'),
		
	);
	
		$this->template->load('template/template_admin', 'penjualan/ubah_detailpenjualan', $data);
	}

	public function proses_ubah_penjualan()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_barang = $this->input->post('id_barang');
			$this->ubah_penjualan($id_barang);
		} else {
			$id_barang = $this->input->post('id_barang');
			$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'tanggal' => $this->input->post('tanggal'),
				'qty' => $this->input->post('qty'),
				'harga' => $this->input->post('harga'),
			);

			$this->Penjualan_model->update($id_barang, $data);
			redirect(site_url('Penjualan'));
		}
	}

	public function proses_tambah_item()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_pemesanan = $this->input->post('id_pemesanan');
			$this->tampil($id_pemesanan);
		} else {
			$id_pemesanan = $this->input->post('id_pemesanan');
			$id_menu = $this->input->post('id_menu');
			$jumlah = $this->input->post('jumlah');
			$harga = $this->input->post('harga');
			
			$this->Model_detailpemesanan->insert_item($id_pemesanan, $id_menu, $jumlah, $harga);

			redirect(site_url('Detailpemesanan/tampil/'.$id_pemesanan));

		} // Sebelah kiri merupakan nama database
	}

	function ajax_get_harga()
	{
        $id_menu = $this->input->post('id_menu',TRUE);
        $data = $this->Model_menu->get_menu($id_menu);
        echo json_encode($data);
    }
}