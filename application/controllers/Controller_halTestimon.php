<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_halTestimon extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ModelsTestimon');

	}
	
	public function index()
	{	
		if (!$this->session->userdata('Status')) {
			redirect('Controller_halLogin');
		} elseif ($this->session->userdata('Status') == 'User') {
			$sidebar = 'Konten/TopBarUser';
			$Testimon = 'Konten/Isi/IsiHalTestimoni';
		} else {
			$sidebar = 'Konten/TopBarAdmin';
			$Testimon = 'Konten/IsiAdmin/Testimon';
		}

		$data['sidebar'] = $sidebar;
		$data['isi'] = $Testimon;
		$this->load->view('halHome', $data);
	}

	public function getNameUser(){
		$user = $this->db->select('Email, UserName')->get_where('user',['IdUser'=>$this->session->userdata('id')])->row_array();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($user, JSON_PRETTY_PRINT))
				->_display();
		exit;
	}

	public function TambahComen(){
		$id = $this->session->userdata('id');
		$this->ModelsTestimon->TambahComen($id);	
	}

	public function TampilComen(){
		$response = $this->ModelsTestimon->TampilComen()->result();

		$this	->output
				->set_status_header(202)
				->set_content_type('aplication/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
		exit;	
	}
}
