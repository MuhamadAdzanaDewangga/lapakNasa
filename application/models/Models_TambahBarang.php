<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models_TambahBarang extends CI_Model {

	function Tambah_Barang($Data){
		$val = array(
						'br_nm' => htmlspecialchars($Data['Nama_Barang']), 
						'br_item' =>'1',
						'br_hrg' => htmlspecialchars($Data['Harga']),
						'br_stok' => htmlspecialchars($Data['Jumlah']),
						'br_satuan' => htmlspecialchars($Data['Satuan']),
						'br_gbr' => 'gambar/'.$Data['nama_gambar'],
						'ket' => htmlspecialchars($Data['Deskripsi']),
						'br_sts' => 'Y'
					);
		$this->db->insert('barang', $val);
	}

	function HapusDtBarang($idBrg){
		$this->db->delete('barang', array('br_id' => $idBrg));
	}

	function getdtBrg($id){
		return $this->db->where('br_id', $id)->get('barang');
	}

	function Edit_Barang($id, $Data){
		$val = array(
						'br_nm' => htmlspecialchars($Data['Nama_Barang']), 
						'br_item' =>'1',
						'br_hrg' => htmlspecialchars($Data['Harga']),
						'br_stok' => htmlspecialchars($Data['Jumlah']),
						'br_satuan' => htmlspecialchars($Data['Satuan']),
						'br_gbr' => $Data['nama_gambar'],
						'ket' => htmlspecialchars($Data['Deskripsi']),
						'br_sts' => 'Y'
					);
		$this->db->where('br_id',$id)->update('barang', $val);	
	}

}