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
?>
<h3 align="left">DAFTAR SISWA BARU<br>MA MU'ALLIMIN NW ANJANI TAHUN 2017/2018</h3>
<table border="1">
	<thead>
                                        <tr height="20px" bgcolor="#E4E6DD">
                                            <th rowspan="2" width="5%">No</th>
                                            
                                            <th colspan="25" align="center">Identitas Siswa</th>
                                            <th colspan="7" align="center">Sekolah/Madrasah Asal</th>
                                            <th colspan="12" align="center">Data Orang Tua</th>
                                            <th colspan="7" align="center">Data Wali</th>
                                        </tr> 
                                        <tr height="20px" bgcolor="#E4E6DD">
                                            <th rowspan="1" align="center">No Pendaftaran</th>
                                            <th rowspan="1" align="center">NIK</th>
                                            <th rowspan="1" align="center">NISN</th>
                                            <th rowspan="1" align="center">Nama Lengkap</th>
                                            <th rowspan="1" align="center">TTL</th>
                                            <th rowspan="1" align="center">Kelamin</th>
                                            <th rowspan="1" align="center">Agama</th>
                                            <th rowspan="1" align="center">Khusus</th>
                                            <th rowspan="1" align="center">Anak Ke</th>
                                            <th rowspan="1" align="center">J. Saudara</th>
                                            <th rowspan="1" align="center">KPS</th>
                                            <th rowspan="1" align="center">No. Seri KPS</th>
                                            <th rowspan="1" align="center">Alamat</th>
                                            <th rowspan="1" align="center">Desa</th>
                                            <th rowspan="1" align="center">Kecamatan</th>
                                            <th rowspan="1" align="center">Kabupaten</th>
                                            <th rowspan="1" align="center">Provinsi</th>
                                            <th rowspan="1" align="center">Mode Transportasi</th>
                                            <th rowspan="1" align="center">T. Tinggal</th>
                                            <th rowspan="1" align="center">Jarak Sekolah</th>
                                            <th rowspan="1" align="center">No Telpon</th>
                                            <th rowspan="1" align="center">Email</th>
                                            <th rowspan="1" align="center">Hobi</th>
                                            <th rowspan="1" align="center">Tinggi Badan (CM)</th>
                                            <th rowspan="1" align="center">Berat Badan (CM)</th>

                                            
                                        
	                                        <th rowspan="1" align="center">Asal Sekolah</th>
	                                        <th rowspan="1" align="center">Alamat Sekolah</th>
	                                        <th rowspan="1" align="center">No Peserta SMP</th>
                                            <th rowspan="1" align="center">Rerata UN</th>
                                            <th rowspan="1" align="center">Rerata US</th>
                                            <th rowspan="1" align="center">No Seri Ijazah</th>
                                            <th rowspan="1" align="center">No Seri SKHUN</th>
                                            
                                        
	                                        <th rowspan="1" align="center">Nama Ayah</th>
	                                        <th rowspan="1" align="center">Tahun Lahir</th>
	                                        <th rowspan="1" align="center">Pekerjaan Ayah</th>
                                            <th rowspan="1" align="center">Pendidikan Ayah</th>
                                            <th rowspan="1" align="center">Penghasilan</th>
                                            <th rowspan="1" align="center">Alamat Ayah</th>
                                             <th rowspan="1" align="center">Nama Ibu</th>
	                                        <th rowspan="1" align="center">Tahun Lahir</th>
	                                        <th rowspan="1" align="center">Pekerjaan Ibu</th>
                                            <th rowspan="1" align="center">Pendidikan Ibu</th>
                                            <th rowspan="1" align="center">Penghasilan</th>
                                            <th rowspan="1" align="center">Alamat Ibu</th>
                                     
                                            
                                        
	                                        <th rowspan="1" align="center">Nama Wali</th>
	                                        <th rowspan="1" align="center">Tahun Lahir</th>
	                                        <th rowspan="1" align="center">Pekerjaan Wali</th>
                                            <th rowspan="1" align="center">Pendidikan Wali</th>
                                            <th rowspan="1" align="center">Penghasilan</th>
                                            <th rowspan="1" align="center">Alamat Wali</th>
                                             <th rowspan="1" align="center">No Wali</th>
                                            </tr>
                                    </thead>
                                    <tbody>
	<?php
	include "../../config/config.php";
	
	//query menampilkan data
	$sql_siswa = mysqli_query($link, "select db_ppdb.tbl_siswa.no_daftar
,db_ppdb.tbl_siswa.nis,db_ppdb.tbl_siswa.nisn,db_ppdb.tbl_siswa.nama_lengkap
,db_ppdb.tbl_siswa.tempat_lahir,db_ppdb.tbl_siswa.tgl_lahir,db_ppdb.tbl_siswa.jk
,db_ppdb.tbl_siswa.agama,db_ppdb.tbl_siswa.khusus,db_ppdb.tbl_siswa.anak_ke
,db_ppdb.tbl_siswa.jml_saudara,db_ppdb.tbl_siswa.kps,db_ppdb.tbl_siswa.seri_kps
,db_ppdb.tbl_siswa.alamat,db_ppdb.tbl_siswa.alat_transportasi,db_ppdb.tbl_siswa.tempat_tggl
,db_ppdb.tbl_siswa.jarak_sekolah,db_ppdb.tbl_siswa.telpon,db_ppdb.tbl_siswa.email
,asal_sekolah,db_ppdb.tbl_siswa.alamat_sekolah,db_ppdb.tbl_siswa.noujian_smp
,db_ppdb.tbl_siswa.nilai_un,db_ppdb.tbl_siswa.nilai_us,db_ppdb.tbl_siswa.seri_ijazah
,db_ppdb.tbl_siswa.seri_skhun,db_ppdb.tbl_siswa.nama_ayah,db_ppdb.tbl_siswa.thn_ayah
,db_ppdb.tbl_siswa.pekerjaan_ayah,db_ppdb.tbl_siswa.pendidikan_ayah,db_ppdb.tbl_siswa.penghasilan
,db_ppdb.tbl_siswa.alamat_ayah,db_ppdb.tbl_siswa.nama_ibu,db_ppdb.tbl_siswa.thn_ibu
,db_ppdb.tbl_siswa.pekerjaan_ibu,db_ppdb.tbl_siswa.pendidikan_ibu,db_ppdb.tbl_siswa.penghasilan_ibu
,db_ppdb.tbl_siswa.alamat_ibu,db_ppdb.tbl_siswa.nama_wali,db_ppdb.tbl_siswa.lahir_wali
,db_ppdb.tbl_siswa.pendidikan_wali,db_ppdb.tbl_siswa.pekerjaan_wali,db_ppdb.tbl_siswa.hasil_wali
,db_ppdb.tbl_siswa.alamat_wali,db_ppdb.tbl_siswa.no_wali,db_ppdb.tbl_siswa.tinggi_badan
,db_ppdb.tbl_siswa.berat_badan,db_ppdb.tbl_siswa.hobi,
db_ppdb.tbl_siswa.kecamatan,db_ppdb.tbl_siswa.desa,db_ppdb.tbl_siswa.kabupaten,db_ppdb.tbl_siswa.provinsi,
wilayah.tbl_kecamatan.id,wilayah.tbl_kecamatan.nama_kec,wilayah.tbl_kelurahan.id,wilayah.tbl_kelurahan.nama_kel,wilayah.tbl_kota.id,
wilayah.tbl_kota.nama_kota,wilayah.tbl_provinsi.id,wilayah.tbl_provinsi.nama_prov
from db_ppdb.tbl_siswa,wilayah.tbl_kecamatan,wilayah.tbl_kelurahan,wilayah.tbl_kota,wilayah.tbl_provinsi
where db_ppdb.tbl_siswa.kecamatan=wilayah.tbl_kecamatan.id and db_ppdb.tbl_siswa.desa=wilayah.tbl_kelurahan.id and
db_ppdb.tbl_siswa.kabupaten=wilayah.tbl_kota.id and db_ppdb.tbl_siswa.provinsi=wilayah.tbl_provinsi.id order by db_ppdb.tbl_siswa.no_daftar asc");
	
	//$j = mysqli_fetch_array($coba);
	$no = 1;
	 while ($data_siswa = mysqli_fetch_assoc($sql_siswa)) {
	 	
                                            //$daftar=$data_siswa['no_daftar'];
                                            ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data_siswa['no_daftar'];?></td>
                                            <td><?php echo $data_siswa['nis'];?></td>
                                            <td><?php echo $data_siswa['nisn'];?></td>
                                            <td><?php echo $data_siswa['nama_lengkap'];?></td>
                                            <td><?php echo $data_siswa['tempat_lahir'].", ". (DateToIndo("$data_siswa[tgl_lahir]"));?> </td>
                                            <td><?php echo $data_siswa['jk'];?></td>
                                            <td><?php echo $data_siswa['agama'];?></td>
                                            <td><?php echo $data_siswa['khusus'];?></td>
                                            <td><?php echo $data_siswa['anak_ke'];?></td>
                                            <td><?php echo $data_siswa['jml_saudara'];?></td>
                                            <td><?php echo $data_siswa['kps'];?></td>
                                            <td><?php echo $data_siswa['seri_kps'];?></td>
                                            <td><?php echo $data_siswa['alamat']?></td>
                                            <td><?php echo $data_siswa['nama_kel'];?></td>
                                            <td><?php echo $data_siswa['nama_kec'];?></td>
                                            <td><?php echo $data_siswa['nama_kota'];?></td>
                                            <td><?php echo $data_siswa['nama_prov'];?></td>
                                            <td><?php echo $data_siswa['alat_transportasi'];?></td>
                                            <td><?php echo $data_siswa['tempat_tggl'];?></td>
                                            <td><?php echo $data_siswa['jarak_sekolah']?></td>
                                            <td><?php echo $data_siswa['telpon']?></td>
                                            <td><?php echo $data_siswa['email']?></td>
                                            <td><?php echo $data_siswa['hobi'];?></td>
                                            <td><?php echo $data_siswa['tinggi_badan']?></td>
                                            <td><?php echo $data_siswa['berat_badan'];?></td>
                                            <td><?php echo $data_siswa['asal_sekolah'];?></td>
                                            <td><?php echo $data_siswa['alamat_sekolah'];?></td>
                                            <td><?php echo $data_siswa['noujian_smp'];?></td>
                                            <td><?php echo $data_siswa['nilai_un'];?></td>
                                            <td><?php echo $data_siswa['nilai_us'];?></td>
                                            <td><?php echo $data_siswa['seri_ijazah'];?></td>
                                            <td><?php echo $data_siswa['seri_skhun'];?></td>
                                             <td><?php echo $data_siswa['nama_ayah'];?></td>
                                            <td><?php echo $data_siswa['thn_ayah'];?></td>
                                            <td><?php echo $data_siswa['pekerjaan_ayah'];?></td>
                                            <td><?php echo $data_siswa['pendidikan_ayah'];?></td>
                                            <td><?php echo $data_siswa['penghasilan'];?></td>
                                            <td><?php echo $data_siswa['alamat_ayah'];?></td>
                                             <td><?php echo $data_siswa['nama_ibu'];?></td>
                                            <td><?php echo $data_siswa['thn_ibu'];?></td>
                                            <td><?php echo $data_siswa['pekerjaan_ibu'];?></td>
                                            <td><?php echo $data_siswa['pendidikan_ibu'];?></td>
                                            <td><?php echo $data_siswa['penghasilan_ibu'];?></td>
                                            <td><?php echo $data_siswa['alamat_ibu'];?></td>
                                            <td><?php echo $data_siswa['nama_wali'];?></td>
                                            <td><?php echo $data_siswa['lahir_wali'];?></td>
                                            <td><?php echo $data_siswa['pekerjaan_wali'];?></td>
                                            <td><?php echo $data_siswa['pendidikan_wali'];?></td>
                                            <td><?php echo $data_siswa['hasil_wali'];?></td>
                                            <td><?php echo $data_siswa['alamat_wali'];?></td>
                                             <td><?php echo $data_siswa['no_wali'];?></td>

		<?php $no++;
	}
	?>
	</tr>
	</tbody>
</table>