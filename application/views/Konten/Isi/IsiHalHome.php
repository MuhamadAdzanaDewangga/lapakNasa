<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>T-Produk Lacoco</h2>
				<p>Kami menyediakan berbagai macam produk lacoco dengan keunggulan dan kegunaan masing-masing setiap produk.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="<?= base_url('aset/')?>img/parallax-slider/lacoco1.png" alt="image01" ></div>
			</div>
			<div class="da-slide">
				<h2>Lacoco Aloevera</h2>
				<p>Lacoco Aloevera merupakan produk yang kaya manfaat, dapat digunakan sebagai toner & eksfoliator, Kandungan BHA nya akan membersihkan kulit dan mengangkat sel kulit mati sehingga kulit lebih cerah dan lembut.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="<?= base_url('aset/')?>img/parallax-slider/lacoco.png" alt="image02" ></div>
			</div>
			<div class="da-slide">
				<h2>Moreskin Nature</h2>
				<p>Moreskin Nature merupakan salah satu produk unggulan Nasa yang banyak diminati kaum Wanita untuk mempercantik dan menyempurnakan setiap penampilannya. Sehingga nampak terlihat lebih natural.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="<?= base_url('aset/')?>img/parallax-slider/nature.png" alt="image04" ></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
    					Nasa Lapak adalah lapak online yang menyediakan produk kosmetik herbal yang sudah terbukti kwalitasnya. Selamat Berbelanja Nasa..
    				</p>
        		<p><a class="btn btn-success btn-large" href=<?= base_url('aset/')?>"produk.php">Mulai Berbelanja &raquo;</a></p>
                                
      		</div>
<!-- //start row// -->
			<div class="row" id="produk">
				
        		
      </div>
      <hr>
      <hr>
  <!-- start: Row -->
      <div class="row">
        
        <!-- start: Icon Boxes -->
        <div class="icons-box-vert-container">

          <!-- start: Icon Box Start -->
          <div class="span6">
            <div class="icons-box-vert">
              <i class="ico-ok ico-color circle-color big"></i>
              <div class="icons-box-vert-info">
                <h3>Kemudahan Berbelanja</h3>
                <p>Dapatkan kemudahan berbelanja di Nasa Lapak, Kami menyediakan produk herbal kecantikan untuk wajah sehat & glowing.</p>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- end: Icon Box-->

          <!-- start: Icon Box Start -->
          <div class="span6">
            <div class="icons-box-vert">
              <i class="ico-cup  ico-white circle-color-full big-color"></i>
              <div class="icons-box-vert-info">
                <h3>Kecepatan Pengiriman Barang</h3>
                <p>Selamat menikmati kemudahan dan kecepatan pengiriman barang sampai di depan rumah anda, dalam keadaan aman dan selamat .</p>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- end: Icon Box -->

        </div>
        <!-- end: Icon Boxes -->
        <div class="clear"></div>
      </div>
      <!-- end: Row -->
      
      
    
      
      <hr>
      
    </div>
    <!--end: Container-->
  
  </div>
  <!-- end: Wrapper  -->  

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
	//buat function//
$(document).ready(function(){
  $.ajax({
      url: "<?php echo base_url('index.php/getDataProduk') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
       $('#produk').empty('');
       /*#buat id*/
       for (var i=0; i<response.length; i++){
        $('#produk').append(
          
        '<div class="span4">'+
                '<div class="icons-box">'+
                        '<div class="title"><h3>'+response[i].br_nm+'</h3></div>'+
                        '<img src="<?= base_url('aset/')?>'+response[i].br_gbr+'">'+
            '<div><h3>Rp.'+response[i].br_hrg+'</h3></div>'+
            '<div class="clear"><button data-toggle="modal" data-target="#produkModel"  class="btn btn-lg btn-danger" onclick = " detail('+response[i].br_id+')" >Detail</button>'+ 
            '<button onclick = " beli('+response[i].br_id+')"  class="btn btn-lg btn-success">Beli</button></div>'+
          
                    '</div>'+
            '</div>'  
        );
      }
    }
    });

});

function detail(idbrg){
   $.ajax({
      url: "<?php echo base_url('index.php/getDetail/') ?>"+idbrg,
      type: "GET",
      dataType: "json",
      success: function(response){
      /*$('#Stok').text(response.br_nm);*/
      $('#detailModalProdak').empty();
      $('#detailModalProdak').append(
          '<div class="modal-header">'+
            '</div>'+
          '<div class="modal-body">'+
            '<table>'+    
            '<tr>'+
              '<td rowspan="7"><img src="<?= base_url("aset/")?>'+response.br_gbr+'" /></td>'+
              '</tr>'+
              '<tr>'+
              '<td colspan="4"><div class="title"><h3>'+response.br_nm+'</h3></div></td>'+
            '</tr>'+
           '<tr>'+
              '<td></td>'+
              '<td size="200"><h3>Harga</h3></td>'+
            '<td><h3>:</h3></td>'+
            '<td><div><h3>Rp.'+response.br_hrg+'</h3></div></td>'+
            '</tr>'+
            '<tr>'+
              '<td></td>'+
              '<td><h3>Stock</h3></td>'+
              '<td><h3>:</h3></td>'+
              '<td><div><h3>'+response.br_stok+'</h3></div></td>'+
            '</tr>'+
            '<tr>'+
              '<td></td>'+
              '<td><h3>Satuan</h3></td>'+
              '<td><h3>:</h3></td>'+
              '<td><div><h3>'+response.br_satuan+'</h3></div></td>'+
            '</tr>'+
            '<tr>'+
              '<td></td>'+
              '<td align=right valign=top ><h3>Keterangan</h3></td>'+
              '<td align=right valign=top ><h3>:</h3></td>'+
              '<td><div><h3>'+response.ket+'</h3></div></td>'+
            '</tr>'+
            '</table>'+
            '</div>'+
            '<div class="modal-footer">'+
              '<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>'+
              '<button onclick="beli('+response.br_id+')" class="btn btn-lg btn-success">Beli &raquo;</button>'+
            '</div>'
        );
      }
    });
    }

    function beli(idbrg){
      // alert(idbrg)
      location.href = "<?php echo base_url('index.php/sentDetailbeli/') ?>"+idbrg;
       // $.ajax({
      //   url: "<?php echo base_url('index.php/getBelanja/') ?>"+idbrg,
      //   type: "POST",
      //   dataType: "json",
      // });
   
}

</script>