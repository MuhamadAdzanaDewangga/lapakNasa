<!-- start: Page Title -->
 <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Produk Detail Produk</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
<!-- end: Page Title -->
			
<!--start: Wrapper-->
  <div id="wrapper">
        
    <!-- start: Container -->
    <div class="container">

      <!-- start: Table -->
      <div class="title"><h3>Keranjang Anda</h3></div>
        <div class="hero-unit">
          <table class="table table-hover table-condensed">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Item</center></th>
              <th><center>Quantity</center></th>
              <th><center>Sub Total</center></th>
            </tr>
          </thead>
          <tbody id="kranjng">
             
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"><p><div align="right">
              <a href="<?php echo base_url('index.php/Controller_keranjang') ?>" class="btn btn-success">&raquo Details Keranjang &laquo</a>
              </div></p></td>
            </tr>    
          </tfoot>
          </table>
        </div>
        
      <!-- end: Table -->

<div class="row">
  <div class="col-sm-6">
  <!--<div class="span4">-->
  <!--<div class="icons-box">-->
    <div class="hero-unit" style="margin-left: 20px;">
    <table id="detailProduk">
      
     
    </table>
  </div>
</div>
      <!-- end: Row -->
          
          
        </div>
    </div>
    <!-- end: Container -->
        
  </div>
  <!-- end: Wrapper  -->   

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
  $(document).ready(function(){
    TampilKranjang();

    var id = '<?php echo($id) ?>';
    // console.log(id);
    $.ajax({
      url: "<?php echo base_url('index.php/getDetailbeli/') ?>"+id,
      type: "GET",
      dataType: "json",
      success: function(response){
        $('#detailProduk').append(
          '<tr>'+
            '<td rowspan="7"><img src="<?= base_url('aset/')?>'+response.br_gbr+'" /></td>'+
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
            '<td><h3>Keterangan</h3></td>'+
            '<td><h3>:</h3></td>'+
            '<td><div><h3>'+response.ket+'</h3></div></td>'+
          '</tr>'+
          '<tr>'+
            '<td></td>'+
            '<td></td>'+
            '<td></td>'+
            '<td><div class="clear"> <button onclick="TambahPembelian('+response.br_id+')" class="btn btn-lg btn-danger">Beli &raquo;</button></div></td>'+
          '</tr>'
          );
      }

    })
  })

function TambahPembelian(idB){
  $.ajax({
      url: "<?php echo base_url('index.php/MasukKeranjang/') ?>"+idB,
      type: "POST",
      dataType: "json",
      success: function(){
      TampilKranjang();
      }
  });
}

function TampilKranjang(){
  $.ajax({
      url: "<?php echo base_url('index.php/TampilKranjang') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
      $('#kranjng').html('');
      for (var i=0; i<response.length; i++){
        var sub = (response[i].Qty * response[i].br_hrg);
        // Untuk memberi titik di setiap 3 angka
        var blng = sub; 
        var reverse = blng.toString().split('').reverse().join(''),
        rbn  = reverse.match(/\d{1,3}/g);
        rbn  = rbn.join('.').split('').reverse().join('');
        // akhir
        $('#kranjng').append(
            '<tr>'+
             '<td><center>'+(i+1)+'</center></td>'+
             '<td><center>'+response[i].br_nm+'</center></td>'+
             '<td><center>'+response[i].Qty+'</center></td>'+
             '<td><center>'+rbn+'</center></td>'+
           '</tr>'
          );
      } 
      }
  });
}

</script>






