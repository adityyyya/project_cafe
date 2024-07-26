<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    	$this->load->model('Model_kasir');
	}

	public function index()
	{

		if($this->is_logged_in())
		{
			redirect('Admin');
		}
		else
		{
			$this->load->view('login');
		}

	}

	public function is_logged_in()
	{
		if ($this->session->userdata('logged_in')==TRUE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function proses_login()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
        $query = $this->db->query('SELECT * FROM kasir WHERE username="'.$username.'" AND password="'.$password.'"');

		if($query->num_rows() > 0) 
			{
			//ambil data user dari database
			$row = $query->row();
			
			$datalogin = array(
				   'id_kasir' => $row->id_kasir,
                   'no_hp'  => $row->no_hp,
				   'username' => $row->username,
				   'logged_in' => TRUE
            );

			$this->session->set_userdata($datalogin);
			
			redirect('Admin');
		}
		else
		{
			redirect('Login');
		}
		
	}

	public function proses_logout()
	{		
		$this->session->sess_destroy();

		redirect('Login');
	}
}