<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_produk extends CI_Controller {
	public function __construct(){ //construct digunakan untuk pembentukan objek saat class dijalankan
		parent::__construct();
		$this->load->model('produkModel');
	}

	public function index()
	{
		$response = $this->produkModel->getDataProduk()->result(); //result mendapatkan data semua
		
		$this->output
		->set_status_header(201) //untuk menampilkan status data
		->set_content_type('application/json') //untuk menentukan type data output 
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}
	public function getDetail($idbrg) //$idbrg is variabel should use $ 
	{
		$response = $this->produkModel->getDetail($idbrg)->row(); //row untuk mendapatkan data satu baris
		$this->output
		->set_status_header(201) //untuk menampilkan status data
		->set_content_type('application/json') //untuk menentukan type data output 
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;

	}
}