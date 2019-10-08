<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="detail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
            </tr>  
          </thead>
          <tbody id="BrgPsn">
            
          </tbody>
          <tfoot id="fot">
            
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- end -->

<!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Pesanan</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
<!-- end: Page Title -->
			
<!--start: Wrapper-->
  <div id="wrapper">
        
    <!-- start: Container -->
    <div class="container">
      <div class="row" id="konten">
            
      </div>
      <!-- start: Table -->
      
        
      <!-- end: Table -->

    </div>
    <!-- end: Container -->
        
  </div>
  <!-- end: Wrapper  -->   

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
$(document).ready(function(){
  order();
})

function order(){
  $.ajax({
      url: "<?php echo base_url('index.php/TampilPesanan') ?>",
      type: "GET",
      dataType: "json",
      success: function(response){
        
        var status;
        var btn;
        $('#konten').html('');
        for (var i=0; i<response.length; i++) {

          if (response[i].StsPembelian == '1') {
            status = 'di Proses';
            btn = 'Kirim';
          } else if(response[i].StsPembelian == '2'){
            status = 'di Kirim';
            btn = 'Diterima';
          } else {
            status = 'Selesai';
            btn = 'hapus';
          }

          $('#konten').append(
            '<div class="span4" style="width: 18rem;" >'+
              '<img style="height: 200px;" src="<?= base_url('aset/gambar/bukti/')?>'+response[i].Bukti_Transfer+'" class="card-img-top" >'+
              '<div class="card-body">'+
              '<h4 class="card-title"><center>Pesanan '+response[i].UserName+'</center></h4>'+
              '<table style="margin-top: 10px;">'+
                '<tr>'+
                  '<td align=left valign=top style="width: 100px;">Nama Penerima</td>'+
                  '<td valign=top>:</td>'+
                  '<td align=left valign=top>'+response[i].nama_penerima+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td align=left valign=top>Alamat</td>'+
                  '<td valign=top>:</td>'+
                  '<td>'+response[i].alamat+' '+response[i].kp_pem+' '+response[i].kota_pem+' '+response[i].provinsi+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td align=left valign=top>No Telepon</td>'+
                  '<td valign=top>:</td>'+
                  '<td>'+response[i].telepon+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td align=left valign=top>Email</td>'+
                  '<td valign=top>:</td>'+
                  '<td>'+response[i].Email+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td align=left valign=top>No Rek</td>'+
                  '<td valign=top>:</td>'+
                  '<td>'+response[i].norek_pem+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td align=left valign=top>Bank</td>'+
                  '<td valign=top>:</td>'+
                  '<td>'+response[i].bank_pem+'</td>'+
                '</tr>'+
                '<tr>'+
                  '<td align=left valign=top>Status</td>'+
                  '<td valign=top>:</td>'+
                  '<td>'+status+'</td>'+
                '</tr>'+
              '</table>'+
              '<button data-toggle="modal" data-target="#detail" class="btn btn-primary" onclick="TampilPsn('+response[i].IdUser+')">Detail Pesanan</button> '+
              '<button id="'+response[i].IdUser+'" class="btn btn-danger aks" onclick="Aksi('+response[i].IdUser+')">'+btn+'</button>'+
              '</div>'+
            '</div>'
          );  
        }
        

      }
  })
}

function TampilPsn(id){
  $.ajax({
      url: "<?php echo base_url('index.php/TampilBrgPsn/') ?>"+id,
      type: "GET",
      dataType: "json",
      success: function(response){
        
        var sub;
        var ttl = 0;
        $('#BrgPsn').html('');
        for (var i=0; i<response.length; i++){
          sub = response[i].Qty * response[i].br_hrg;
          $('#BrgPsn').append(
              '<tr>'+
                  '<td align="center">'+(i+1)+'</td>'+
                  '<td>'+response[i].br_nm+'</td>'+
                  '<td align="center">'+response[i].Qty+'</td>'+
                  '<td align="center">'+sub+'</td>'+

              '</tr>'
            );
          
          ttl += sub;

          var blng = ttl; 
          var reverse = blng.toString().split('').reverse().join(''),
          rbn  = reverse.match(/\d{1,3}/g);
          rbn  = rbn.join('.').split('').reverse().join('');

          $('#fot').html('');
          $('#fot').append(
              '<tr>'+
                  '<td colspan="3">Total</td>'+
                  '<td align="center">Rp.'+rbn+',-</td>'+

              '</tr>'
            );
        }
      }
  })
}

function Aksi(id){
    $.ajax({
        url : "<?php echo base_url('index.php/UbahStsPmb/') ?>"+id,
        type : "POST",
        dataType: "JSON",
        success:function(){
          order();
       }
      });
}
</script>