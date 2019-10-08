<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_NewAccount extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('modelregis');
	}

	public function index()
	{	
		$this->form_validation->set_rules('Username','Username','required|trim|is_unique[user.UserName]',
			[
				'required' => 'Enter Username',
				'is_unique' => 'Username Sudah Digunakan!'
			]);

		$this->form_validation->set_rules('Email','Email','required|trim|valid_email|is_unique[user.Email]',[
				'required' => 'Enter Email',
				'is_unique' => 'Email Sudah Digunakan',
				'valid_email' => 'silahkan gunakan penulisan email yang benar'
			]);

		
		$this->form_validation->set_rules('Password','Password','required|trim|min_length[6]|matches[RepeatPassword]',[
				'required' => 'Enter Pasword',
				'matches' => 'Pasword tidak sama!',
				'min_length' => 'Pasword min 6 Karakter!'
			]);
		$this->form_validation->set_rules('RepeatPassword','Password','required|trim|matches[Password]',[
			'required' => 'Enter Pasword',
			'matches' => 'Pasword tidak sama!'
			]);

		
		if ($this->form_validation->run() == false)
		{
			$this->load->view('Form_NewAccount');
		} else 
		{
			$this->modelregis->TambahUser();
			redirect('Controller_halLogin');
		}
		
	}
}
