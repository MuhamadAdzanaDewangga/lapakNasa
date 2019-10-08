<!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Tambah Barang</h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
<!-- end: Page Title -->
			<div class="container">
        <form id="TmbBrng">
          <div id="Frm">
            <div class="form-inline" style="margin-top: 35px;">
            <label for="Nama_Barang">Nama Barang</label>
            <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang"  style="width: 63%; float: right;">
            </div>
            <div id="Kolom_Nama_Barang" style="float: left; margin-left: 36%;"></div>

            <div class="form-inline" style="margin-top: 35px;">
              <label for="Harga">Harga</label>
              <input type="text" class="form-control" id="Harga" name="Harga"  style="width: 63%; float: right;">
            </div>
            <div id="Kolom_Harga" style="float: left; margin-left: 36%;"></div>

            <div class="form-inline" style="margin-top: 35px;">
              <label for="Jumlah">Jumlah</label>
              <input type="text" class="form-control" id="Jumlah" name="Jumlah"  style="width: 63%; float: right;">
            </div>
            <div id="Kolom_Jumlah" style="float: left; margin-left: 36%;"></div>

            <div class="form-inline" style="margin-top: 35px;">
              <label for="Satuan">Satuan</label>
              <input type="text" class="form-control" id="Satuan" name="Satuan"  style="width: 63%; float: right;">
            </div>
            <div id="Kolom_Satuan" style="float: left; margin-left: 36%;"></div>

            <div class="form-inline" style="margin-top: 35px;">
              <label for="Deskripsi">Deskripsi Barang</label>
              <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="3" style="width: 63%; float: right;"></textarea>
            </div>
            <div id="Kolom_Deskripsi" style="float: left; margin-left: 36%;"></div>

            <div style="width: 64%; float: right; margin-top: 35px;">
              <button type="button" class="btn btn-success" onclick="validasi()">Selanjutnya</button>
              <button type="button" class="btn btn-danger" onclick="BersihkanForm()">Clear</button>
            </div>
          </div>
          
          <div id="Gmb">
            <div class="form-group">
                <label for="Gambar_Barang">Gambar Barang</label>
                <input type="file" class="form-control-file" id="Gambar_Barang" >
            </div>
            <div class="panel-footer" id="sec-gambar" style="display: none;">
              <center>
                <img id="gmb_barang" src="" class="img-thumbnail" style="background-color: transparent; width: 38%;">
              </center>
              <center>
                <input type="text" id="nama_gambar" name="nama_gambar" style="border: none; display: none"> 
              </center>
                      
            </div>
            <div style=" margin-top: 20px;">
              <button type="button" class="btn btn-success" onclick="simpan()">Simpan</button>
              <button type="button" class="btn btn-danger" onclick="Kembali()">Kembali</button>
            </div>
          </div>
          
        </form>
      </div>


<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
$(document).ready(function(){
  $('#Gmb').hide();

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

  
})


$('#Gambar_Barang').on('change', function(){
    var file_data = $('#Gambar_Barang').prop('files')[0];
    var form_data = new FormData();
 
    form_data.append('file', file_data);
      $.ajax({
          url : "<?php echo base_url('index.php/UploadGmbBarang') ?>",
          dataType: 'json',  // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success:function(data){

            $('#sec-gambar').show();
            $('#nama_gambar').val(data.nama);
            $('#gmb_barang').prop("src", "<?php echo base_url('/aset/gambar/') ?>"+data.nama);

          }
      }); 
})


function BersihkanForm(){
  $('.form-control').val('');
}

$('.form-control').on('keydown', function(){
    var elm = $(this).prop('id'); 
    $('#warning_'+elm).remove();
  });

function validasi(){
   col_wajib = document.getElementsByClassName('form-control');
    var elm = "";
      for (var i = 0; i < col_wajib.length; i++){
        elm = col_wajib[i].id;
        $('#warning_'+elm).remove();
          
        if ($('#'+elm).val() == '') {
          $('#Kolom_'+elm).append(
            '<p id="warning_'+elm+'" style=" color:red; ">Kolom '+
            elm.replace('_',' ')+' Tidak boleh Kosong'+'</p>'
            );
        }
       
      };

      if ($('#Nama_Barang').val() !== '' && $('#Harga').val() !== '' && $('#Jumlah').val() !== '' && $('#Satuan').val() !== '' && $('#Deskripsi').val() !== '') {
            $('#Gmb').show();
            $('#Frm').hide();
      }
}

    function Kembali(){
      $('#Gmb').hide();
      $('#Frm').show();
    }

function simpan(){
  if ($('#nama_gambar').val() !== '') {
      $.ajax({
          url : "<?php echo base_url('index.php/Tambah_Barang') ?>",
          type : "POST",
          data: $('#TmbBrng').serialize(),
          dataType: "JSON",
          success:function(){
            alert('Barang Berhasil Ditambahkan');
            location.href = "<?php echo base_url('index.php/Controller_halHome') ?>";
          }
        });
  } else {
    alert('Silahkan Masukan Gambar');
  }
}

</script>









