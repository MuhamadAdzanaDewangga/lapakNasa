<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_halLogin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->form_validation->set_rules('Username','Username','required|trim',[
			'required' => 'Enter Username'
		]);
		$this->form_validation->set_rules('Password','Password','required|trim',[
			'required' => 'Enter Password'
		]);

		if ($this->form_validation->run() == false)
		{
			$this->load->view('halLogin');
		} else 
		{
			$this->_login();
		}
		
	}

	private function _login(){
		$Username = $this->input->post("Username");
		$Password = $this->input->post('Password');

		$User = $this->db->get_where('user',['UserName' => $Username])->row_array();
		
		//Cek Usernya Ada Tidak 
		if($User){
				// cek paswordnya benar apa endak
				if (password_verify($Password, $User['Pasword'])) {
					$data = [
						'id' => $User['IdUser'],
						'Status' => $User['Status']
					];
					$this->session->set_userdata($data);
					redirect('Controller_halHome');
						// cek status user tersebut admin apa user biasa
						// if ($User['Status'] == 'Admin') {
						// 	redirect('controler_Admin');
						// }else{
						// 	redirect('Controller_halUser');
						// }
					
					
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Pasword yang anda masukan salah!</div>');
					redirect('Controller_halLogin');
				}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Username yang anda masukan salah silahkan login lagi!</div>');
			redirect('Controller_halLogin');
		}

	}

	public function logout(){
		$this->session->unset_userdata('id');	
		$this->session->unset_userdata('Status');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">You Succes logout!</div>');
		redirect('Controller_halHome');
	}
}

