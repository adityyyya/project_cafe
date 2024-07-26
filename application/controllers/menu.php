<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_menu');
        $this->load->model('Model_jenismenu');
        
        // Pengecekan apakah sudah login
        $this->is_logged_in();
    }

    public function is_logged_in()
    {
        if ($this->session->userdata('logged_in') == FALSE)
        {
            redirect('Login');
        } 
    }

	public function index()
	{
		$data_menu = $this->Model_menu->get_all_menu();
		$data_jenismenu = $this->Model_jenismenu->get_all_jenismenu();
		$id_jenis = $this->input->get('id_jenis'); // Ambil parameter filter jika ada
	
		if ($id_jenis) {
			// Jika filter jenis menu dipilih, tampilkan menu sesuai jenis
			$data_menu = $this->Model_menu->get_menu_by_jenis($id_jenis);
		} else {
			// Jika tidak ada filter, tampilkan semua menu
			$data_menu = $this->Model_menu->get_all_menu();
		}
	
		$data = array(
			'menu_dashboard' => '',
			'menu_penjualan' => '',
			'menu_menu' => 'active',
			'data_menu' => $data_menu,
			'data_jenismenu' => $data_jenismenu,
			'id_jenis' => $id_jenis,
		);
	
		$this->template->load('template/template_admin', 'menu/menu_list', $data);
	}
    public function hapus_menu($id_menu)
    {
        // Cek apakah menu ada di pesanan
        if ($this->Model_menu->is_menu_in_order($id_menu)) {
            $this->session->set_flashdata('error', 'Menu tidak dapat dihapus karena sudah ada di pesanan.');
            redirect(site_url('Menu'));
        } else {
            $this->Model_menu->delete_menu($id_menu);
            $this->session->set_flashdata('success', 'Menu berhasil dihapus.');
            redirect(site_url('Menu'));
        }
    }

    public function tambah_menu()
    {
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => '',
            'menu_menu' => 'active',
            'judul' => 'TAMBAH MENU',
            'action' => site_url('Menu/proses_tambah_menu'),
            'data_jenismenu' => $this->Model_jenismenu->get_all_jenismenu(),
            'id_menu' => set_value('id_menu'),
            'nama_menu' => set_value('nama_menu'),
            'harga' => set_value('harga'),
            'id_jenis' => set_value('id_jenis'),
        );
        
        $this->template->load('template/template_admin', 'menu/tambah_menu', $data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('id_jenis', 'Jenis Menu', 'trim');
    }

    public function proses_tambah_menu()
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->tambah_menu();
    } else {
        $nama_menu = $this->input->post('nama_menu');
        
        if ($this->Model_menu->is_nama_menu_exist($nama_menu)) {
            $this->session->set_flashdata('error', 'Nama menu sudah ada. Silakan pilih nama menu yang lain.');
            redirect(site_url('Menu/tambah_menu'));
        } else {
            $data = array(
                'nama_menu' => $nama_menu,
                'harga' => $this->input->post('harga'),
                'id_jenis' => $this->input->post('id_jenis') ?: null, // Set to null if not provided
            );

            $this->Model_menu->insert($data);

            $lastid = $this->Model_menu->inqlastid()->lastid;

            // setting konfigurasi upload
            $config['upload_path'] = './uploads/fotomenu/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = true;
            $filename = 'FotoMenu-'.$lastid;
            $config['file_name'] = $filename;

            // load library upload
            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if ($_FILES['foto']['name'])
            {
                if ($this->upload->do_upload('foto'))
                {
                    $uploadfotomenu = $this->upload->data();
                    $data = array(
                        'namafile' => $uploadfotomenu['file_name'],
                        'type' => $uploadfotomenu['file_type']
                    );
                    $fotomenu = $data['namafile'];

                    $data = array(
                        'foto' => $fotomenu,
                    );

                    $this->Model_menu->update($lastid, $data);
                }
            }

            redirect(site_url('Menu'));
        }
    }
    }

    public function ubah_menu($id_menu)
    {
        $data_menu = $this->Model_menu->get_menu($id_menu);
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => '',
            'menu_menu' => 'active',
            'judul' => 'UBAH MENU',
            'action' => site_url('Menu/proses_ubah_menu'),
            'data_jenis' => $this->Model_jenismenu->get_all_jenismenu(),
            'id_menu' => $id_menu,
            'nama_menu' => $data_menu->nama_menu,
            'harga' => $data_menu->harga,
            'id_jenis' => $data_menu->id_jenis,
            'foto' => $data_menu->foto,
        );
        
        $this->template->load('template/template_admin', 'menu/ubah_menu', $data);
    }

   
public function proses_ubah_menu()
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $id_menu = $this->input->post('id_menu');
        $this->ubah_menu($id_menu);
    } else {
        $id_menu = $this->input->post('id_menu');
        $nama_menu = $this->input->post('nama_menu');
        
        if ($this->Model_menu->is_nama_menu_exist($nama_menu, $id_menu)) {
            $this->session->set_flashdata('error', 'Nama menu sudah ada. Silakan pilih nama menu yang lain.');
            redirect(site_url('Menu/ubah_menu/'.$id_menu));
        } else {
            $data = array(
                'nama_menu' => $nama_menu,
                'harga' => $this->input->post('harga'),
                'id_jenis' => $this->input->post('id_jenis') ?: null, // Set to null if not provided
            );

            $this->Model_menu->update($id_menu, $data);

            // setting konfigurasi upload
            $config['upload_path'] = './uploads/fotomenu/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = true;
            $filename = 'FotoMenu-'.$id_menu;
            $config['file_name'] = $filename;

            // load library upload
            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if ($_FILES['foto']['name'])
            {
                if ($this->upload->do_upload('foto'))
                {
                    $uploadfotomenu = $this->upload->data();
                    $data = array(
                        'namafile' => $uploadfotomenu['file_name'],
                        'type' => $uploadfotomenu['file_type']
                    );
                    $fotomenu = $data['namafile'];

                    $data = array(
                        'foto' => $fotomenu,
                    );

                    $this->Model_menu->update($id_menu, $data);
                }
            }

            redirect(site_url('Menu'));
        }
    }
}

    public function set_habis($id_menu)
    {
        $data = array(
            'status_habis' => 'Y'
        );

        $this->Model_menu->set_habis($id_menu, $data);
        redirect(site_url('Menu'));
    }

    public function set_ada($id_menu)
    {
        $data = array(
            'status_habis' => 'T'
        );

        $this->Model_menu->set_ada($id_menu, $data);
        redirect(site_url('Menu'));
    }

    public function resetfoto($id_menu)
    {
        $this->Model_menu->reset_foto($id_menu);
        redirect(site_url('Menu/ubah_menu/'.$id_menu));
    }

	public function filter_menu()
{
    $id_jenis = $this->input->get('id_jenis');
    
    // Ambil semua jenis menu
    $data_jenismenu = $this->Model_jenismenu->get_all_jenismenu();
    
    if ($id_jenis) {
        // Jika filter jenis menu dipilih, tampilkan menu sesuai jenis
        $data_menu = $this->Model_menu->get_menu_by_jenis($id_jenis);
    } else {
        // Jika tidak ada filter, tampilkan semua menu
        $data_menu = $this->Model_menu->get_all_menu();
    }
    
    $data = array(
        'menu_dashboard' => '',
        'menu_penjualan' => '',
        'menu_menu' => 'active',
        'data_menu' => $data_menu,
        'data_jenismenu' => $data_jenismenu,
        'id_jenis' => $id_jenis,
    );

    $this->template->load('template/template_admin', 'menu/menu_list', $data);
}

}
