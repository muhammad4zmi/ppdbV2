<?php
include "qr.php";
$isi_teks = "Belajar QR Code itu asik";
$namafile = "coba.png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 0;
 
QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
?>