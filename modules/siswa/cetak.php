<?php
//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='COVER_SISWA'; //Beri nama file PDF hasil.
include('../../mpdf60/mpdf.php');
include('../../mpdf60/QrCode.php');

// define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
// include(_MPDF_PATH . "../../mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
include "../../config/config.php";
include "phpqrcode-master/qrlib.php";

//QRCode::png($daftar);
//$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
$mpdf=new mPDF('utf-8', 'Legal', 10.5, 'arial'); // Membuat file mpdf baru

$no_daftar = $_REQUEST['no_daftar'];
$sql    =mysqli_query($link, "select * from tbl_siswa where no_daftar = '$no_daftar'");
$j = mysqli_fetch_array($sql);
$no_daftar1=$j['no_daftar'];
$nama    = $j['nama_lengkap'];
$alamat = $j['alamat'];
$hp        = $j['telpon'];
//$tgllhr        = $data['tgllhr'];
//$noujian     = $j['no_ujian'];
// $sekolah = $j['sekolah'];
// $tgl_pengumanan =$j['tgl_pengumanan'];
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>
<style>
 div {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
  }
</style>
<style>
/*****************************
SELAMAT DATANG DI DUMET SCHOOL
*****************************/

* {margin: 0; padding: 0;}

a {
  text-decoration: none;
  color: #333;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  color: #333;
}

#container {
  margin: auto;
  width: 940px;
  padding: 10px;  
}

#container header {
  padding: 20px 0;  
}

#container header h1 {
  text-transform: uppercase;  
}

#container header h5 {
  margin-bottom: 20px;
}

#container header a {
  text-transform: none;
  color: #F90;  
}

#container header a:hover {
  color: #03F;  
}

/**************
 STYLE CHECKBOX
**************/
input[type="checkbox"] {
  display: none;  
}
</style>
<style>

.barcode {

    padding: 1.5mm;

    margin: 0;

    vertical-align: top;

    color: #000044;

}

.barcodecell {

    text-align: center;

    vertical-align: middle;

}

</style>
<style type="text/css">
#kiri
{
width:50%;
height:100px;
/*background-color:#FF0;*/
float:left;
}
#kanan
{
width:50%;
height:100px;
background-color:#0C0;
float:right;
}
</style>
<!doctype html>
<html>
    <head>
        <title>Print Cover</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        <link rel="shortcut icon" href="tutwuri.png">
    </head>
    <body>
  <img src="../../img/header1.png" style="width:1000px;height:50px; margin-center: 200px" align="center">
    
       <table border="1" align="right">
       <tr style="background-color: #E4E6DD;">
        
         <td align="left"><h3><?php echo $no_daftar?></h3></td>

       </tr>
       </table>
    
       
        <div align="center">
        <u><font size="5" align="center"><strong><b align="center">BERKAS PENDAFTARAN
        SISWA BARU</b></strong></font></u></div>
     
           	 
                     <table border="">                   
                                       
                                          <tr>

                                               <td width="35%"><h5>NAMA LENGKAP</h5></td>
                                               <td width="1" align="center"><h5>:</h5></td>
                                              <td><h5><strong><big><?php echo $j['nama_lengkap'];?> </big></strong></h5></td>
                                              
                                            </tr>
                                            

                                             
                                            <tr>
                                              <td width="35%"><h5>ALAMAT</h5></td>
                                              <td width="1" align="center"><h5>:</h5></td>
                                              <td><h5><strong><big><?php echo $j['alamat'];?> </big></strong></h5></td>
                                              
                                            </tr>
                                             <tr>
                                              <td width="35%"><h5>NO HP</h5></td>
                                              <td width="1" align="center"><h5>:</h5></td>
                                              <td ><h5><strong><big><?php echo $j['telpon'];?> </big></strong></h5></td>
                                              
                                            </tr>
</table>
</div>
<div>
 <p style="text-align: justify"><strong>KETERANGAN KELENGKAPAN BERKAS</strong>
<table>
<tr>
<td  width="50%">
 <?php
 
                                                    $data = array();
                                                    $query = "SELECT tbl_siswa.no_daftar,tbl_siswa.nis,tbl_siswa.nisn,tbl_siswa.nama_lengkap,tbl_siswa.tgl_lahir,tbl_siswa.telpon,
                                                        tbl_syarat.no_daftar,tbl_syarat.syarat
                                                        from tbl_siswa INNER JOIN tbl_syarat ON tbl_syarat.no_daftar=tbl_siswa.no_daftar where tbl_syarat.no_daftar='$no_daftar' order by tbl_syarat.no_daftar ";
                                                    $result = mysqli_query($link, $query);
                                                    while ($row = mysqli_fetch_object($result)) {
                                                        $p = $row->syarat;
                                                        ?>
                                                        <div>
                                                            <!--ingat : name harus berupa array (ada tanda []). lalu jika $p ada dalam $data ditambahkan atribute cheked-->
                                                            <input type="checkbox" name="syarat[]"  checked value="<?php echo $p; ?>" disabled checked="checked"
                                                            <?php echo in_array($p, $data) ? 'checked' : ''; ?>>
                                                            <?php echo $p; ?>
                                                           <!--  <?php include 'checked.php';?> -->
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    </td>
                                                     <td align="right" width="80%"><small>Please Scan QR Code</small><br><?php QRCode::png("https://www.facebook.com/ma.mamualliminnwanjani","image.png","L",3,3);
          echo "<img src='image.png' />";?></td>
                                                    </tr>
                                                    
                                                    </table>
                                                     <?php $j1 = mysqli_num_rows($result);
                                                         if ($j1 >=5) {
                                                            echo '<strong><big>Keterangan Berkas : <b>LENGKAP</big></strong>';
                                                        }elseif ($j1 < 5) {
                                                            echo '<strong><big>Keterangan Berkas : <b>BELUM LENGKAP</strong></big>';
                                                        }

                                                            ?></p>
                          <p style="text-align: justify"><strong>CATATAN PENTING</strong><br>
                          
                           -Pengambilan No. Peserta Ujian Hari Rabu, 12 Juli 2018.
                            Dengan Membawa Bukti Pendaftaran<br>
                           -Ujian Masuk Tanggal 13- 15 Juli 2018.<br>
                           -Pra Masa Ta'aruf Siswa Madrasah(MATSAMA)/MOS Tanggal 16 Juli 2018<br>
                           -Masa Ta'aruf Siswa Madrasah(MATSAMA)/MOS Tanggal 17-19 Juli 2018<br>
                           -Pengumuman Hasil Test dan Daftar Ulang Tanggal 20 Juli 2018<br>
                           -Saat Masuk agar melengkapi syarat pendaftaran berupa Foto Copy: Ijazah,SKHUN,KK dan Akta Lahir<br>
                           -Info Program/Jurusan : 1. MIA, 2. PIB, 3. IIS, 4. PIK
                           -Info lebih lanjut Hubungi Panitia di 081918405331 (Ustazd Azmi)
                          </p>
                                                    <p>--------------------------------------------------------------------<i class="fa fa-cut"></i>Potong Disini--------------------------------------------------------------------</p>                                           
<img src="../../img/header1.png" style="width:1000px;height:100px; margin-center: 200px" align="center">
    
       <table border="1" align="right">
       <tr style="background-color: #E4E6DD;">
        
         <td align="left"><h3><?php echo $no_daftar?></h3></td>

       </tr>
       </table>
      <!--  <div class="barcodecell" align="right"><barcode code="<?php echo $no_daftar?>" type="I25" class="barcode" /></div>
    </barcode>
    </div> -->
    
<!-- 
        <?php QRCode::png("$no_daftar");?>  -->
        
       
        <div align="center">
        <u><font size="5" align="center"><strong><b align="center">BERKAS PENDAFTARAN
        SISWA BARU</b></strong></font></u></div>
     
             
                     <table border="">                   
                                       
                                          <tr>

                                               <td width="35%"><h5>NAMA LENGKAP</h5></td>
                                               <td width="1" align="center"><h5>:</h5></td>
                                              <td><h5><strong><big><?php echo $j['nama_lengkap'];?> </big></strong></h5></td>
                                              
                                            </tr>
                                            

                                             
                                            <tr>
                                              <td width="35%"><h5>ALAMAT</h5></td>
                                              <td width="1" align="center"><h5>:</h5></td>
                                              <td><h5><strong><big><?php echo $j['alamat'];?> </big></strong></h5></td>
                                              
                                            </tr>
                                             <tr>
                                              <td width="35%"><h5>NO HP</h5></td>
                                              <td width="1" align="center"><h5>:</h5></td>
                                              <td ><h5><strong><big><?php echo $j['telpon'];?> </big></strong></h5></td>
                                              
                                            </tr>
</table>
</div>
<div>
 <p style="text-align: justify"><strong>KETERANGAN KELENGKAPAN BERKAS</strong>
<table>
<tr>
<td  width="50%">
 <?php
 
                                                    $data = array();
                                                    $query = "SELECT tbl_siswa.no_daftar,tbl_siswa.nis,tbl_siswa.nisn,tbl_siswa.nama_lengkap,tbl_siswa.tgl_lahir,tbl_siswa.telpon,
                                                        tbl_syarat.no_daftar,tbl_syarat.syarat
                                                        from tbl_siswa INNER JOIN tbl_syarat ON tbl_syarat.no_daftar=tbl_siswa.no_daftar where tbl_syarat.no_daftar='$no_daftar' order by tbl_syarat.no_daftar ";
                                                    $result = mysqli_query($link, $query);
                                                    while ($row = mysqli_fetch_object($result)) {
                                                        $p = $row->syarat;
                                                        ?>
                                                        <div>
                                                            <!--ingat : name harus berupa array (ada tanda []). lalu jika $p ada dalam $data ditambahkan atribute cheked-->
                                                            <input type="checkbox" name="syarat[]"  checked value="<?php echo $p; ?>" disabled checked="checked"
                                                            <?php echo in_array($p, $data) ? 'checked' : ''; ?>>
                                                            <?php echo $p; ?>
                                                           <!--  <?php include 'checked.php';?> -->
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    </td>
                                                     <td align="right" width="80%"><small>Please Scan QR Code</small><br><?php QRCode::png("https://www.facebook.com/ma.mamualliminnwanjani","image.png","L",3,3);
          echo "<img src='image.png' />";?></td>
                                                    </tr>
                                                    
                                                    </table>
                                                    <?php $j1 = mysqli_num_rows($result);
                                                         if ($j1 >=5) {
                                                            echo '<strong><big>Keterangan Berkas : <b>LENGKAP</big></strong>';
                                                        }elseif ($j1 < 5) {
                                                            echo '<strong><big>Keterangan Berkas : <b>BELUM LENGKAP</strong></big>';
                                                        }

                                                            ?></p>

</body>
</html>

<?php

//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
