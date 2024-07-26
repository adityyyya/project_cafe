<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_jenismenu');
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
        $data_jenismenu = $this->Model_jenismenu->get_all_jenismenu();
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => '',
            'menu_menu' => 'active',
            'data_jenismenu' => $data_jenismenu
        );

        $this->template->load('template/template_admin', 'menu/jenismenu_list', $data);
    }

    public function hapus_jenismenu($id_jenis)
    {
        $this->Model_jenismenu->delete_jensimenu($id_jenis);
        $this->session->set_flashdata('message', 'Data jenis menu berhasil dihapus');
        redirect(site_url('Jenis_menu'));
    }

    public function tambah_jenismenu()
    {
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => '',
            'menu_menu' => 'active',
            'judul' => 'TAMBAH MENU',
            'action' => site_url('Jenis_menu/proses_tambah_jenismenu'),
            'id_jenis' => set_value('id_jenis'),
            'nama_jenis' => set_value('nama_jenis'),
        );

        $this->template->load('template/template_admin', 'menu/tambah_jenismenu', $data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required');
    }

    public function proses_tambah_jenismenu()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_jenismenu();
        } else {
            $nama_jenis = $this->input->post('nama_jenis');
            
            // Check for duplicates
            if ($this->Model_jenismenu->check_duplicate($nama_jenis)) {
                $this->session->set_flashdata('message', 'Data jenis menu sudah ada!');
                redirect(site_url('Jenis_menu'));
            } else {
                $data = array(
                    'nama_jenis' => $nama_jenis,
                );
                $this->Model_jenismenu->insert($data);
                $this->session->set_flashdata('message', 'Data jenis menu berhasil ditambahkan');
                redirect(site_url('Jenis_menu'));
            }
        }
    }

    public function ubah_jenismenu($id_jenis)
    {
        $data_jenismenu = $this->Model_jenismenu->get_jenismenu($id_jenis);
        $data = array(
            'menu_dashboard' => '',
            'menu_penjualan' => '',
            'menu_menu' => 'active',
            'judul' => 'UBAH JENISMENU',
            'action' => site_url('Jenis_menu/proses_ubah_jenismenu'),
            'id_jenis' => $id_jenis,
            'nama_jenis' => $data_jenismenu->nama_jenis,
        );

        $this->template->load('template/template_admin', 'menu/ubah_jenismenu', $data);
    }

    public function proses_ubah_jenismenu()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $id_jenis = $this->input->post('id_jenis');
            $this->ubah_jenismenu($id_jenis);
        } else {
            $id_jenis = $this->input->post('id_jenis');
            $nama_jenis = $this->input->post('nama_jenis');
            
            // Check for duplicates
            if ($this->Model_jenismenu->check_duplicate($nama_jenis, $id_jenis)) {
                $this->session->set_flashdata('message', 'Data jenis menu sudah ada!');
                redirect(site_url('Jenis_menu'));
            } else {
                $data = array(
                    'nama_jenis' => $nama_jenis,
                );
                $this->Model_jenismenu->update($id_jenis, $data);
                $this->session->set_flashdata('message', 'Data jenis menu berhasil diubah');
                redirect(site_url('Jenis_menu'));
            }
        }
    }
}
