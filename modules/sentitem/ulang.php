<?php

// mysql_connect('localhost', 'root', '');
// mysql_select_db("db_ppdb");

// $id = array();

// var_dump($_POST);
//include "../../config/config.php";

$id = $_POST['id'];
print_r($id);

 $jumlah_dipilih = count($id);
    for($x=0;$x<$jumlah_dipilih;$x++){

    $a = mysqli_query($link,"SELECT * FROM sentitems where ID='$id[$x]'") or die(mysql_error());
    while($hsl = mysqli_fetch_array($a)) {
        $tujuan = $hsl['DestinationNumber'];
        $pesanSMS =  $hsl['TextDecoded'];
        $send = mysqli_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$tujuan', '$pesanSMS', 'Gammu')");
        // $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')");
    $query=mysqli_query($link,"delete from sentitems where ID='$value'");
    }
        
 
       ?>
        <script>
            alert('Brhasil Dikrim Ulang..!!');
            window.location = '';
        </script>

        <?php
    }
  

       
   

  