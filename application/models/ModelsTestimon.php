<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelsTestimon extends CI_Model {

	function TambahComen($id){
		$val = array(
						'IdUser' => $id, 
						'Comment' => htmlspecialchars($this->input->POST('komentar')),
						'Tanggal' =>Date('y-m-d')
					);
		$this->db->insert('comment', $val);
	}

	function TampilComen(){
		return $this->db->query('SELECT Username, Comment, Tanggal FROM `comment`, user WHERE comment.IdUser = user.IdUser ORDER BY `comment`.`Tanggal`  DESC');
	}

}