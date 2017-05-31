<?php
include 'konek.php';

error_reporting(0);
$page = $_GET['page'];

if ($page == 'cari-kota')
{
	$id = $_POST['id'];
	$kota = $db->query("SELECT * FROM tbl_kota WHERE provinsi_id = '$id'");
	echo'<option value="0">Pilih Kabupaten/Kota</option>';
	while ($rowkota = $kota->fetch(PDO::FETCH_ASSOC)) {
	    
	    echo'<option value="'.$rowkota['id'].'">'.$rowkota['nama_kota'].'</option>';
	}
}

if ($page == 'cari-kecamatan')
{
	$id = $_POST['id'];
	$kota = $db->query("SELECT * FROM tbl_kecamatan WHERE kota_id = '$id'");
	echo'<option value="0">Pilih Kecamatan</option>';
	while ($rowkota = $kota->fetch(PDO::FETCH_ASSOC)) {
	    
	    echo'<option value="'.$rowkota['id'].'">'.$rowkota['nama_kec'].'</option>';
	}
}

if ($page == 'cari-kelurahan')
{
	$id = $_POST['id'];
	$kota = $db->query("SELECT * FROM tbl_kelurahan WHERE kecamatan_id = '$id'");
	echo'<option value="0">Pilih Desa/Kelurahan</option>';
	while ($rowkota = $kota->fetch(PDO::FETCH_ASSOC)) {
	    
	    echo'<option value="'.$rowkota['id'].'">'.$rowkota['nama_kel'].'</option>';
	}
}

?>