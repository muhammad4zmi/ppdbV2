<?php

if(isset($_POST['kirim'])) {
	//print_r($_POST);
	$no_daftar=$_GET['no_daftar'];
	include "koneksi.php";
	$lokasii=$_FILES['fgambar']['tmp_name'];
	$typee=$_FILES['fgambar']['type'];
	$edit_profil=$_FILES['fgambar']['name'];

	// $cb=mysql_fetch_array(mysql_query("select * from profil where judul='$_POST[judul]'"))or die("gagal".mysql_error());
	// if(!empty($lokasii)){
	move_uploaded_file($lokasii,"foto/$edit_profil");

	$query=mysqli_query($link,"UPDATE tbl_siswa set 
								 foto='$edit_profil'
								
								 where $no_daftar")or die("gagal".mysql_error());
	
		if($query) {
       ?>
        <script>
            alert('Profil Berhasil diubah..!!');
            window.location = '?admin=dt_siswa';
        </script>
        <?php
       
    }
}