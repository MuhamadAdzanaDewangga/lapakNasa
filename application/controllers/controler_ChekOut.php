<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controler_ChekOut extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('id')) {
			redirect('Controller_halLogin');
		}
		$this->load->model('ChekOutModel');
		$this->load->library('form_validation');
	}

	// &&

	public function index()
	{	
		
		$data['sidebar'] = 'Konten/TopBarUser';
		$data['isi'] = 'Konten/Isi/IsiHalChekOut';
		$this->load->view('halHome', $data);
	}

	public function BuatPesanan(){
		parse_str(file_get_contents('php://input'), $Data);
		$id = $this->session->userdata('id');
		$this->ChekOutModel->BuatPesanan($Data, $id);

		
		
	}

	public function uploadGambar(){
		$config['upload_path'] = './aset/gambar/bukti/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
 		$dataupload = $this->upload->data();
       
        $this->output
        	->set_content_type('application/json')
        	->set_output(json_encode(array( 'nama'=>$dataupload['file_name'])));
	}
}
