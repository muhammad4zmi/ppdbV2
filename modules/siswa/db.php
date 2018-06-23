<?php
//hosting
$host ='localhost';
//username mysql/mariadb/sejenisnya

$user ='root';
//password mysql/mariadb/sejenisnya
$pass ='';
//lokasi peyimpanan backup file
$drive = 'D:/simpandb/';
$now = date('Y-m-d');
$time = date("h:m");
//database yang tidak ingin di backup
$lewati = array('mysql', 'information_schema','test','performance_schema','phpmyadmin','db_cms_sekolahku','db_layanan','db_penjualan','db_raport','db_sekolahku','ekstrakurikuler_v4','muallimin','pengumuman','wilayah','webauth');
//Proses Di Mulai
$conn=mysqli_connect($host,$user,$pass);
if (mysqli_connect_errno())
{echo "Koneksi Gagal: " . mysqli_connect_error();}
$goummi = null;$ummigo=0;$hitung = time();
$sql = 'show databases';
$hasil = mysqli_query($conn,$sql);
if(!$hasil){die('Tidak dapat menemukan database: '. mysqli_connect_error());}
$db = array();
while ($row = mysqli_fetch_assoc($hasil)) {$db[] = $row['Database'];}
foreach($db as $database) {
if(in_array($database, $lewati)) {continue;}
exec("c:/server/mysql/bin/mysqldump --complete-insert --create-options --add-locks --disable-keys --extended-insert --quick --quote-names -u $user --password=$pass $database -c>{$drive}/$now-$database.sql 2>&1", $goummi, $hasil);
if($hasil){echo("Error $lokasi: $hasil");}$ummigo=$ummigo+1;
if ($hasil) {
        $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Berhasil!</strong> Data Siswa Berhasil Di Back Up.
                  </div>";
        $_SESSION['alert'] = $alert;
    } else {
       $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Berhasil!</strong> ".$ummigo." Database berhasil di Back Up <br> Dalam Waktu ".(time() - $hitung)." detik.
                  </div>";
        $_SESSION['alert'] = $alert;
    }
}

    ?>
    <script type="text/javascript">document.location="?admin=dt_siswa";</script>
    <?php

// if($hasil){echo("Error $lokasi: $hasil");}$ummigo=$ummigo+1;}
// echo('Database yang di proses '.$ummigo.'</br> Dalam Tempo: '.(time() - $hitung).' detik.'); 
// echo("</br>by <a href='http://suckittrees.com/' target='_blank'>suckittrees.com</a>");
?>

