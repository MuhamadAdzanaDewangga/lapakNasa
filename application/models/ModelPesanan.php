<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModelPesanan extends CI_Model {
	
	function TampilPesanan()
	{	
		return $this->db->query('SELECT UserName, order.IdUser, Bukti_Transfer, StsPembelian, telepon, 	nama_penerima, alamat, kp_pem, kota_pem, provinsi, Email, norek_pem, bank_pem FROM `order`, user where user.IdUser = order.IdUser GROUP by UserName ORDER BY `order`.`StsPembelian` ASC');	
	}


	function TampilBrgPsn($idUser){
		return $this->db->query('SELECT br_nm, Qty, br_hrg FROM `order`, barang WHERE barang.br_id = order.br_id and IdUser ='.$idUser);
	}

	function ambilsts($id){
		return $this->db->query('SELECT StsPembelian FROM `order` where IdUser = '.$id.'  GROUP by IdUser');
	}

	function EditSts($id, $dt){
		$val = array('StsPembelian' => $dt);
		$this->db->where('IdUser', $id)->update('order', $val);
	}

	function Hapus($id){
		$this->db->delete('order', array('IdUser' => $id));
	}

}