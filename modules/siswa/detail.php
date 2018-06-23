            <?php
// include "../../../config/config.php";
$no_daftar=$_GET['no_daftar'];

$sql_detail = mysqli_query($link,"select db_ppdb.tbl_siswa.no_daftar
,db_ppdb.tbl_siswa.nis
,db_ppdb.tbl_siswa.nisn
,db_ppdb.tbl_siswa.nama_lengkap
,db_ppdb.tbl_siswa.tempat_lahir
,db_ppdb.tbl_siswa.tgl_lahir
,db_ppdb.tbl_siswa.jk
,db_ppdb.tbl_siswa.agama
,db_ppdb.tbl_siswa.khusus
,db_ppdb.tbl_siswa.anak_ke
,db_ppdb.tbl_siswa.jml_saudara
,db_ppdb.tbl_siswa.kps
,db_ppdb.tbl_siswa.seri_kps
,db_ppdb.tbl_siswa.alamat
,db_ppdb.tbl_siswa.alat_transportasi
,db_ppdb.tbl_siswa.tempat_tggl
,db_ppdb.tbl_siswa.jarak_sekolah
,db_ppdb.tbl_siswa.telpon
,db_ppdb.tbl_siswa.email
,asal_sekolah
,db_ppdb.tbl_siswa.alamat_sekolah
,db_ppdb.tbl_siswa.noujian_smp
,db_ppdb.tbl_siswa.nilai_un
,db_ppdb.tbl_siswa.nilai_us
,db_ppdb.tbl_siswa.seri_ijazah
,db_ppdb.tbl_siswa.seri_skhun
,db_ppdb.tbl_siswa.nama_ayah
,db_ppdb.tbl_siswa.thn_ayah
,db_ppdb.tbl_siswa.pekerjaan_ayah
,db_ppdb.tbl_siswa.pendidikan_ayah
,db_ppdb.tbl_siswa.penghasilan
,db_ppdb.tbl_siswa.alamat_ayah
,db_ppdb.tbl_siswa.nama_ibu
,db_ppdb.tbl_siswa.thn_ibu
,db_ppdb.tbl_siswa.pekerjaan_ibu
,db_ppdb.tbl_siswa.pendidikan_ibu
,db_ppdb.tbl_siswa.penghasilan_ibu
,db_ppdb.tbl_siswa.alamat_ibu
,db_ppdb.tbl_siswa.nama_wali
,db_ppdb.tbl_siswa.lahir_wali
,db_ppdb.tbl_siswa.pendidikan_wali
,db_ppdb.tbl_siswa.pekerjaan_wali
,db_ppdb.tbl_siswa.hasil_wali
,db_ppdb.tbl_siswa.alamat_wali
,db_ppdb.tbl_siswa.no_wali
,db_ppdb.tbl_siswa.tinggi_badan
,db_ppdb.tbl_siswa.berat_badan
,db_ppdb.tbl_siswa.hobi,
db_ppdb.tbl_siswa.kecamatan,db_ppdb.tbl_siswa.desa,db_ppdb.tbl_siswa.kabupaten,db_ppdb.tbl_siswa.provinsi,
wilayah.tbl_kecamatan.id,wilayah.tbl_kecamatan.nama_kec,wilayah.tbl_kelurahan.id,wilayah.tbl_kelurahan.nama_kel,wilayah.tbl_kota.id,
wilayah.tbl_kota.nama_kota,wilayah.tbl_provinsi.id,wilayah.tbl_provinsi.nama_prov
from db_ppdb.tbl_siswa,wilayah.tbl_kecamatan,wilayah.tbl_kelurahan,wilayah.tbl_kota,wilayah.tbl_provinsi
where db_ppdb.tbl_siswa.kecamatan=wilayah.tbl_kecamatan.id and db_ppdb.tbl_siswa.desa=wilayah.tbl_kelurahan.id and
db_ppdb.tbl_siswa.kabupaten=wilayah.tbl_kota.id and db_ppdb.tbl_siswa.provinsi=wilayah.tbl_provinsi.id and db_ppdb.tbl_siswa.no_daftar='".$no_daftar."'order by db_ppdb.tbl_siswa.no_daftar asc");
$j = mysqli_fetch_array($sql_detail);
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
 <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                   
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong><big>Detail Identitas Peserta Didik Baru</big></strong></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                   
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                                                <!-- Small boxes (Stat box) -->
                          <div class="panel panel-primary">
                                <!-- Default panel contents -->
                                <div class="panel-heading"><i class="fa fa-users fa-fw fa-2x"></i> Detail Identitas Siswa</div>
                                <div class="panel-body">

                                <div class="box-body table-responsive" id="data-mahasiswa">
                                  <div class="row">

                      <div class="col-sm-6">
                                      <table class="table"> 
                                      <strong><p color="Red">I. IDENTITAS SISWA</p></strong>
                                       <tr>
                                              <td width="30%">1. NO Pendaftaran</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['no_daftar'];?> </big></strong></td>
                                              
                                            </tr> 
                                          
                                            <tr>
                                              <td width="30%">2. Nama Lengkap</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['nama_lengkap'];?></big></strong></td>
                                            </tr>
                                            
                                            <tr>
                                              <td width="30%">3. Tempat Tgl Lahir</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['tempat_lahir'].", ".(DateToIndo("$j[tgl_lahir]"));?></big></strong></td>
                                            </tr>
                                           
                                            
                                            <tr>
                                              <td width="30%">4. Alamat</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['alamat'].", Desa ".$j['nama_kel'].", Kec. ".$j['nama_kec'].", Kab. ".$j['nama_kota']."-  ".$j['nama_prov'];?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">5. Anak Ke</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['anak_ke'];?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">6. Jumlah Saudara</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['jml_saudara'];?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">7. Telepon</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['telpon'];?></big></strong></td>
                                            </tr>
                                            
                                            </table>
                                             <table class="table"> 
                                      <strong><p color="Red">II. ASAL SEKOLAH</p></strong>
                                       <tr>
                                              <td width="30%">1. Nama Sekolah</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['asal_sekolah'];?> </big></strong></td>
                                              
                                            </tr>
                                            <tr>
                                              <td width="30%">2. Alamat Sekolah</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['alamat_sekolah'];?> </big></strong></td>
                                              
                                            </tr> 
                                            <tr>
                                              <td width="30%">3. Tahun Ijazah</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['seri_ijazah'];?> </big></strong></td>
                                              
                                            </tr>   
                                            <tr>
                                              <td width="30%">4. Rerata Nilai UN</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['nilai_un']. " Rerata US: ".$j['nilai_us'];?> </big></strong></td>
                                              
                                            </tr>   
</table>
</div>
<div class="col-sm-6">
<table class="table"> 
                                            

                                              <strong><p>III. DATA ORAMNG TUA</p></strong>
                                              
                                            
                                            <tr>
                                              <td width="30%">1. Nama Ayah</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['nama_ayah']; ?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">2. Tahun Lahir</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['thn_ayah']; ?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">3. Pekerjaan Ayah</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['pekerjaan_ayah']; ?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">4. Pendidikan Ayah</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['pendidikan_ayah']; ?></big></strong></td>
                                            </tr>

                                            <tr>
                                              <td width="30%">5. Nama Ibu</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['nama_ibu']; ?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">6. Tahun Lahir</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['thn_ibu']; ?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">7. Pekerjaan Ibu</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['pekerjaan_ibu']; ?></big></strong></td>
                                            </tr>
                                            <tr>
                                              <td width="30%">8. Pendidikan Ibu</td>
                                              <td width="1%">:</td>
                                              <td><strong><big><?php echo $j['pendidikan_ibu']; ?></big></strong></td>
                                            </tr>


                                      </table>
                                  </div>

                                  <div class="col-sm-4">
<table class="table"> 
                                            

                                              <strong><p>IV. ADMINISTRASI dan BERKAS PENDAFTARAN</p></strong>
                                              
                                            
                                            <tr>
                                            <td>
                                            <?php
                                                    $data = array();
                                                    $query = "SELECT tbl_siswa.no_daftar,tbl_siswa.nis,tbl_siswa.nisn,tbl_siswa.nama_lengkap,tbl_siswa.tgl_lahir,tbl_siswa.telpon,
                                                        tbl_syarat.no_daftar,tbl_syarat.syarat
                                                        from tbl_siswa INNER JOIN tbl_syarat ON tbl_syarat.no_daftar=tbl_siswa.no_daftar where tbl_syarat.no_daftar='$no_daftar' order by tbl_syarat.no_daftar asc";
                                                        
                                                    $result = mysqli_query($link, $query);
                                                    
                                                    while ($row = mysqli_fetch_object($result)) {
                                                        $p = $row->syarat;
                                                        ?>
                                                        <div>
                                                            <!--ingat : name harus berupa array (ada tanda []). lalu jika $p ada dalam $data ditambahkan atribute cheked-->
                                                            <input type="checkbox"  checked value="<?php echo $p; ?>" disabled 
                                                            <?php echo in_array($p, $data) ? 'checked' : ''; ?>>
                                                            <?php echo $p; ?>
                                                           <!--  <?php include 'checked.php';?> -->
                                                        </div>
                                                        <?php
                                                    }?>
                                              
                                                
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                <p>Keterangan Berkas:</p>
                                                <?php
                                                $j1 = mysqli_num_rows($result);
                                                        if ($j1 >=6) {
                                                            echo '<span class="badge bg-green"><i class="fa  fa-check-circle" readonly></i> Sudah Lengkap';
                                                        }elseif ($j1 < 6) {
                                                            echo '<span class="badge bg-yellow"><i class="fa   fa-exclamation-triangle " readonly></i> Masih Kurang';
                                                        }

                                                            ?>


                                                </td>
                                              
                                            </tr>
                                            <div class="col-sm-4">
<table class="table"> 
                                            

                                              <strong><p>V. UPLOAD FOTO (3X4)</p></strong>
                                              
                                            
                                            <tr>
                                            <td>
                                            <script type="text/javascript">
function tampilkanPreview(userfile,idpreview)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>
 <form role="form" action="?admin=upload_foto" id="registerForm" method="POST" enctype="multipart/form-data">
Gambar:
<input type="file" name="fgambar" id="userfile" onchange="tampilkanPreview(this,'preview')" />
<br><b>Preview Gambar</b><br>
<img id="preview" width="90px" src="foto/<?php echo"$j[foto]";?>"/>

<div class="modal-footer">
         <button class="btn btn-primary" type="submit" name="kirim"><i class="fa fa-upload"></i> Upload Foto</button>
         <a href="modules/siswa/cetak.php?no_daftar=<?php echo $j['no_daftar'];?>" class="btn btn-success" target=_blank data-toggle="tooltip" data-original-title="Cetak Data <?php echo $j['no_daftar']?>"><i class="fa fa-print"></i> Print</a>
                                        </div>
                                        </form>
                                         </div>
                                                      </td>


                                      </table>
                                  </div>
                                  
                                      </div>
                                      </div>
                                      </div>
                                      </section>

                                        </div>

                                    </div><!-- /.box-body -->
                                    <!-- Main row -->


                                </section><!-- /.Left col -->


                            </section><!-- /.content -->
                        </aside><!-- /.right-side -->
