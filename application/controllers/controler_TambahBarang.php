<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controler_TambahBarang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Models_TambahBarang');
		if ($this->session->userdata('Status') !== 'Admin') {
			redirect('Controller_halHome');
		}
	}

	public function index()
	{
		$data['sidebar'] = 'Konten/TopBarAdmin';
		$data['isi'] = 'Konten/IsiAdmin/tambahBarang';
		$this->load->view('halHome', $data);
	}

	public function UploadGmbBarang(){
		$config['upload_path'] = './aset/gambar/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
 		$dataupload = $this->upload->data();
       
        $this->output
        	->set_content_type('application/json')
        	->set_output(json_encode(array( 'nama'=>$dataupload['file_name'])));

	}

	public function Tambah_Barang(){
		parse_str(file_get_contents('php://input'), $Data);
		$this->Models_TambahBarang->Tambah_Barang($Data);

	}
}
