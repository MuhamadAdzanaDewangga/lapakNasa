<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_halUser extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('id')) {
			redirect('Controller_halLogin');
		}
	}

	public function index()
	{	
		$data['sidebar'] = 'Konten/TopBarUser';
		$data['isi'] = 'Konten/Isi/IsiHalHome';
		$this->load->view('halHome', $data);
	}
}
