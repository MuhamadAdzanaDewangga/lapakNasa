<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controler_EditBarang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('id')) {
			redirect('Controller_halLogin');
		}
		$this->load->model('Models_TambahBarang');
	
	}

	public function index()
	{	
		
		$data['sidebar'] = 'Konten/TopBarAdmin';
		$data['isi'] = 'Konten/IsiAdmin/EditBarang';
		$this->load->view('halHome', $data);
	}

	public function getdtBrg($id){
		$response = $this->Models_TambahBarang->getdtBrg($id)->row();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}

	public function Edit_Barang($id){
		parse_str(file_get_contents('php://input'), $Data);
		$this->Models_TambahBarang->Edit_Barang($id, $Data);
	}

	
}
