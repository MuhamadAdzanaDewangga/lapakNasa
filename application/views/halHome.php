
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>LapakNasa | Lapak Online Kecantikan Alami</title> 
	<meta name="description" content="Distro, cikarang, terlengkap, information, technology, jababeka, baru, murah"/>
	<meta name="keywords" content="Kaos, Murah, Cikarang, Baru, terlengkap, harga, terjangkau" />
	<meta name="author" content="Hakko Bio Richard"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:type" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="<?= base_url('aset/')?>css/bootstrap.css"rel="stylesheet">
    <link href="<?= base_url('aset/')?>css/bootstrap-responsive.css"rel="stylesheet">
	<link href="<?= base_url('aset/')?>css/style.css"rel="stylesheet">
	<link href="<?= base_url('aset/')?>fontawesome-free/css/all.min.css"rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
	<?php $this->load->view($sidebar);?>
	<!--end: Header-->
	
	<!-- start: Slider -->
	<?php $this->load->view($isi);?>
		
      		
					

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="<?= base_url('aset/')?>img/logo-footer-menu.png" alt="logo" ></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->
				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">
					
					<h3>Tentang Nasa Lapak</h3>
					<p>
						Nasa Lapak adalah toko online yang menjual produk herbal kecantikan dengan kwalitas terjamin dengan berbagai macam testimoni dari costumer.
					</p>
						
				</div>
				<!-- end: About -->

				<!-- start: Photo Stream -->
				<div class="span3">
					
					<h3>Alamat Kami</h3>
					Senuko RT/RW 04/07 Kecamatan Godean, Kabupaten Sleman, Yogyakarta <br>
                    Telp  :081226429841<br>
                    Email :<a href="nasalapak@gmail.com">nasalapak@gmail.com</a> 
					<!-- start: Newsletter -->

				</div>

				<div class="span3">
				
					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<p>Facebook  :nasalapak</p>
					<p>Instagram :nasalapak</p>
					<p>Line      :@nasalapak</p>
				</div>
				<!--	<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form> -->
					<!-- end: Newsletter -->
				
				
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				Copyright &copy; <a href="http://www.nasalapak.com">Nasa Lapak <?= Date('Y')?></a> designed by Lusiyana
			</p>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->
<!-- start modal -->

<div id="produkModel" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div id="detailModalProdak" class="modal-content">
      
        	
        
    </div>
  </div>
</div>
<!-- end modal -->

</body>
</html>