<!doctype html>
<html>
    <head>
        <title>Kartu Tes Masuk</title>
        <link rel="shortcut icon" href="../../images/logo.jpg">
    </head>
    <body>
<table width="470" border=0>
<tr>
<?php
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
     // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
       "April", "Mei", "Juni",
       "Juli", "Agustus", "September",
       "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
    
}
//koneksi database
mysql_connect("localhost", "root", "");
mysql_select_db("db_ppdb");//fungsi pagination
$BatasAwal = 10;

if (!empty($_GET['page']))  {
$hal = $_GET['page'] - 1;
$MulaiAwal = $BatasAwal * $hal;
} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
$MulaiAwal = 0;
} else if (empty($_GET['page'])) {
$MulaiAwal = 0;
}//tampil data
$kolom = 2;
$i = 0;
$query = mysql_query("select * FROM tbl_siswa LIMIT $MulaiAwal , $BatasAwal");
while ($record = mysql_fetch_array($query)) {
	   if ($i >= $kolom) {
        echo "<tr></tr>";
        $i = 0;
    }
    $i++;
?>
    <td width="464"><table width="394">
<table style="width:9cm;border:3px solid black;" class="kartu">
					<tbody><tr>
						<td colspan="3" style="border-bottom:3px solid black">
							<table width="100%" class="kartu">
							<tbody><tr>
								<td><img src="../../images/logo.jpg" height="50"></td>
								<td align="center" style="font-weight:bold">
									KARTU PESERTA UJIAN MASUK <BR />
									MA Mu'allimin NW Anjani<br>Tahun 2017 
							  </td>
							</tr>
							</tbody></table>
						</td>
					</tr>
					<tr><td width="90">No Peserta</td><td width="8">:</td><td width="226" style="font-size:12px;font-weight:bold;"><?php echo $record['no_daftar']; ?></td></tr>
					<tr><td width="90">Nama Peserta</td><td width="8">:</td><td width="226" style="font-size:12px;font-weight:bold;"><?php echo $record['nama_lengkap']; ?></td></tr>
					
					<tr><td>TT Lahir</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $record['tempat_lahir'].", ".(DateToIndo("$record[tgl_lahir]"));?></td></tr>
					<tr><td>Ruangan</td><td>:</td><td style="font-size:12px;font-weight:bold;">-</td></tr>
					<!-- <tr><td>Alamat</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $record['alamat'].", Desa ".$record['nama_kel'].", Kec. ".$record['nama_kec'].", Kab. ".$record['nama_kota']."-  ".$record['nama_prov'];?></td></tr> -->
					<tr><td>&nbsp;</td><td></td>
					<td style="font-size:12px;font-weight:bold;">Anjani, 13 Juli 2017</td></tr>
					<tr><td>&nbsp;</td><td></td>
					<td style="font-size:12px;font-weight:bold;">TTD, </td></tr>
					<tr><td>&nbsp;</td><td></td>
					<td>&nbsp; </td></tr>
					<tr><td>&nbsp;</td><td></td>
					<td><span style="font-size: 12px">Panitia Ujian Masuk</span></td></tr>
				</tbody></table><hr size="25" color="#FFFFFF"></td>
                
<?php
}

?>
</tr>
</table>
<?php
$cekQuery = mysql_query("SELECT * FROM tbl_siswa");
$jumlahData = mysql_num_rows($cekQuery);
if ($jumlahData > $BatasAwal) {
echo '<br/><center><div style="font-size:10pt;">Page : ';
$a = explode(".", $jumlahData / $BatasAwal);
$b = $a[0];
$c = $b + 1;
for ($i = 1; $i <= $c; $i++) {
echo '<a style="text-decoration:none;';
if ($_GET['page'] == $i) {
echo 'color:red';
}
echo '" href="?page=' . $i . '">' . $i . '</a>, ';
}
echo '</div><button onclick="window.print()">Cetak Halaman Web</button></center>';
}
?>