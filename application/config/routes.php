<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Controller_halHome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['getDataProduk'] = 'Controller_produk';
$route['getDetail/(:any)'] = 'Controller_produk/getDetail/$1';
$route['getHalHome']   = 'Controller_halHome';
$route['getkeranjangku']   = 'Controller_keranjangku';
// creat new account
$route['gotoFormNew']   = 'Controller_NewAccount';


// detail beli
$route['sentDetailbeli/(:any)'] = 'controler_DetaiBeli/index/$1';
$route['getDetailbeli/(:any)'] = 'controler_DetaiBeli/getDetail/$1';
$route['MasukKeranjang/(:any)'] = 'controler_DetaiBeli/MasukKeranjang/$1';
$route['TampilKranjang'] = 'controler_DetaiBeli/TampilKranjang';

//Testimon
$route['getDataUser']   = 'Controller_halTestimon/getNameUser';
$route['Comen']   = 'Controller_halTestimon/TambahComen';
$route['getComen']   = 'Controller_halTestimon/TampilComen';

// Keranjang
$route['ShowKranjang']   = 'Controller_keranjang/TampilKranjang';
$route['HapusKeranjang/(:any)']   = 'Controller_keranjang/HapusKeranjang/$1';
$route['TambahQty/(:any)']   = 'Controller_keranjang/TambahQty/$1';
$route['KurangQty/(:any)']   = 'Controller_keranjang/KurangQty/$1';

// chekout
$route['BuatPesanan']   = 'controler_ChekOut/BuatPesanan';
$route['uploadGambar']   = 'controler_ChekOut/uploadGambar';

// tambah barang
$route['UploadGmbBarang']   = 'controler_TambahBarang/UploadGmbBarang';
$route['Tambah_Barang']   = 'controler_TambahBarang/Tambah_Barang';

// hapus Barang
$route['HapusDtBarang/(:any)']   = 'Controller_halProdukKami/HapusDtBarang/$1';

// Edit Barang
$route['EditBarang'] = 'controler_EditBarang/index';
$route['Edit_Barang/(:any)'] = 'controler_EditBarang/Edit_Barang/$1';
$route['getdtBrg/(:any)'] = 'controler_EditBarang/getdtBrg/$1';

// Pesanan
$route['TampilPesanan'] = 'controler_Pesanan';
$route['TampilBrgPsn/(:any)'] = 'controler_Pesanan/TampilBrgPsn/$1';
$route['UbahStsPmb/(:any)'] = 'controler_Pesanan/UbahStsPmb/$1';


