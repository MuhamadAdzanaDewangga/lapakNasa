<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_halProdukKami extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Models_TambahBarang');
	}
	
	public function index()
	{	
		if (!$this->session->userdata('Status')) {
			$sidebar = 'Konten/TopBar';
			$isi = 'Konten/Isi/IsiHalProdukKami';
		} elseif ($this->session->userdata('Status') == 'User') {
			$sidebar = 'Konten/TopBarUser';
			$isi = 'Konten/Isi/IsiHalProdukKami';
		} else {
			$sidebar = 'Konten/TopBarAdmin';
			$isi = "Konten/IsiAdmin/Pesanan";
		}

		$data['sidebar'] = $sidebar;
		$data['isi'] = $isi;
		$this->load->view('halHome', $data);
	}

	public function HapusDtBarang($idBrg){
		$this->Models_TambahBarang->HapusDtBarang($idBrg);
	}
}
