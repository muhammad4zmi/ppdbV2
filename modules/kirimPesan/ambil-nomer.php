<?php

include "../../config/koneksi.php";
$nim_mhs = $_GET['inputNim'];
$sql_ceknim = mysql_query("select nim, no_hp from mahasiswa
                    where nim='" . $nim_mhs . "'");
$dt_nama = mysql_fetch_assoc($sql_ceknim);
$ada_mhs = mysql_num_rows($sql_ceknim);
echo $dt_nama['no_hp'];
//echo $ada_mhs;

