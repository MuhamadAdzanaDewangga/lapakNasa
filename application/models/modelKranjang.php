<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modelKranjang extends CI_Model {
	
	function TampilKranjang($UserId)
	{	
		return $this->db->query('SELECT `br_nm`, `Qty`, `br_hrg`, IdKeranjang, br_stok FROM `keranjang`, barang WHERE keranjang.br_id = barang.br_id and IdUser ='.$UserId);

	}

	function HapusKeranjang($idK){
		$this->db->delete('keranjang', array('IdKeranjang' => $idK));
	}

	function ambilQty($idK){
		return $this->db->query('SELECT Qty, br_stok FROM `keranjang`, barang WHERE barang.br_id = keranjang.br_id and IdKeranjang = '.$idK);
	}

	function UbahQty($idK, $Qty){
		$val = array('Qty' => $Qty);
		$this->db->where('IdKeranjang', $idK)->update('keranjang', $val);
	}
	

}