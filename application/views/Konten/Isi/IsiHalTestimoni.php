<!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Testimoni</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
<!-- end: Page Title -->
			
<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
<!-- //start row// -->
	<div class="row" id="produk">
				
        		
  </div>
      <hr>
      <hr>
      <!--start: Wrapper-->
  <div id="wrapper">
        
<!--start: Container -->
  <div class="container"> 
    <center><div class="title" style="margin-left: ;"><h3>Berikan masukan untuk kami, Agar kami bisa melayani anda lebih baik lagi...</h3></div></center>
      <form id="formKomen">
<table style="font-style: oblique; font-weight: bold; margin-left: 140px;">
<tr>
<td width="150">Nama</td>
<td width="30">:</td>
<td width="550"><input id="NamaU" type="text" name="nama" size="30" class="required"  disabled></td>
</tr>
<tr>
<td width="150">Email</td>
<td width="30">:</td>
<td width="550"><input id="EmailU" type="text" name="email" size="30" class="required email"  disabled></td>
</tr>
<tr>
<td width="150">Komentar</td>
<td width="30">:</td>
<td width="550"><textarea id="comm" name="komentar" size="30" class="required" minlength="3" placeholder="Komentar Anda " /></textarea></td>
</tr>
<tr>
<td width="150"></td>
<td width="30"></td>
<td width="550">
<button class="button" type="button" onclick="comment()">Kirim</button>
</td>
</tr>
</table>
</form>
</div>
<div class="komentar">
<!-- awal -->
  <div class="container"  style="display:block;
    border: none;
    padding:5px;
    margin-top:5px;
    height:260px;
    overflow:scroll; 
    max-width: 663px;">
    <div id="IsiKomen">
     
      <!-- <h5>sabtu, 17/09/2019</h5>
      <h4 id="fat" style="color: red;">anggga, </h4>
      
      <p>manqtap gan sdasd asd asd ad asd as d a Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       -->
      
      

    </div>
  </div>
<!-- akhir -->
</div>
</div>
      
    </div>
    <!--end: Container-->
  
  </div>
  <!-- end: Wrapper  -->  

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
$(document).ready(function(){
  $.ajax({
      url: "<?php echo base_url('index.php/getDataUser') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
      $('#NamaU').val(response.UserName);
      $('#EmailU').val(response.Email);
      }
  });

  TampilComen();
})

function comment(){
  $.ajax({
    url : "<?php echo base_url('index.php/Comen') ?>",
    type : "POST",
    data: $('#formKomen').serialize(),
    dataType: "JSON",
    success:function(){
      $('#comm').val('');
      TampilComen();
    }
  });
}

function TampilComen(){
  $.ajax({
      url: "<?php echo base_url('index.php/getComen') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
      $('#IsiKomen').html('');
      
      for (var i=0; i<response.length; i++){
        var d = new Date();
        var day = response[i].Tanggal;
        $('#IsiKomen').append(
          '<h4 style="color: red;">'+response[i].Username+'</h4>'+
          '<h6>'+response[i].Tanggal+'</h6>'+
          '<p>'+response[i].Comment+'</p>'
          )
      }
      }
  });
}

</script>









