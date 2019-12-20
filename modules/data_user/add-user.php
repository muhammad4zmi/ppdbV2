<?php


if (isset($_POST['tambah_user'])) {
    
    
    $nama = antiinjection($_POST['nama']);
    $jabatan = antiinjection($_POST['jabatan']);
    $username = antiinjection($_POST['username']);
    $password = antiinjection($_POST['password']);
    $no_hp = antiinjection($_POST['no_hp']);
    
    $cekdata =mysqli_query($link, "select username from tbl_panitia where username ='$username'");
    //$ada = mysqli_query($link, $cekdata)or die(mysqli_error());
    if(mysqli_num_rows($cekdata)>0){
    $alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Upps..!!</strong>
                Maaf, Username yang Anda Masukkan Sudah ada.!!
               
             </div>";
            $_SESSION['alert'] = $alert;
           
                
            //header("location:index.php?modul=datastaf");
 
}else{
    $s = mysqli_query($link, "INSERT Into tbl_panitia set nama='" . $nama . "', jabatan='".$jabatan."',
                       username='".$username."', password='".$password."',no_hp='".$no_hp."'");
    if ($s) {
        $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Berhasil!</strong> Data User Berhasil Di Simpan.
                  </div>";
        $_SESSION['alert'] = $alert;
    } else {
        $alert = "<div class=\"alert alert-danger alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Gagal!</strong><br/> Data User Gagal Di Simpan.
                  </div>";
        $_SESSION['alert'] = $alert;
    }
}
    ?>
    <script type="text/javascript">document.location="index.php?admin=user";</script>
    <?php
}
