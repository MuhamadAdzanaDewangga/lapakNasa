<!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Keranjang</h2>

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
        <div class="title"><h3>Detail Keranjang Belanja</h3></div>
        <table class="table table-hover table-condensed">
        <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Nama Barang</center></th>
            <th><center>Qty</center></th>
            <th><center>Harga Satuan</center></th>
            <th><center>Sub Total</center></th>
            <th><center>Opsi</center></th>
          </tr>  
        </thead>
        <tbody id="Kerajang">

        </tbody>
        <tfoot id="KrFot">
              
        </tfoot>
        </table>
      
        
      <!-- end: Table -->

    </div>
    <!-- end: Container -->
        
  </div>
  <!-- end: Wrapper  -->   

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
$(document).ready(function(){
  TampilKranjang();
})

function Hapus(id){
  $.ajax({
      url: "<?php echo base_url('index.php/HapusKeranjang/') ?>"+id,
      type: "POST",
      dataType: "json",
      success: function(){
        TampilKranjang();
      }
  });
}

function TambahQty(id){
  $.ajax({
      url: "<?php echo base_url('index.php/TambahQty/') ?>"+id,
      type: "POST",
      dataType: "json",
      success: function(){
        TampilKranjang();
      }
  });
}

function KurangQty(id){
  $.ajax({
      url: "<?php echo base_url('index.php/KurangQty/') ?>"+id,
      type: "POST",
      dataType: "json",
      success: function(){
        TampilKranjang();
      }
  });
}

function TampilKranjang(){
  $.ajax({
      url: "<?php echo base_url('index.php/ShowKranjang') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
         if (response == 0) {
              $('#KrFot').empty();
              $('#KrFot').append(
                  '<tr>'+
                    '<td colspan="3"></td>'+
                    '<td colspan="3"><p><div align="right">'+
                      '<a href="<?php echo base_url('index.php/Controller_halProdukKami') ?>" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>'+
                      '</div></p>'+
                    '</td>'+
                  '</tr>'
                );
              $('#Kerajang').html('');
              $('#Kerajang').append(
                '<tr>'+
                    '<td colspan="6"><center>Ups Keranjang Kosong!!</center></td>'+
                '</tr>'
                );
          } else {
              $('#KrFot').empty();
              
                // var dis;
                var ttl = 0;
              $('#Kerajang').html('');
              for (var i=0; i<response.length; i++){
                
                // if (response[i].Qty >= response[i].br_stok) {
                //   dis = 'disabled';
                // } else {
                //   dis = 'enebled';
                // }

                var sub = (response[i].Qty * response[i].br_hrg);
                ttl += sub;
                // Untuk memberi titik di setiap 3 angka
                var blng = sub; 
                var reverse = blng.toString().split('').reverse().join(''),
                rbn  = reverse.match(/\d{1,3}/g);
                rbn  = rbn.join('.').split('').reverse().join('');
                // akhir

                $('#Kerajang').append(
                    '<tr>'+
                     '<td><center>'+(i+1)+'</center></td>'+
                     '<td><center>'+response[i].br_nm+'</center></td>'+
                     '<td><center>'+response[i].Qty+'</center></td>'+
                     '<td><center>'+response[i].br_hrg+'</center></td>'+
                     '<td><center>'+rbn+'</center></td>'+
                     '<td><center><button onclick="KurangQty('+response[i].IdKeranjang+')" type="button" class="btn btn-warning"><i class="fas fa-minus"></i></button> <button onclick="TambahQty('+response[i].IdKeranjang+')" type="button" class="btn btn-success"><i class="fas fa-plus"></i></button> <button onclick="Hapus('+response[i]. IdKeranjang+')" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></center></td>'+
                   '</tr>'

                  );
                }

                // Untuk memberi titik di setiap 3 angka
                var bilangan = ttl; 
                var reverse = bilangan.toString().split('').reverse().join(''),
                ribuaan  = reverse.match(/\d{1,3}/g);
                ribuaan  = ribuaan.join('.').split('').reverse().join('');
                // akhir
                $('#Kerajang').append(
                  '<tr>'+
                      '<th colspan="4">Total</th>'+
                      '<th><center>'+ribuaan+'</center></th>'+
                   '</tr>'
                  );
                
                $('#KrFot').append(
                  '<tr>'+
                    '<td colspan="3"></td>'+
                    '<td colspan="3"><p><div align="right">'+
                      '<a href="<?php echo base_url('index.php/Controller_halProdukKami') ?>" class="btn btn-info btn-lg">&laquo; Continue Shopping</a> '+
                      '<a id="ChekOut" href="<?php echo base_url("index.php/controler_ChekOut?sub=") ?>'+ttl+'" class="btn btn-success btn-lg">Check Out &raquo</a>'+
                      '</div></p>'+
                    '</td>'+
                  '</tr>'
                );  
          }


       
      }
  });
}
</script>