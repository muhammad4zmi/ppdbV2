<?php

//include 'config/koneksi.php';
$tujuan = $_POST['tujuan'];
$message = $_POST['message'];
// $a = mysqli_query($link,"SELECT * FROM tbl_siswa where telpon='$tujuan'") or die(mysql_error());
//     $b = mysqli_fetch_array($a);
//     $tujuan1 = $b['telpon'];
$jmlSMS=ceil(strlen($message)/153);
$pecah = str_split($message,153);
$s=mysqli_query($link, "SHOW TABLES STATUS LIKE 'outbox'");
$data=mysqli_fetch_array($s);
$newID=$data['Auto_increment'];
if ($tujuan == "Semua") {
    $s1=mysqli_query($link,"select * from tbl_siswa where telpon");

            while ($hasil = mysqli_fetch_array($s1)) {
                $nomer = $hasil['telpon'];
for ($i=1;$i<=$jmlSMS;$i++){
    $udh="050003A7".sprintf("%02s",$jmlSMS).sprintf("%02s",$i);
    $msg=$pecah[$i-1];
    if($i==1){
        $query1=mysqli_query($link,"INSERT INTO outbox(DestinationNumber,UDH,TextDecoded,ID,MultiPart,CreatorID)
            VALUES('$nomer','$udh','$msg','$newID','true','Gammu')");
    }else{
        $query2=mysqli_query($link,"INSERT INTO outbox_multipart(UDH,TextDecoded,ID,SequencePosition)
            VALUES('$udh','$msg','$newID','$i')");
    }
}
}
}
 




        if ($query1) {
           $alert = "<div class=\"alert alert-info alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-info\"></i>
                    <strong>Info!</strong> Info Berhasil di Kirim...!!
                  </div>";
        $_SESSION['alert'] = $alert;
 
        } 
        ?>
    <script type="text/javascript">document.location = "index.php?admin=kirim_pesan";</script>
    <?php
    ?>
    