<!--start: Header -->
	<header>
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row -->
			<div class="row">
					
				<!--start: Logo -->
				<div class="logo span3">
						
					<a class="brand" href="#"><img src="<?= base_url('aset/')?>img/nasa.png" alt="Logo"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span9">
					
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			              			<li><a href="<?php echo base_url('index.php/Controller_halHome') ?>">Home</a></li>
			              			<li><a href="<?php echo base_url('index.php/Controller_halProdukKami') ?>">Pesanan</a></li>
									<li><a href="<?php echo base_url('index.php/Controller_halTestimon') ?>">Testimon</a></li>
                                    <li><a href="<?php echo base_url('index.php/controler_TambahBarang') ?>">Tambah Barang</a></li>
			              			<li>
			                			<a href="<?= base_url('index.php/Controller_halLogin/logout')?>" >Logout</a>
			              			</li>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>	
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>