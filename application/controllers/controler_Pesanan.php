<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controler_Pesanan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('ModelPesanan');
	
	}

	public function index()
	{
		$response = $this->ModelPesanan->TampilPesanan()->result();
		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
		
	}

	public function TampilBrgPsn($idUser){
		$response = $this->ModelPesanan->TampilBrgPsn($idUser)->result();
		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit; 
	}

	public function UbahStsPmb($id){
		$sts = $this->ModelPesanan->ambilsts($id)->row();
		if ($sts->StsPembelian == '1') {
			$dt = '2';
			$this->ModelPesanan->EditSts($id, $dt);
		} elseif ($sts->StsPembelian == '2') {
			$dt = '3';
			$this->ModelPesanan->EditSts($id, $dt);
		} else {
			$this->ModelPesanan->Hapus($id);
		}
	}
}
