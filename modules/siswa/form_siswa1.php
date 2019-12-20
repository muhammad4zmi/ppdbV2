<?php
   if (!isset($_SESSION['admin-username']))
    header("location:../../login.php");
   include "konek.php";
    $today = date("Ymd");
    // cari id transaksi terakhir yang berawalan tanggal hari ini
    $query = "SELECT max(no_daftar) AS last FROM tbl_siswa WHERE no_daftar";
    $hasil = mysqli_query($link,$query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];

    // baca nomor urut transaksi dari id transaksi terakhir
    $lastNoUrut = substr($lastNoTransaksi, 13, 3); 

    // nomor urut ditambah 1
    $nextNoUrut = $lastNoUrut + 1;

    // membuat format nomor transaksi berikutnya
    $nextNoTransaksi ='PPDB/PPSZNW/MA.Mn/'.sprintf('%03s', $nextNoUrut);

            
                                    
                                
   ?>
   <!-- <link rel="stylesheet" href="../css/datepicker/datepicker3.css">
   <style>
    .datepicker{z-index:1151;}
   </style>
   <script type="text/javascript">
    $(function(){
        $("#tanggal").datepicker({
            dateFormat : "dd/mm/yy",

            changeMonth : true,
            changeYear : true
        });
    });


   </script> -->

   <script>
    $(document).ready(function () {

         $("#seri").hide();
        // $("#ketTotal").hide();
        $("#kps").change(function(){
            // var tgl1 = $("#tgl1").val();
            // var jmlPembayaran = $("#jmlPembayaran").val();
            var kps =$("#kps").val();
            if (kps == "Ya") {
                $("#seri").show(0);
            }else{
                $("#seri").hide(0);

            }
        });
        });
                    // $("#ketTotal").show(0);
                    // $("#jmlBayar").val(jmlPembayaran);
                    // $("#jmlDenda").val(0);
                    </script>
<link rel="stylesheet" type="text/css" href="js/sweetalert/sweet-alert.css">
        <script type="text/javascript" src="js/sweetalert/sweet-alert.min.js"></script>
        <script type="text/javascript">
  $(document).ready(function(){
    //semua element dengan class text-warning akan di sembunyikan saat load
    $('.text-warning').hide();
    //untuk mengecek bahwa semua textbox tidak boleh kosong
    $('input').each(function(){ 
      $(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
        if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
          return get_error_text(this); //function get_error_text ada di bawah
        } else {
          $(this).removeClass('no-valid'); 
          $(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
          $(this).closest('div').removeClass('has-warning');
          $(this).closest('div').addClass('has-success');
          $(this).parent().find('.form-control-feedback').removeClass('fa fa-warning');
          $(this).parent().find('.form-control-feedback').addClass('fa fa-check');
        }
      });
    });
    //cek NIK
     $('#nik').blur(function(){
      var nik=$(this).val();
      var len=hp.length;
      if (len>0 && len<=1){
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("NIK Terlalu Pendek");
        return apply_feedback_error(this);
      } else {
        if(!valid_nik(nik)){
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("NIK Harus Angka Semua..!!");
          return apply_feedback_error(this);
        } else {
          if (len >15){
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("NIK terlalu Panjang");
            return apply_feedback_error(this);
          }
        }
      }
    });
     //cek nisn
     $('#nisn').blur(function(){
      var nisn=$(this).val();
      var len=nisn.length;
      if (len>0 && len<=1){
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("NISN Terlalu Pendek");
        return apply_feedback_error(this);
      } else {
        if(!valid_nik(nisn)){
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("NISN Harus Angka Semua..!!");
          return apply_feedback_error(this);
        } else {
          if (len >15){
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("NISN terlalu Panjang");
            return apply_feedback_error(this);
          }
        }
      }
    });
    
    //mengecek textbox Nama Valid Atau Tidak
    $('#nama').blur(function(){
      var nama= $(this).val();
      var len= nama.length;
      if(len>0){ //jika ada isinya
        if(!valid_nama(nama)){ //jika nama tidak valid
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Nama Tidak Valid");
          return apply_feedback_error(this);
        } else {
          if (len>30){ //jika karakter >30
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
            return apply_feedback_error(this);
          }
        }
      } 
    });
    //cek tempat lahir
     $('#tempat').blur(function(){
      var tempat= $(this).val();
      var len= tempat.length;
      if(len>0){ //jika ada isinya
        if(!valid_nama(tempat)){ //jika nama tidak valid
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Tempat Tidak Valid");
          return apply_feedback_error(this);
        } else {
          if (len>30){ //jika karakter >30
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
            return apply_feedback_error(this);
          }
        }
      } 
    });
    //cek sekolah
    $('#sekolah').blur(function(){
      var sekolah= $(this).val();
      var len= sekolah.length;
      if(len>0){ //jika ada isinya
        if(!valid_nama(sekolah)){ //jika nama tidak valid
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Nama Sekolah Tidak Valid");
          return apply_feedback_error(this);
        } else {
          if (len>50){ //jika karakter >30
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 50");
            return apply_feedback_error(this);
          }
        }
      } 
    });
    //cek ayah
    $('#ayah').blur(function(){
      var ayah= $(this).val();
      var len= ayah.length;
      if(len>0){ //jika ada isinya
        if(!valid_nama(ayah)){ //jika nama tidak valid
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Nama Tidak Valid");
          return apply_feedback_error(this);
        } else {
          if (len>30){ //jika karakter >30
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
            return apply_feedback_error(this);
          }
        }
      } 
    });
    //cek ibu
    $('#ibu').blur(function(){
      var ibu= $(this).val();
      var len= ibu.length;
      if(len>0){ //jika ada isinya
        if(!valid_nama(ibu)){ //jika nama tidak valid
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Nama Tidak Valid");
          return apply_feedback_error(this);
        } else {
          if (len>30){ //jika karakter >30
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
            return apply_feedback_error(this);
          }
        }
      } 
    });
    //Mengecek textbox tanggal lahir
    $('#single_cal3').blur(function(){
      var tgl= $(this).val();
      var len= tgl.length;
      if(len>0){
        if(!valid_tanggal(tgl)){
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Format Tanggal yang diperbolehkan mm-dd-yyy, mm/dd/yyyy atau dd/mm/yyyy, dd-mm-yyyy");
          return apply_feedback_error(this);
        }
      }
    });
    //mengecek text box email
    $('#no_Daftar').blur(function(){
      var no_Daftar= $(this).val();
      var len= no_Daftar.length;
      if(len>0){ 
        if(!valid_daftar(no_Daftar)){ 
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("No Pendaftaran Tidak Valid (ex: M/LTM/VI/2017/001)");
          return apply_feedback_error(this);
        } else {
          if (len>30){ 
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
            return apply_feedback_error(this);
          } else {
            var valid = false;
            $.ajax({
                                       url: "index.php?admin=check-daftar",
                                       type: "POST",
                                       data: "no_Daftar=" + no_daftar,
                                       dataType: "text",
                                       success: function(data){
                                               if (data==0){ //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                         $('#no_Daftar').parent().find('.text-warning').text("");
                   $('#no_Daftar').parent().find('.text-warning').text("No Pendaftaran ini sudah ada");
                   return apply_feedback_error('#no_daftar');
                                               }
                                                 }
              });
            }
        }
      } 
    });
    //mengecek password
    $('#password').blur(function(){
      var password=$(this).val();
      var len=password.length;
      if (len>0 && len<8) {
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("password minimal 8 karakter");
        return apply_feedback_error(this);
      } else {
        if(len>35) {
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("password maximal 35 karakter");
          return apply_feedback_error(this);
        }
      }
    });
    //mengecek konfirmasi password
    $('#conf_password').blur(function(){
      var pass = $("#password").val();
      var conf=$(this).val();
      var len=conf.length;
      if (len>0 && pass!==conf) {
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("Konfirmasi Password tidak sama dengan password");
        return apply_feedback_error(this);
      }
    });

    //mengecek nomer hp
    $('#hp').blur(function(){
      var hp=$(this).val();
      var len=hp.length;
      if (len>0 && len<=10){
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("Nomer HP terlalu pendek");
        return apply_feedback_error(this);
      } else {
        if(!valid_hp(hp)){
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Format nomer hp tidak sah.(ex: +6281918405331)");
          return apply_feedback_error(this);
        } else {
          if (len >13){
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Nomer HP terlalu Panjang");
            return apply_feedback_error(this);
          }
        }
      }
    });

    //submit form validasi
    $('#formInput').submit(function(e){
      e.preventDefault();
      var valid=true;   
      $(this).find('.textbox').each(function(){
        if (! $(this).val()){
          get_error_text(this);
          valid = false;
          $('html,body').animate({scrollTop: 0},"slow");
        } 
        if ($(this).hasClass('no-valid')){
          valid = false;
          $('html,body').animate({scrollTop: 0},"slow");
        }
      });
      if (valid){
        swal({
                            title: "Konfirmasi Simpan Data",
                            text: "Data Akan di Simpan Ke Database",
                            type: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#1da1f2",
                            confirmButtonText: "Yakin",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                  }, function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
                    $.ajax({
                        url: "index.php?admin=add_siswa",
                        type: "POST",
                        data: $('#formInput').serialize(), //serialize() untuk mengambil semua data di dalam form
                        dataType: "html",
                        success: function(){                
                              setTimeout(function(){
                                swal({
                                  title:"Data Berhasil Disimpan",
                                  text: "Terimakasih",
                                  type: "success"
                                }, function(){
                                  window.location="index.php?admin=dt_siswa";
                                });
                              }, 2000);
                            },
                        error: function (xhr, ajaxOptions, thrownError) {
                            setTimeout(function(){
                                swal("Error", "Tolong Cek Koneksi Lalu Ulangi", "error");
                              }, 2000);}
        });
              });
        }
    });
  });

  //fungsi cek nama
  function valid_nama(nama) {
    var pola= new RegExp(/^[a-z A-Z]+$/);
    return pola.test(nama);
  }
  //fungsi cek tanggal lahir
  function valid_tanggal(tanggal){
    var pola= new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
    return pola.test(tanggal);
  }
  //fungsi cek email
  function valid_daftar(no_Daftar){
    var pola= new RegExp(/^[a-z A-Z]+[\/-]+[a-z A-Z]+[\/-]+[a-z A-Z]+[\/-]+[0-9-+]+[\/-]+[0-9-+]+$/);
    return pola.test(no_daftar);
  }
  //fungsi cek phone 
  function valid_hp(hp){
    var pola = new RegExp(/^[0-9-+]+$/);
    return pola.test(hp);
  }
  function valid_nik(nik){
    var pola = new RegExp(/^[0-9-+]+$/);
    return pola.test(nik);
  }
  //menerapkan gaya validasi form bootstrap saat terjadi eror
  function apply_feedback_error(textbox){
    $(textbox).addClass('no-valid'); //menambah class no valid
    $(textbox).parent().find('.text-warning').show();
    $(textbox).closest('div').removeClass('has-success');
    $(textbox).closest('div').addClass('has-warning');
    $(textbox).parent().find('.form-control-feedback').removeClass('fa fa-check');
    $(textbox).parent().find('.form-control-feedback').addClass('fa fa-warning');
  }

  //untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
  function get_error_text(textbox){
    $(textbox).parent().find('.text-warning').text("");
    $(textbox).parent().find('.text-warning').text("Text Box Ini Tidak Boleh Kosong");
    return apply_feedback_error(textbox);
  }
</script>

   <!--<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>-->
   <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                   
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong><big>Form Pendaftaran Peserta Didik Baru</big></strong></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                   
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <!-- Smart Wizard -->
                 <form class="form-horizontal form-label-left"  id="formInput">
                  <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                      <li>
                        <a href="#step-1">
                          <span class="step_no"><i class="fa fa-user"></i></span>
                          <span class="step_descr">
                                            <b>Data Pribadi</b>
                                        </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-2">
                          <span class="step_no"><i class="fa fa-home"></i></span>
                          <span class="step_descr">
                                            <b>Sekolah/Madrasah Asal</b>
                                        </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-3">
                          <span class="step_no"><i class="fa fa-users"></i></span>
                          <span class="step_descr">
                                            <b>Data Orang Tua</b>
                                        </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-4">
                          <span class="step_no"><i class="fa fa-male"></i></span>
                          <span class="step_descr">
                                            <b>Data Wali</b>
                                        </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-5">
                          <span class="step_no"><i class="fa fa-check"></i></span>
                          <span class="step_descr">
                                            <b>Selesai</b>
                                        </span>
                        </a>
                      </li>
                    </ul>
                    
                    <div id="step-1">
                    <h2 class="StepTitle">LENGKAPI IDENTITAS PRIBADI</h2>
                    <span><font color="Red">* Data Wajib di isi, tidak boleh kosong..!</font></span>
                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Pendaftaran*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="no_daftar" id="no_Daftar" required="required" value="<?php echo $nextNoTransaksi?>">
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">NIK*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nis" id="nik" placeholder="NIK">
                                                     <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">NISN*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN" required>
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Lengkap*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_lengkap" id="nama" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Nama Lengkap" required="required">
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tempat Lahir*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="tempat" name="t_lahir" placeholder="Tempat Lahir" required>
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tanggal Lahir*</label>
                                                <div class="col-sm-9">
                              <input type="text" class="form-control" id="single_cal3" aria-describedby="inputSuccess2Status" placeholder="dd/mm/yyyy" name="tgl_lahir">
                              <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                              
                          </div>
                        </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-9">
                                                    <select name ="jk" class="form-control" required>
                                                        <option>Pilih Kelamin</option>
                                                        <option value="L">L</option>
                                                        <option value="P">P</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Agama</label>
                                                <div class="col-sm-9">
                                                    <select name ="agama" class="form-control" required>
                                                        <option>Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kebutuhan Khusus</label>
                                                <div class="col-sm-9">
                                                    <select name ="khusus" class="form-control" required>
                                                        <option>Pilih:</option>
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Anak Ke</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="anak" class="form-control" id="input-text" placeholder="Anak Ke" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Jumlah Saudara</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="saudara" class="form-control" id="input-text" placeholder="Saudara" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">KPS</label>
                                                <div class="col-sm-9">
                                                    <select name ="kps" id="kps" class="form-control">
                                                        <option>Pilih:</option>
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="seri">
                                                <label for="input-text" class="col-sm-3 control-label">No Seri KPS</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="seri" class="form-control" id="input-text" placeholder="Seri KPS">
                                                </div>
                                            </div>
                                            
                                
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat*</label>
                                                <div class="col-sm-9">
                                                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Provinsi*</label>
                                                <div class="col-sm-9">
                                                    <script type="text/javascript" src="modules/siswa/custom.js"></script>
                                                    <select  name="provinsi" class="form-control provinsi" id="provinsi">
                                                        <?php
                                                        $prov = $db->query("SELECT * FROM tbl_provinsi");
                                                        echo'<option>Pilih Provinsi</option>';
                                                        while ($dataprov = $prov->fetch(PDO::FETCH_ASSOC)) {
                                                            echo'<option value="'.$dataprov['id'].'">'.$dataprov['nama_prov'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kabupaten/Kota*</label>
                                                <div class="col-sm-9">
                                                    <select  name="kota" class="form-control kota" id="kota">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kecamatan*</label>
                                                <div class="col-sm-9">
                                                    <select name="kecamatan" class="form-control kecamatan" id="kecamatan">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kelurahan/Desa*</label>
                                                <div class="col-sm-9">
                                                    <select name="kelurahan" class="form-control kelurahan" id="kelurahan">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alat Transportasi</label>
                                                <div class="col-sm-9">
                                                    <select name ="trans"  class="form-control">
                                                        <option>Pilih Transportasi</option>
                                                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                                                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                                                        <option value="Becak">Becak</option>
                                                        <option value="Sepeda">Sepeda</option>
                                                        <option value="Jalan Kaki">Jalan Kaki</option>
                                                        <option value="Lainnya..">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Tempat Tinggal</label>
                                                <div class="col-sm-9">
                                                    <select name ="tinggal"  class="form-control">
                                                        <option>Pilih:</option>
                                                        <option value="Rumah">Rumah</option>
                                                        <option value="Asrama">Asrama</option>
                                                        <option value="Kosan">Kosan</option>
                                                        
                                                        <option value="Lainnya..">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Jarak Tempuh</label>
                                                <div class="col-sm-9">
                                                    <select name ="jarak"  class="form-control">
                                                        <option>Pilih:</option>
                                                        <option value="< Dari 1 KM">Kurang dari 1 KM</option>
                                                        <option value="> Dari 1 KM">Lebih dari 1 KM</option>
                                                        
                                                        
                                                        <option value="Lainnya..">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Telpon*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="no_telpon" id="hp" placeholder="No Telpon">
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="email" placeholder="Email (example@mail.com)">
                                                    
                                                </div>
                                            </div>
                                            
                                            

                                        </div>
                                    </div>
                      

                       

                      

                    </div>
                    <div id="step-2">
                      <h2 class="StepTitle">DATA SEKOLAH/MADRASAH ASAL</h2>
                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Asal Sekolah/Madrasah*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Sekolah Asal" required>
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat Sekolah*</label>
                                                <div class="col-sm-9">
                                                    <textarea name="alamat_sekolah" class="form-control" rows="3" placeholder="Alamat" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No. Peserta Ujian SMP/MTs</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="input-text" name="no_ujian" placeholder="No Ujian" required>
                                                </div>
                                            </div>
                                           

                                            
                                            
                                            
                                        </div>


                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nilai Rata-Rata UN</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nilai_un" id="input-text" placeholder="Nilai UN" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nilai Rata-Rata US</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nilai_us" id="input-text" placeholder="Nilai US" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Seri Ijazah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="seri_ijazah" id="input-text" placeholder="Seri Ijazah">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Seri SKHUN</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="seri_skhun" id="input-text" placeholder="Seri SKHUN">
                                                </div>
                                            </div>

                                           
                                    </div>
                    </div>
                    </div>
                    <div id="step-3">
                      <h2 class="StepTitle">DATA ORANG TUA</h2>
                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Ayah*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="ayah" name="nama_ayah" placeholder="Nama Ayah" required>
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tahun Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="thn_ayah" id="input-text" placeholder="Tahun Lahir" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pekerjaan Ayah</label>
                                                <div class="col-sm-9">
                                                    <select name ="kerja_ayah"  class="form-control" required>
                                                        <option>Pilih Pekerjaan..</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Guru Honor">Guru Honor</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pendidikan Ayah</label>
                                                <div class="col-sm-9">
                                                    <select name ="p_ayah" class="form-control">
                                                        <option>Pilih Pendidikan Ayah</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Penghasilan Ayah</label>
                                                <div class="col-sm-9">
                                                    <select name ="hasil_ayah"  class="form-control">
                                                        <option>Pilih Penghasilan Ayah</option>
                                                        <option value="Lebih 5 Juta">Lebih 5 Juta</option>
                                                        <option value="Kurang 5 Juta">Kurang 5 Juta</option>
                                                        <option value="Lebih 1 Juta">Lebih 1 Juta</option>
                                                        <option value="Kurang 1 Juta">Kurang 1 Juta</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat Ayah*</label>
                                                <div class="col-sm-9">
                                                    <textarea name="alamat_ayah" class="form-control" rows="3" placeholder="Alamat Ayah" required></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Ibu*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nama_ibu" id="ibu" placeholder="Nama Ibu" required>
                                                    <i class="form-control-feedback"></i>
                                                    <span class="text-warning" ></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tahun Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="thn_ibu" id="input-text" placeholder="Tahun Lahir">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pekerjaan Ibu</label>
                                                <div class="col-sm-9">
                                                    <select name ="kerja_ibu"  class="form-control">
                                                        <option>Pilih Pekerjaan..</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="IRT">IRT</option>
                                                         <option value="Guru Honor">Guru Honor</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pendidikan Ibu</label>
                                                <div class="col-sm-9">
                                                    <select name ="p_ibu"  class="form-control">
                                                        <option>Pilih Pendidikan Ibu</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Penghasilan Ibu</label>
                                                <div class="col-sm-9">
                                                    <select name ="hasil_ibu"  class="form-control">
                                                        <option>Pilih Penghasilan Ibu</option>
                                                        <option value="Lebih 5 Juta">Lebih 5 Juta</option>
                                                        <option value="Kurang 5 Juta">Kurang 5 Juta</option>
                                                        <option value="Lebih 1 Juta">Lebih 1 Juta</option>
                                                        <option value="Kurang 1 Juta">Kurang 1 Juta</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat Ibu*</label>
                                                <div class="col-sm-9">
                                                    <textarea name="alamat_ibu" class="form-control" rows="3" placeholder="Alamat Ibu" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>

                    <div id="step-4">
                      <h2 class="StepTitle">LEWATI JIKA ORTU SEKALIGUS WALI</h2>
                      <div class="row">
                                        <div class="col-sm-12">


                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Nama Wali</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="input-text" name="nama_wali" placeholder="Nama Wali" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Tahun Lahir</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="thn_wali" id="input-text" placeholder="Tahun Lahir Wali">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Pekerjaan Ayah</label>
                                                <div class="col-sm-10">
                                                    <select name ="kerja_wali"  class="form-control" required>
                                                        <option>Pilih Pekerjaan..</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                         <option value="Guru Honor">Guru Honor</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Pendidikan Wali</label>
                                                <div class="col-sm-10">
                                                    <select name ="p_wali"  class="form-control">
                                                        <option>Pilih Pendidikan Wali</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Penghasilan Wali</label>
                                                <div class="col-sm-10">
                                                    <select name ="hasil_wali"  class="form-control">
                                                        <option>Pilih Penghasilan Ayah</option>
                                                        <option value="Lebih 5 Juta">Lebih 5 Juta</option>
                                                        <option value="Kurang 5 Juta">Kurang 5 Juta</option>
                                                        <option value="Lebih 1 Juta">Lebih 1 Juta</option>
                                                        <option value="Kurang 1 Juta">Kurang 1 Juta</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Alamat Wali</label>
                                                <div class="col-sm-10">
                                                    <textarea name="alamat_wali" class="form-control" rows="3" placeholder="Alamat Wali" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <label for="input-text" class="col-sm-2 control-label">No Wali</label>
                                                <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_wali" placeholder="No Wali">
                                            </div>
                                            </div>
                                        </div>


                                        
                                    </div>
                    </div>

                    <div id="step-5">
                      <span>JIKA SEMUA ISIAN SUDAH DILENGKAPI SEILAHKAN SIMPAN</span>
                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tinggi Badan (CM)</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="tinggi" class="form-control" id="input-text" placeholder="Tinggi Badan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Berat Badan (Kg)</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="berat" id="input-text" placeholder="Berat Badan" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Hobi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="hobi" class="form-control" id="input-text" placeholder="Hobi" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="notes">
                                                <h3><strong>Kelengkapan</strong> Berkas</h3>
                                                <small><span>*Centang Berkas Yang Lengkap</span></small><br>
                                                
                                                <div class="form-group">
                                                 <label>
                  <input type="checkbox" class="flat"  name="syarat[]" value="Uang Pendaftaran Rp 50.000">
                  Uang Pendaftaran Rp 50.000
                </label><br>
                <label>
                  <input type="checkbox" class="flat"  name="syarat[]" value="Copy Kartu Keluarga">
                  Poto Copy Kartu Keluarga
                </label><br>
                <label>
                  <input type="checkbox" class="flat"  name="syarat[]" value="Copy Akta Lahir">
                  Poto Copy Akta Kelahiran
                </label><br>
                <label>
                  <input type="checkbox" class="flat"  name="syarat[]" value="Copy Ijazah">
                  Poto Copy Ijazah
                </label><br>
                <label>
                  <input type="checkbox" class="flat"  name="syarat[]" value="Copy SKHUN">
                  Poto Copy SKHUN
                </label><br>
                <label>
                  <input type="checkbox" class="flat"  name="syarat[]" value="Uang MATSAMA Rp 25.000">
                  Uang MATSAMA Rp 25.000
                </label><br>
                
              </div>
                    </div>


                  </div>

                  <!-- <div class="modal-footer">
                                    <button type="submit" name="btn-simpan" class="btn btn-primary btn-block">Simpan</button>
                                </div> -->
                  <!--</form-->
                  <!-- End SmartWizard Content -->

 



                  

                  <!-- End SmartWizard Content -->


                </div>
              </div>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>

        

<!-- ============================================================== -->
<!-- End content here -->
<!-- ============================================================== -->

<!-- End of page -->
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<script>
    var resizefunc = [];

</script>
<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<!-- <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- daterangepicker --> 
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
   
  <!-- input mask -->
  <script src="js/input_mask/jquery.inputmask.js"></script>
  <!-- knob -->
  <script src="js/knob/jquery.knob.min.js"></script>
  <!-- range slider -->
  <script src="js/ion_range/ion.rangeSlider.min.js"></script>
  <!-- color picker -->
  <script src="js/colorpicker/bootstrap-colorpicker.min.js"></script>
  <script src="js/colorpicker/docs.js"></script>

  <!-- image cropping -->
  <script src="js/cropping/cropper.min.js"></script>
  <script src="js/cropping/main2.js"></script>
  <!-- <script src="js/validator/validator.js"></script>
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script> -->
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- form validation -->
  
  <!-- pace -->
 <!--  <script src="js/pace/pace.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
      // Smart Wizard
      $('#wizard').smartWizard();

      function onFinishCallback() {
        $('#wizard').smartWizard('showMessage', 'Finish Clicked');
        //alert('Finish Clicked');
      }
    });

    $(document).ready(function() {
      // Smart Wizard
      $('#wizard_verticle').smartWizard({
        transitionEffect: 'slide'
      });

    });
  </script>
 
   <script type="text/javascript">
    $(document).ready(function() {
     
      $('#single_cal3').daterangepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        singleDatePicker: true,
        calender_style: "picker_3"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    
    });
  </script>
<script type="text/javascript" src="js/notify/pnotify.core.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>

  <script>
    $(function() {
      var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
      TabbedNotification = function(options) {
        var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
          "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

        if (document.getElementById('custom_notifications') == null) {
          alert('doesnt exists');
        } else {
          $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
          $('#custom_notifications #notif-group').append(message);
          cnt++;
          CustomTabs(options);
        }
      }

      CustomTabs = function(options) {
        $('.tabbed_notifications > div').hide();
        $('.tabbed_notifications > div:first-of-type').show();
        $('#custom_notifications').removeClass('dsp_none');
        $('.notifications a').click(function(e) {
          e.preventDefault();
          var $this = $(this),
            tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
          others.removeClass('active');
          $this.addClass('active');
          $(tabbed_notifications).children('div').hide();
          $(target).show();
        });
      }

      CustomTabs();

      var tabid = idname = '';
      $(document).on('click', '.notification_close', function(e) {
        idname = $(this).parent().parent().attr("id");
        tabid = idname.substr(-2);
        $('#ntf' + tabid).remove();
        $('#ntlink' + tabid).parent().remove();
        $('.notifications a').first().addClass('active');
        $('#notif-group div').first().css('display', 'block');
      });
    })
  </script>
  <script type="text/javascript">
    var permanotice, tooltip, _alert;
    $(function() {
      new PNotify({
        title: "Perhatian..!!",
        type: "dark",
        text: "Silahkan Melakukan Pengisian Data Siswa Baru dan Mohon Teliti..!!",
        nonblock: {
          nonblock: true
        },
        before_close: function(PNotify) {
          // You can access the notice's options with this. It is read only.
          //PNotify.options.text;

          // You can change the notice's options after the timer like this:
          PNotify.update({
            title: PNotify.options.title + " - Enjoy your Stay",
            before_close: null
          });
          PNotify.queueRemove();
          return false;
        }
      });

    });
  </script>
  <script>
    $(document).ready(function() {
      $('.progress .bar').progressbar(); // bootstrap 2
      $('.progress .progress-bar').progressbar(); // bootstrap 3
    });
  </script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
