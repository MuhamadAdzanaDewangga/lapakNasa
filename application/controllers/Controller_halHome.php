<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_halHome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{	
		if (!$this->session->userdata('Status')) {
			$sidebar = 'Konten/TopBar';
			$Isi = 'Konten/Isi/IsiHalHome';
		} elseif ($this->session->userdata('Status') == 'User') {
			$sidebar = 'Konten/TopBarUser';
			$Isi = 'Konten/Isi/IsiHalHome';
		} else {
			$sidebar = 'Konten/TopBarAdmin';
			$Isi = 'Konten/IsiAdmin/HalBarang';
		}

		$data['sidebar'] = $sidebar;
		$data['isi'] = $Isi;
		$this->load->view('halHome', $data);
	}
}
