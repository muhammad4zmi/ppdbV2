<?php
//include "../../../config/config.php";
$no_daftar=$_GET['no_daftar'];

$sql_mapel = mysqli_query($link,"SELECT * from tbl_siswa where no_daftar='$no_daftar'");
$j = mysqli_fetch_array($sql_mapel);
include "konek.php";

?>

<link rel="stylesheet" href="../css/datepicker/datepicker3.css">
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


   </script>

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
   <!--<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>-->
   <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <!--  <h1>
            Raport Online SMPN 1 Mataram | 
            <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Dashboard</li>
        </ol> -->
    </section><br/>
    <section class="content">
        <!-- <h3 class="page-header"><i class="fa fa-users fa-fw fa-2x"></i> Halaman Form Data Siswa</h3> -->
        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4><strong><i class="fa fa-user-md  fa-fw fa-2x"></i> Form Ubah Data Peserta Didik Baru</strong></h4></div>
            <div class="row">
                <div class="col-md-12 portlets">
                    <!-- Your awesome content goes here -->
                    <div class="widget animated fadeInDown">
                        <form id="myWizard" class="form-horizontal" onSubmit="return validasi()" role="form" method="POST" action="?admin=add_siswa">
                            <section class="step" data-step-title="Identitas Siswa">
                                <div class="notes">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Pendaftaran</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="no_daftar" id="" value="<?php echo $j['no_daftar']?>" required readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">NIS</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">NISN</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nisn" id="input-text" placeholder="NISN" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Lengkap</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nama_lengkap" id="input-text" placeholder="Nama Lengkap" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tempat Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="input-text" name="t_lahir" placeholder="Tempat Lahir" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tanggal Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="tanggal" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-8">
                                                    <select name ="jk" class="form-control" required>
                                                        <option>Pilih Kelamin</option>
                                                        <option value="L">L</option>
                                                        <option value="P">P</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Agama</label>
                                                <div class="col-sm-8">
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
                                                <div class="col-sm-8">
                                                    <select name ="khusus" class="form-control" required>
                                                        <option>Pilih:</option>
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Anak Ke</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="anak" class="form-control" id="input-text" placeholder="Anak Ke" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Jumlah Saudara</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="saudara" class="form-control" id="input-text" placeholder="Saudara" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">KPS</label>
                                                <div class="col-sm-8">
                                                    <select name ="kps" id="kps" class="form-control">
                                                        <option>Pilih:</option>
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="seri">
                                                <label for="input-text" class="col-sm-3 control-label">No Seri KPS</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="seri" class="form-control" id="input-text" placeholder="Seri KPS">
                                                </div>
                                            </div>
                                            
                                
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Provinsi</label>
                                                <div class="col-sm-8">
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
                                                <label class="col-sm-3 control-label">Kabupaten/Kota</label>
                                                <div class="col-sm-8">
                                                    <select  name="kota" class="form-control kota" id="kota">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kecamatan</label>
                                                <div class="col-sm-8">
                                                    <select name="kecamatan" class="form-control kecamatan" id="kecamatan">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kelurahan/Desa</label>
                                                <div class="col-sm-8">
                                                    <select name="kelurahan" class="form-control kelurahan" id="kelurahan">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alat Transportasi</label>
                                                <div class="col-sm-8">
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
                                                <div class="col-sm-8">
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
                                                <div class="col-sm-8">
                                                    <select name ="jarak"  class="form-control">
                                                        <option>Pilih:</option>
                                                        <option value="< Dari 1 KM">Kurang dari 1 KM</option>
                                                        <option value="> Dari 1 KM">Lebih dari 1 KM</option>
                                                        
                                                        
                                                        <option value="Lainnya..">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Telpon</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="no_telpon" id="input-text" placeholder="No Telpon">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email" id="input-text" placeholder="Email (example@mail.com)">
                                                </div>
                                            </div>
                                            
                                            

                                        </div>
                                    </div>
                                </div>

                            </section>

                            <section class="step" data-step-title="Sekolah/Madrasah Asal">
                                <div class="notes">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Asal Sekolah/Madrasah</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="input-text" name="sekolah" placeholder="Sekolah Asal" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat Sekolah</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat_sekolah" class="form-control" rows="3" placeholder="Alamat" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No. Peserta Ujian SMP/MTs</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="input-text" name="no_ujian" placeholder="No Ujian" required>
                                                </div>
                                            </div>
                                           

                                            
                                            
                                            
                                        </div>


                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nilai Rata-Rata UN</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nilai_un" id="input-text" placeholder="Nilai UN" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nilai Rata-Rata US</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nilai_us" id="input-text" placeholder="Nilai US" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Seri Ijazah</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="seri_ijazah" id="input-text" placeholder="Seri Ijazah">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">No Seri SKHUN</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="seri_skhun" id="input-text" placeholder="Seri SKHUN">
                                                </div>
                                            </div>

                                           
                                    </div>
                                </div>
                            </section>

                            <section class="step" data-step-title="Identitas Orang Tua">
                                <div class="notes">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Ayah</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="input-text" name="nama_ayah" placeholder="Nama Ayah" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tahun Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="thn_ayah" id="input-text" placeholder="Tahun Lahir" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pekerjaan Ayah</label>
                                                <div class="col-sm-8">
                                                    <select name ="kerja_ayah"  class="form-control" required>
                                                        <option>Pilih Pekerjaan..</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pendidikan Ayah</label>
                                                <div class="col-sm-8">
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
                                                <div class="col-sm-8">
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
                                                <label class="col-sm-3 control-label">Alamat Ayah</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat_ayah" class="form-control" rows="3" placeholder="Alamat Ayah" required></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Ibu</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nama_ibu" id="input-text" placeholder="Nama Ibu" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tahun Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="thn_ibu" id="input-text" placeholder="Tahun Lahir">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pekerjaan Ibu</label>
                                                <div class="col-sm-8">
                                                    <select name ="kerja_ibu"  class="form-control">
                                                        <option>Pilih Pekerjaan..</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="IRT">IRT</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pendidikan Ibu</label>
                                                <div class="col-sm-8">
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
                                                <div class="col-sm-8">
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
                                                <label class="col-sm-3 control-label">Alamat Ibu</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat_ibu" class="form-control" rows="3" placeholder="Alamat Ibu" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="step" data-step-title="Identitas Wali">
                                <div class="notes">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Nama Wali</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="input-text" name="nama_wali" placeholder="Nama Wali" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tahun Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="thn_wali" id="input-text" placeholder="Tahun Lahir Wali" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pekerjaan Ayah</label>
                                                <div class="col-sm-8">
                                                    <select name ="kerja_wali"  class="form-control" required>
                                                        <option>Pilih Pekerjaan..</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Lainnya">Lainnya..</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pendidikan Wali</label>
                                                <div class="col-sm-8">
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
                                                <label class="col-sm-3 control-label">Penghasilan Wali</label>
                                                <div class="col-sm-8">
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
                                                <label class="col-sm-3 control-label">Alamat Wali</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat_wali" class="form-control" rows="3" placeholder="Alamat Wali" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <label for="input-text" class="col-sm-3 control-label">No Wali</label>
                                                <div class="col-sm-8">
                                            <input type="text" class="form-control" name="no_wali" placeholder="No Wali">
                                            </div>
                                            </div>
                                        </div>


                                        
                                    </div>
                                </div>
                            </section>

                            <section class="step" data-step-title="Selesai">
                                <div class="notes">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Tinggi Badan (CM)</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="tinggi" class="form-control" id="input-text" placeholder="Tinggi Badan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Berat Badan (Kg)</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="berat" id="input-text" placeholder="Berat Badan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-3 control-label">Hobi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="hobi" class="form-control" id="input-text" placeholder="Hobi" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="notes">
                                                <h4><strong>Kelengkapan</strong> Berkas</h4>
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
                                                <!-- <p style="text-align: justify"> -->
                                                    
                       <!--  <div class="checkbox">
                            <label>
                                <input type="checkbox" name="declaration" id="declaration"> 
                                Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila ternyata data tersebut tidak benar / palsu, maka saya bersedia menerima sanksi berupa <strong>Pembatalan</strong> sebagai <strong>Calon Peserta Didik</strong> MA Mu'allimin NW Anjani                            </label>
                        </div> -->
                    
                                                <!-- </p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="?admin=dt_siswa"><button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i> Batal</button></a>
                                    <button type="submit" class="btn btn-primary btn-flat" name="tambah"><i class="fa fa-save fa-fw fa-lg"></i> Simpan Data</button>
                                </div>
                            </section>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->

        <!-- Footer End -->         

    </div>

</section>
</aside>
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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
