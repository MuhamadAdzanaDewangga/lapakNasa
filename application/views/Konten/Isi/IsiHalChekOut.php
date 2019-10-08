<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.rajaongkir.com/starter/province?key=6b944647dae76b00311009c53f216913');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);

$provinsi = $result["rajaongkir"]["results"];
?>
<!-- start: Page Title -->
 <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><i class="ico-stats ico-white"></i>Checkout Keranjang</h2>

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
    <div class="table-responsive">
    <div class="title"><h3>Form Checkout</h3></div>
    <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
    <div class="hero-unit" id="Jml"></div> 
    <form id="Alamat_User">
      <div id="almt">
          <hr>
          <div class="form-inline" id="col_Nama_Penerima">
            <label for="Nama_Penerima">Nama Penerima</label>
            <input name="Nama_Penerima" type="text" class="required" id="Nama_Penerima" style="float: right; margin-right: 45%; " />           
          </div>
          <hr>
          <div class="form-inline" id="col_Provinsi">
            <label for="Provinsi">Provinsi</label>
            <select  name="Provinsi" class="required" id="Provinsi" style="float: right; margin-right: 45%;">
              <?php foreach ($provinsi as $provinsi): ?>
              <option id='<?php echo $provinsi["province_id"]?>'><?php echo $provinsi["province"]?></option>  
              <?php endforeach ?>
              

            </select>         
          </div>
          
          <hr>
          <div class="form-inline" id="col_Kota">
            <label for="Kota">Kota</label>
            <input name="Kota" type="text" class="required" id="Kota" style="float: right; margin-right: 45%;" />         
          </div>
          <hr>
          <div class="form-inline" id="col_Alamat">
            <label for="Alamat">Alamat</label>
            <input name="Alamat" type="text" class="required" id="Alamat" style="float: right; margin-right: 45%;" />          
          </div>
          <hr>
          <div class="form-inline" id="col_Kode_Pos">
            <label for="Kode_Pos">Kode Pos</label>
            <input name="Kode_Pos" type="text" class="required number" id="Kode_Pos" style="float: right; margin-right: 45%;" />          
          </div>
          <hr>
        
          <div class="form-inline" id="col_No_Telepon">
            <label for="No_Telepon">No telepon/ WA</label>
            <input name="No_Telepon" type="text" class="required number"  id="No_Telepon" style="float: right; margin-right: 45%;" />         
          </div>
          <hr>
          <div style="float: right; margin-right: 45%;">
            <button type="button" onclick="SimpanAlamat()" class="btn btn-sm btn-primary">Selanjutnya</button> 
            <a href="<?php echo base_url('index.php/Controller_keranjang') ?>" class="btn btn-sm btn-primary">Kembali</a>
          </div>
      </div>
      <div id="trnf">
          <hr>
          <div class="form-inline" id="kol_No_Rekening">
            <label for="No_Rekening">No Rekening</label>
            <input name="No_Rekening" type="text" class="diisi"  id="No_Rekening" style="float: right; margin-right: 45%; " />           
          </div>
          <hr>
          <div class="form-inline" id="kol_Nama_Bank">
            <label for="Nama_Bank">Nama Bank</label>
            <input name="Nama_Bank" type="text" class="diisi"  id="Nama_Bank" style="float: right; margin-right: 45%; " />           
          </div>
          <hr>
          <div class="form-inline" id="kol_Bukti_Transfer">
             <label for="Bukti_Transfer">Masukan Foto Bukti Transfer</label>
            <input name="Bukti_Transfer" type="file" class="diisi"  id="Bukti_Transfer" style="float: right; margin-right: 36%; " />           
          </div>
          <div class="panel-footer" id="sec-gambar" style="display: none;">
            <center>
              <img id="gambar_bukti" src="" class="img-thumbnail" style="background-color: transparent; width: 38%;">
            </center>
            <center>
              <input type="text" id="nama_gambar" name="nama_gambar" style="border: none;"> 
            </center>
                    
          </div>
          <hr>
          <div style="float: right; margin-right: 45%;">
            <button type="button" onclick="simpanRek()" class="btn btn-sm btn-primary">Selanjutnya</button> 
            <button type="button" onclick="beck()" class="btn btn-sm btn-primary">Kembali</button>
          </div>
      </div>
      
      <!-- <table class="table table-condensed">
      <input type="hidden" name="total" value="">
      <tr>
          <td><label for="nm_usr">Nama Lengkap</label></td>
          <td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" size="200" /></td>
        </tr>
        <tr>
          <td><label for="email_usr">Email</label></td>
          <td><input name="email_usr" type="text" class="email required" id="email_usr" /></td>
        </tr>
        <tr>
          <td><label for="almt_usr">Alamat</label></td>
          <td><input name="almt_usr" type="text" class="required" id="almt_usr" /></td>
        </tr>
        <tr>
          <td><label for="kp_usr">Kode Pos</label></td>
          <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" /></td>
        </tr>
        <tr>
          <td><label for="kota_usr">Kota</label></td>
          <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" /></td>
        </tr>
        <tr>
          <td><label for="Provinsi">Provinsi</label></td>
          <td><input name="Provinsi" type="text" class="required" minlength="6" id="Provinsi" /></td>
        </tr>
        <tr>
          <td><label for="tlp">No telepon/ WA</label></td>
          <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" /></td>
        </tr>
        <tr>
        <tr>
        <td></td>
          <td><button type="button" onclick="SimpanAlamat()" class="btn btn-sm btn-primary">Simpan Data</button> <a href="<?php echo base_url('index.php/Controller_keranjang') ?>" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
      </table> -->
    </form>
    </div>
        
      <!-- end: Table -->

    </div>
    <!-- end: Container -->
        
  </div>
  <!-- end: Wrapper  -->  

<!-- star Java script -->
<?php $this->load->view('script')?>
<script>
  $(document).ready(function(){
      $('#trnf').hide();
      var ttl = <?php echo $_GET['sub']; ?>;
      var bilangan = ttl; 
      var reverse = bilangan.toString().split('').reverse().join(''),
      ribuaan  = reverse.match(/\d{1,3}/g);
      ribuaan  = ribuaan.join('.').split('').reverse().join('');
      
      $('#Jml').text('Total Belanja Anda Rp.'+ribuaan+',-');

      $('.required').on('keydown', function(){
        var elm = $(this).prop('id'); 
        $('#warning_'+elm).remove();
      });

      // $.ajax({
      //   url : "https://api.rajaongkir.com/starter/province",
      //   type : "get",
      //   dataType: "xml",
      //   data: {'key' : "6b944647dae76b00311009c53f216913"},
      //   success:function(response){
      //     console.log(response);
      //   }
      // });
  })
  

  function SimpanAlamat() {
    
    col_wajib = document.getElementsByClassName('required');
    var elm = "";
      for (var i = 0; i < col_wajib.length; i++){
        elm = col_wajib[i].id;
        $('#warning_'+elm).remove();
          
        if ($('#'+elm).val() == '') {
          $('#col_'+elm).append(
            '<p id="warning_'+elm+'" style="margin-left: 15px; color:red; float: right; margin-right: 45%;">Kolom '+
            elm.replace('_',' ')+' Tidak boleh Kososng'+'</p>'
            );
        }
       
      };

      if ($('#Nama_Penerima').val() !== '' && $('#Alamat_Email').val() !== '' && $('#Alamat').val() !== '' && $('#Kode_Pos').val() !== '' && $('#Kota').val() !== '' && $('#Provinsi').val() !== '' && $('#No_Telepon').val() !== '' ) {
          
          $('#trnf').show();
          $('#almt').hide();
          $('#Jml').html('Silahkan Transfer Sejumlah Rp.'+ribuaan+',- Ke Rekening BRI No Rekening 12325435 Atas Nama Lusiyana.<br> <br>Pastikan Jumlah Yang Anda Kirim Benar. Jika Jumlah Yang Anda Masukan Salah Dapat Menggangu Proses Transaksi');
          
      }

    
  }

  $('#Bukti_Transfer').on('change', function(){

       var file_data = $('#Bukti_Transfer').prop('files')[0];
        var form_data = new FormData();
 
        form_data.append('file', file_data);
      $.ajax({
          url : "<?php echo base_url('index.php/uploadGambar') ?>",
          dataType: 'json',  // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success:function(data){
            $('#sec-gambar').show();
            $('#nama_gambar').val(data.nama);
            $('#gambar_bukti').prop("src", "<?php echo base_url('/aset/gambar/bukti/') ?>"+data.nama);

          }
      }); 
    })

  function simpanRek(){
    col_wajib = document.getElementsByClassName('diisi');
    var elm = "";
      for (var i = 0; i < col_wajib.length; i++){
        elm = col_wajib[i].id;
        $('#warning_'+elm).remove();
          
        if ($('#'+elm).val() == '') {
          $('#kol_'+elm).append(
            '<p id="warning_'+elm+'" style="margin-left: 15px; color:red; float: right; margin-right: 45%;">Kolom '+
            elm.replace('_',' ')+' Tidak boleh Kososng'+'</p>'
            );
        }
       
      };

      if ($('#No_Rekening').val() !== '' && $('#Nama_Bank').val() !== '' && $('#Bukti_Transfer').val() !== '') {
        $.ajax({
            url : "<?php echo base_url('index.php/BuatPesanan') ?>",
            type : "POST",
            data: $('#Alamat_User').serialize(),
            dataType: "JSON",
            success:function(){
              $('#trnf').hide();
              $('#almt').hide();
              $('#Jml').html('Terimakasih Sudah Berbelanja Dikami. <br> Untuk Info Selanjutnya Kami Akan Menghubungi Melalu No/Email Yang Telah Anda Berikan <br> Jika Ada Kesalahan atau Sebagainya Bisa Menghubungi Kami di <br> NO: 0858011001000 (Wa/Telegram/Phone) <br> email: Lusiyana@gmail.com');
            }
          })
      }
  }

      function beck(){
        $('#trnf').hide();
        $('#almt').show();
        $('#Jml').text('Total Belanja Anda Rp.'+ribuaan+',-');
      }
</script>






