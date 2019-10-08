
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
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
  tampilBrg();

});

function tampilBrg(){
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
            '<div class="clear"><button onclick = " Edit('+response[i].br_id+')"  class="btn btn-lg btn-success"><i class="fas fa-edit" style="font-size: 17px; padding: 4px 7px;"></i></button> '+ 
            '<button  class="btn btn-lg btn-danger" onclick = " hapus('+response[i].br_id+')" ><i class="fas fa-trash-alt" style="font-size: 17px; padding: 4px 7px;"></i></button></div>'+
          
                    '</div>'+
            '</div>'  
        );
      }
    }
    });
}

function hapus(idbrg){
  var yes = confirm('Hapus Barang Ini');
    if (yes == false){
        Close;
    }
      $.ajax({
        url: "<?php echo base_url('index.php/HapusDtBarang/')?>"+idbrg,
        type: "POST",
        dataType: "json",
          success: function(){
            tampilBrg();
          }
      });
}



    function Edit(idbrg){

      location.href = "<?php echo base_url('index.php/EditBarang?i=') ?>"+idbrg;
       
   
}

</script>