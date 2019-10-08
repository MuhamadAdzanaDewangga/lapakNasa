<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelregis extends CI_Model {
	
	function TambahUser()
	{	
		$val= array(
			'UserName'=> htmlspecialchars($this->input->post('Username',true)), 
			'Pasword'=> password_hash($this->input->post('Password'),PASSWORD_DEFAULT),
			'Email'=> htmlspecialchars($this->input->post('Email'), true) ,
			'Status'=>  'User'
			);

		$this->db->insert('user', $val);

	}
	

}