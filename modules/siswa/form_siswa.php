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
    $nextNoTransaksi ='M/LTM/V/2017/'.sprintf('%03s', $nextNoUrut);

            
                                    
                                
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
<script>
   $(document).ready(function() {
  
     
       $("#lewati").hide();
    
  
     $("#syarat").click(function() {
       $("#lewati").show();
     });
  
   });
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
                 <form class="form-horizontal form-label-left" method="POST" action="?admin=add_siswa" novalidate>
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
                    <span>* Data Wajib di isi, tidak boleh kosong..!</span>
                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Pendaftaran*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="no_daftar" id="" value="<?php echo $nextNoTransaksi;?>" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">NIS*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">NISN*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nisn" id="input-text" placeholder="NISN" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Lengkap*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_lengkap" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Nama Lengkap" required="required">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tempat Lahir*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="input-text" name="t_lahir" placeholder="Tempat Lahir" required>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tanggal Lahir*</label>
                                                <div class="col-sm-9">
                              <input type="text" class="form-control" id="single_cal3" placeholder="Tanggal Lahir" aria-describedby="inputSuccess2Status" name="tgl_lahir">
                              
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
                                                    <input type="text" class="form-control" name="no_telpon" id="input-text" placeholder="No Telpon">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="email" id="input-text" placeholder="Email (example@mail.com)">
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
                                                    <input type="text" class="form-control" id="input-text" name="sekolah" placeholder="Sekolah Asal" required>
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
                                                    <input type="text" class="form-control" id="input-text" name="nama_ayah" placeholder="Nama Ayah" required>
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
                                                    <input type="text" class="form-control" name="nama_ibu" id="input-text" placeholder="Nama Ibu" required>
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
                  <input type="checkbox" class="icheckbox_flat-green" name="syarat[]" value="Uang Pendaftaran Rp 35.000">
                  Uang Pendaftaran Rp 35.000
                </label><br>
                <label>
                  <input type="checkbox" class="icheckbox_flat-green" name="syarat[]" value="Copy Kartu Keluarga">
                  Poto Copy Kartu Keluarga
                </label><br>
                <label>
                  <input type="checkbox" class="icheckbox_flat-green" name="syarat[]" value="Copy Akta Lahir">
                  Poto Copy Akta Kelahiran
                </label><br>
                <label>
                  <input type="checkbox" class="icheckbox_flat-green" name="syarat[]" value="Copy Ijazah">
                  Poto Copy Ijazah
                </label><br>
                <label>
                  <input type="checkbox" class="icheckbox_flat-green" name="syarat[]" value="Copy SKHUN">
                  Poto Copy SKHUN
                </label>
                
              </div>
                    </div>


                  </div>
                 <!--  <div class="modal-footer">
                                    <a href="?admin=dt_siswa"><button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i> Batal</button></a>
                                    <button type="submit" class="btn btn-primary btn-flat" name="tambah"><i class="fa fa-save fa-fw fa-lg"></i> Simpan Data</button>
                                </div> -->
                  </form>
                  <!-- End SmartWizard Content -->





                  

                  <!-- End SmartWizard Content -->


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
  <script src="js/validator/validator.js"></script>
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
  <script>
    // initialize the validator function
    validator.message['date'] = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
      .on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

    // bind the validation to the form submit event
    //$('#send').click('submit');//.prop('disabled', true);

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit)
        this.submit();
      return false;
    });

    /* FOR DEMO ONLY */
    $('#vfields').change(function() {
      $('form').toggleClass('mode2');
    }).prop('checked', false);

    $('#alerts').change(function() {
      validator.defaults.alerts = (this.checked) ? false : true;
      if (this.checked)
        $('form .alert').remove();
    }).prop('checked', false);
  </script>


   <script type="text/javascript">
    $(document).ready(function() {
      $('#single_cal1').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_1"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal2').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_3"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_4"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
