<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controler_DetaiBeli extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('id')) {
			redirect('Controller_halLogin');
		}
		$this->load->model('produkModel');
	
	}

	public function index($id)
	{	
		$data['id'] = $id;
		$data['sidebar'] = 'Konten/TopBarUser';
		$data['isi'] = 'Konten/Isi/IsiHalDetailBelanja';
		$this->load->view('halHome', $data);
	}

	public function getDetail($id){
		$response = $this->produkModel->getDetail($id)->row();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}

	public function MasukKeranjang($id){
		// untuk mengetahui id user
		$UserId = $this->session->userdata('id');
		// mengecek apakah user tersebut sudah membeli prodak itu apa blm
		$cekBrg = $this->produkModel->cekBrg($id, $UserId)->row();
		
		// jika user tersebut belum membeli
		if (!$cekBrg) {
			// maka yang akan di jalankan ini
			$this->produkModel->MasukKeranjang($id, $UserId);
		} else {
			// jika sudah yg akan dijalankan ini
			$Qty = $cekBrg->Qty + 1; 
			$this->produkModel->TmbhQty($id, $UserId, $Qty);
		}

	}

	public function TampilKranjang(){
		$UserId = $this->session->userdata('id');
		$dt = $this->produkModel->TampilKranjang($UserId)->result(); 

	
		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($dt, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}
}
