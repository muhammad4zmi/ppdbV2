<?php
// if (isset($_POST['tambah'])) {

    function ubahformatTgl($tanggal) {
        $pisah = explode('/',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
    }
    $no_daftar = antiinjection($_POST['no_daftar']);
    $nis = antiinjection($_POST['nis']);
    $nisn = antiinjection($_POST['nisn']);
    $nama_lengkap = antiinjection($_POST['nama_lengkap']);
    
    $t_lahir = antiinjection($_POST['t_lahir']);
    $tgl_lahir= antiinjection($_POST['tgl_lahir']);
    $jk = antiinjection($_POST['jk']);
    $agama = antiinjection($_POST['agama']);
    $khusus = antiinjection($_POST['khusus']);
    $anak = antiinjection($_POST['anak']);
    $saudara = antiinjection($_POST['saudara']);
    $kps = antiinjection($_POST['kps']);
    $seri = antiinjection($_POST['seri']);

    $alamat = antiinjection($_POST['alamat']);
    $provinsi = antiinjection($_POST['provinsi']);
    $kota = antiinjection($_POST['kota']);
    $kecamatan = antiinjection($_POST['kecamatan']);
    $kelurahan = antiinjection($_POST['kelurahan']);
    $trans = antiinjection($_POST['trans']);
    $tinggal = antiinjection($_POST['tinggal']);
    $jarak = antiinjection($_POST['jarak']);
    $no_telpon = antiinjection($_POST['no_telpon']);
    $email = antiinjection($_POST['email']);
    $sekolah = antiinjection($_POST['sekolah']);
    $alamat_sekolah = antiinjection($_POST['alamat_sekolah']);
    $no_ujian = antiinjection($_POST['no_ujian']);
    $nilai_un = antiinjection($_POST['nilai_un']);
    $nilai_us = antiinjection($_POST['nilai_us']);
    $seri_ijazah = antiinjection($_POST['seri_ijazah']);
    $seri_skhun =antiinjection($_POST['seri_skhun']);

    
    $nama_ayah=antiinjection($_POST['nama_ayah']);
    $thn_ayah=antiinjection($_POST['thn_ayah']);
    $kerja_ayah=antiinjection($_POST['kerja_ayah']);
    $p_ayah=antiinjection($_POST['p_ayah']);
    $alamat_ayah=antiinjection($_POST['alamat_ayah']);
    $hasil_ayah=antiinjection($_POST['hasil_ayah']);
    $nama_ibu=antiinjection($_POST['nama_ibu']);
    $thn_ibu=antiinjection($_POST['thn_ibu']);
    $kerja_ibu=antiinjection($_POST['kerja_ibu']);
    $p_ibu=antiinjection($_POST['p_ibu']);
    $hasil_ibu=antiinjection($_POST['hasil_ibu']);
     $alamat_ibu=antiinjection($_POST['alamat_ibu']);

      $nama_wali=antiinjection($_POST['nama_wali']);
    $thn_wali=antiinjection($_POST['thn_wali']);
    $kerja_wali=antiinjection($_POST['kerja_wali']);
    $p_wali=antiinjection($_POST['p_wali']);
    $hasil_wali=antiinjection($_POST['hasil_wali']);
     $alamat_wali=antiinjection($_POST['alamat_wali']);
       $no_wali=antiinjection($_POST['no_wali']);
    $tinggi=antiinjection($_POST['tinggi']);
    $berat=antiinjection($_POST['berat']);
    $hobi=antiinjection($_POST['hobi']);
    $ubahtgl = ubahformatTgl($tgl_lahir);

        
         
        
    $cekdata =mysqli_query($link, "select no_daftar from tbl_siswa where no_daftar ='$no_daftar'");
    //$ada = mysqli_query($link, $cekdata)or die(mysqli_error());
    if(mysqli_num_rows($cekdata)>0){
    $alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Upps..!!</strong>
                Maaf, Data Calon Siswa yang Anda Masukkan Sudah ada.!!
               
             </div>";
            $_SESSION['alert'] = $alert;
           
                
            //header("location:index.php?modul=datastaf");
            //
 
}else{
    $s = mysqli_query($link, "INSERT Into tbl_siswa values('$no_daftar', '$nis', '$nisn',
        '$nama_lengkap', '$t_lahir','$ubahtgl','$jk', '$agama','$khusus', '$anak','$saudara', '$kps', '$seri', '$alamat', '$kelurahan','$kecamatan','$kota', '$provinsi', '$trans', '$tinggal','$jarak','$no_telpon','$email', '$sekolah','$alamat_sekolah', '$no_ujian', '$nilai_un', 
            '$nilai_us',  '$seri_ijazah', '$seri_skhun',  '$nama_ayah', '$thn_ayah',  '$kerja_ayah','$p_ayah','$hasil_ayah','$alamat_ayah', '$nama_ibu', '$thn_ibu', '$kerja_ibu', '$p_ibu', '$hasil_ibu','$alamat_ibu', '$nama_wali','$thn_wali','$kerja_wali','$p_wali', '$hasil_wali', '$alamat_wali', '$no_wali','$tinggi', '$berat', '$hobi')");
    $reply=$_POST['reply'];
     $reply ="Terima Kasih ".$nama_lengkap. " Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331";
            mysqli_query($link,"INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$no_telpon', '$reply')");
    $syarat = $_POST['syarat'];
    $jumlah_dipilih = count($syarat);
    for($x=0;$x<$jumlah_dipilih;$x++){
            mysqli_query($link,"INSERT INTO tbl_syarat values('','$no_daftar','$syarat[$x]')");
        }
        
                // $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer2', '$reply')");
    if ($s) {
        $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Berhasil!</strong> Data Siswa Berhasil Di Simpan.
                  </div>";
        $_SESSION['alert'] = $alert;
    } else {
        $alert = "<div class=\"alert alert-danger alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Gagal!</strong><br/> Data Siswa Gagal Di Simpan.
                  </div>";
        $_SESSION['alert'] = $alert;
    }
}
    ?>
    <script type="text/javascript">document.location="?admin=dt_siswa";</script>
    <?php

//}