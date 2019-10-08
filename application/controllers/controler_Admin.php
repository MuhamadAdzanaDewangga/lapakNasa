<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controler_Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		// $user = $this->db->get_where('admin',['Email'=>$this->session->userdata('email')])->row_array();
		if (!$this->session->userdata('id')) {
			redirect('Controller_halLogin');
		}
		// } else if ($user['Posisi'] !== 'Admin') {
		// 	redirect('controlerKasir');
		// }
	}

	public function index()
	{
		$data['sidebar'] = 'Konten/TopBarAdmin';
		$data['isi'] = 'Konten/Isi/IsiHalHome';
		$this->load->view('halHome', $data);
	}
}
