<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_keranjang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('modelKranjang');
	}
	
	public function index()
	{
		if (!$this->session->userdata('Status')) {
			redirect('Controller_halLogin');
		} elseif ($this->session->userdata('Status') == 'User') {
			$sidebar = 'Konten/TopBarUser';
		} else {
			$sidebar = 'Konten/TopBarAdmin';
		}

		$data['sidebar'] = $sidebar;
		$data['isi'] = 'Konten/Isi/IsiHalKranjang';
		$this->load->view('halHome', $data);
		
	}

	public function TampilKranjang(){
		$UserId = $this->session->userdata('id');
		$response = $this->modelKranjang->TampilKranjang($UserId)->result();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}

	public function HapusKeranjang($idK){
		$this->modelKranjang->HapusKeranjang($idK);
	}

	public function TambahQty($idK){
		$ambilQty = $this->modelKranjang->ambilQty($idK)->row();
		$Qty = $ambilQty->Qty + 1;
		$this->modelKranjang->UbahQty($idK, $Qty);
	}

	public function KurangQty($idK){
		$ambilQty = $this->modelKranjang->ambilQty($idK)->row();
		$Qty = $ambilQty->Qty - 1;

		if ($Qty < 1) {
			$this->modelKranjang->HapusKeranjang($idK);
		} else {
			$this->modelKranjang->UbahQty($idK, $Qty);
		}
	}	
}
