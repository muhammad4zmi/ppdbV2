<?php
include"../../config/config.php";
include "phpqrcode-master/qrlib.php";
$test=mysqli_query($link,"select * from tbl_siswa where no_daftar='M/LTM/V/2017/001'");
$j = mysqli_fetch_array($test);
$daftar=$j['no_daftar'];
QRCode::png($daftar,"image.png","L",4,4);
echo "<img src='image.png' />";

?>