<?php

if (isset($_POST['ubah_siswa'])&& $_SERVER['REQUEST_METHOD'] === 'POST') {
    function ubahformatTgl($tanggal) {
        $pisah = explode('/',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
    }
    
    $nis = antiinjection($_POST['nis']);
    $nisn = antiinjection($_POST['nisn']);
    $nama_lengkap = antiinjection($_POST['nama_lengkap']);
    $jk = antiinjection($_POST['jk']);
    $tmpt = antiinjection($_POST['tmpt']);
    $tgl_lahir= antiinjection($_POST['tgl_lahir']);
    $agama = antiinjection($_POST['agama']);
    $alamat = antiinjection($_POST['alamat']);
    $provinsi = antiinjection($_POST['provinsi']);
    $kota = antiinjection($_POST['kota']);
    $kecamatan = antiinjection($_POST['kecamatan']);
    $kelurahan = antiinjection($_POST['kelurahan']);
    $trans = antiinjection($_POST['trans']);
    $no_telpon = antiinjection($_POST['no_telpon']);
    $email = antiinjection($_POST['email']);
    $skhun =antiinjection($_POST['skhun']);
    $kps = antiinjection($_POST['kps']);
    $nama_ayah=antiinjection($_POST['nama_ayah']);
    $thn_ayah=antiinjection($_POST['thn_ayah']);
    $kerja_ayah=antiinjection($_POST['kerja_ayah']);
    $p_ayah=antiinjection($_POST['p_ayah']);
    $hasil_ayah=antiinjection($_POST['hasil_ayah']);
    $nama_ibu=antiinjection($_POST['nama_ibu']);
    $thn_ibu=antiinjection($_POST['thn_ibu']);
    $kerja_ibu=antiinjection($_POST['kerja_ibu']);
    $p_ibu=antiinjection($_POST['p_ibu']);
    $hasil_ibu=antiinjection($_POST['hasil_ibu']);
    $tinggi=antiinjection($_POST['tinggi']);
    $berat=antiinjection($_POST['berat']);
    $saudara=antiinjection($_POST['saudara']);
    //$ubahtgl = ubahformatTgl($tgl_lahir);
   $sql_ubah=mysqli_query($link,"update tbl_siswa set nis='" . $nis . "',
                                                        nisn='".$nisn."',
                                                        nama_lengkap='".$nama_lengkap."',
                                                        jk='".$jk."',
                                                        tempat_lahir='".$tmpt."',
                                                        tgl_lahir='".$tgl_lahir."',
                                                        agama='".$agama."',
                                                        alamat='".$alamat."',
                                                        desa='".$kelurahan."',
                                                        kecamatan='".$kecamatan."',
                                                        kabupaten='".$kota."',
                                                        provinsi='".$provinsi."',
                                                        alat_transportasi='".$trans."',
                                                        telpon='".$no_telpon."',
                                                        email='".$email."',
                                                        skhun_sd='".$skhun."',
                                                        kps='".$kps."',
                                                        nama_ayah='".$nama_ayah."',
                                                        thn_lahir='".$thn_ayah."',
                                                        pekerjaan_ayah='".$kerja_ayah."',
                                                        pendidikan_ayah='".$p_ayah."',
                                                        penghasilan='".$hasil_ayah."',
                                                        nama_ibu='".$nama_ibu."',
                                                        thnlahir='".$thn_ibu."',
                                                        pekerjaan_ibu='".$kerja_ibu."',
                                                        pendidikan_ibu='".$p_ibu."',
                                                        penghasilan_ibu='".$hasil_ibu."',
                                                        tinggi_badan='".$tinggi."',
                                                        berat_badan='".$berat."',
                                                        jml_saudara='".$saudara."' 
                                                        where nis='".$nis."'");
    
        if($sql_ubah){
         $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                   
                    <strong>Info!</strong> Data Berhasil Di Ubah.
                  </div>";
        $_SESSION['alert'] = $alert;
    } else {
        $alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                
                <h4>Warning..!!</h4>
                Maaf, Data Tidak bisa di Ubah..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
    }

?>
    <script type="text/javascript">document.location = "index.php?admin=dt_siswa";</script>
    <?php
}