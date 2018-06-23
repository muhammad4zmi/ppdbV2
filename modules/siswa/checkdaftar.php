<?php
require 'koneksi.php';
//nis = $_GET['inputNis'];
$no_daftar =$_POST['no_Daftar'];
$sql = "select * from tbl_siswa where no_daftar='$no_daftar'";
$hasil = mysqli_query($con, $sql);
$num = mysqli_num_rows($hasil);
if ($num>0){
	echo 0;
} else {
	echo 1;
}
