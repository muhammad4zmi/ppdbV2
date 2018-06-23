<?php
// membaca file koneksi.php
include "koneksi.php";

// membaca tabel-tabel yang dipilih dari form
$tabel = $_POST['tabel'];

// proses untuk menggabung nama-nama tabel yang dipilih
// sehingga menjadi sebuah string berbentuk 'tabel1 tabel2 tabel3 ...'

$listTabel = "";
foreach($tabel as $namatabel)
{
  $listTabel .= $namatabel." ";
}

// membentuk string command menjalankan mysqldump
// diasumsikan file mysqldump terletak di dalam folder C:\AppServ\MySQL\bin

$command = "C:\server\mysql\bin\mysqldump -u $dbUser -p $dbPass  $dbName $listTabel > ".$dbName.".sql";

exec($command);

header("Content-Disposition: attachment; filename=".$dbName.".sql");

header("Content-type: application/download");

$fp  = fopen($dbName.".sql", 'r');

$content = fread($fp, filesize($dbName.".sql"));

fclose($fp);

echo $content;
exit;
?>
<!-- header("Content-Disposition: attachment; filename=\"NILAI EXTRA KUR.STMIKBG_AKHIR.docx"); // gunakan backslash untuk mengijinkan file dengan spasi
$file_size = filesize("NILAI EXTRA KUR.STMIKBG_AKHIR.docx");
header("Content-Description: File Transfer");
header("Content-Type: application/force-download"); // some browsers need this
header("Content-length: " . $file_size);
$type = filetype("NILAI EXTRA KUR.STMIKBG_AKHIR.docx");
header("Content-type: application/" . $type);
header("Expires: 0");
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Pragma: no-cache");
$fp = fopen("NILAI EXTRA KUR.STMIKBG_AKHIR.docx", 'r');
$content = fread($fp, $file_size);
fclose($fp);
echo $content; -->