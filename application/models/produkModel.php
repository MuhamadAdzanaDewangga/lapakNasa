<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produkModel extends CI_Model {

	function getDataProduk(){

		return $this->db->query('SELECT * FROM barang');

	}

	function getDetail($idbrg){

		// return $this->db->query('SELECT * FROM barang WHERE  = 7');
		
		return $this->db->where("br_id",$idbrg)->get("barang");
	}

	function MasukKeranjang($id, $UserId){
		$val = array(
					'IdUser' => $UserId, 
					'br_id' => $id,
					'Qty' => '1'
					);
		$this->db->insert('keranjang', $val);
	}

	function TampilKranjang($UserId){
		return $this->db->query('SELECT br_nm, Qty, br_hrg FROM `keranjang`, barang WHERE IdUser = '.$UserId.' and keranjang.br_id = barang.br_id');
	}

	function cekBrg($id, $UserId){
		return $this->db->query('SELECT * FROM `keranjang` WHERE IdUser ='.$UserId.' and br_id ='.$id );
	}

	function TmbhQty($id, $UserId, $Qty){
		$this->db->query('UPDATE `keranjang` SET `Qty`='.$Qty.' WHERE IdUser ='.$UserId.' and br_id ='.$id);
	}

}