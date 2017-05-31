<?php
	//print_r($_POST);
	//include "config/koneksi.php";
	$nomer=$_POST['nomer'];
        //$pesan=$_POST['pesan'];
	$pesan=mysql_real_escape_string(htmlspecialchars($_POST['pesan']));
        // $sql = "select * from tbl_siswa where telpon='$nomer'";
            // $query = mysqli_query($link,$sql);
            // while ($hasil = mysqli_fetch_array($query)) {
            //     $nomer1 = $hasil['telpon'];
               
                
                $sendSMS = mysqli_query($link,"INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer', '$pesan')");
                
            //}
            
	if($sendSMS){
         $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-check\"></i>
                    <strong>Info!</strong> SMS Informasi Berhasil Dikirim..!!
                  </div>";
        $_SESSION['alert'] = $alert;

 

}
        ?>
    <script type="text/javascript">document.location = "index.php?admin=kirim_pesan";</script>
    <?php
    ?>