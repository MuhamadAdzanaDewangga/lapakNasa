<div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Produk Kami</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
<!-- //start row// -->
	<div class="row" id="produk">
				
        		
  </div>
      <hr>
      <hr>
      
      
    </div>
    <!--end: Container-->
  
  </div>
  <!-- end: Wrapper  -->  

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
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