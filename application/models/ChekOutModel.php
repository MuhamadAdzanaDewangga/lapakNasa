<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChekOutModel extends CI_Model {

	function BuatPesanan($Data, $id){

		$br = $this->db->query('SELECT br_id, Qty FROM `keranjang` WHERE IdUser = '.$id)->result();
		foreach ($br as $kranjang) {
			$val = array(
				'tanggal' => date('y-m-d'), 
				'nama_penerima' => htmlspecialchars($Data['Nama_Penerima']),
				'alamat' => htmlspecialchars($Data['Alamat']),
				'kp_pem' => htmlspecialchars($Data['Kode_Pos']),
				'kota_pem' => htmlspecialchars($Data['Kota']),
				'telepon' => htmlspecialchars($Data['No_Telepon']),
				'norek_pem' => htmlspecialchars($Data['No_Rekening']),
				'bank_pem' => htmlspecialchars($Data['Nama_Bank']),
				'Bukti_Transfer' => htmlspecialchars($Data['nama_gambar']),
				'status_pembelian' => 'P',
				'IdUser' => $id,
				'br_id' => $kranjang->Qty,
				'Qty' => $kranjang->br_id,
				'provinsi' => htmlspecialchars($Data['Provinsi'])

			);
			$this->db->insert('order', $val);
		}
		$this->db->delete('keranjang', array('IdUser' => $id));
		

	}

	

}