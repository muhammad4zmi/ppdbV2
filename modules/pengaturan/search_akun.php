<?php
if (!isset($_SESSION['admin-username'])) {
    header("location:login-form.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cari = antiinjection($_POST['cari']);
    $query = "SELECT akun.username,akun.email,mahasiswa.nim,mahasiswa.nama_mhs,mahasiswa.jurusan,
                    mahasiswa.prodi,mahasiswa.angkatan FROM akun,mahasiswa
                    where mahasiswa.nim=akun.nim AND mahasiswa.nim LIKE '%" . $cari . "%'";
    $hasil = mysqli_query($link, $query);
    ?>
    <h3 class="page-header"><i class="fa fa-list-ol fa-fw fa-2x"></i> Pencarian Data Akun Mahasiswa</h3>
    <div class="row-fluid placeholders">
        <div class="col-md-12 text-left">
            <?php
            $num = mysqli_num_rows($hasil);
            if ($num > 0) {
                $no = 1;
                ?>
                <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Berhasil!</h4>
                    <p>Hasil Pencarian : <big><strong><?php echo $num; ?></strong></big> Data Ditemukan.</p>
                    <p>
                        <a type="button" class="btn btn-warning" href="?admin=pengaturan_admin"><i class="fa fa-backward"></i> Kembali Ke Menu Lihat Laporan</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CariLagi"><i class="fa fa-search-plus"></i> Pencarian Baru</button>
                    </p>
                </div>
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><i class="fa fa-users fa-fw fa-2x"></i> 
                        Data Penilaian Kegiatan Mahasiswa
                    </div>
                    <table class='table table-striped'>
                        <thead>
                        <td><big><b><i class='icon-file icon-white'></i> #</b></big></td>
                        <td><big><b><i class='icon-user icon-white'></i>Username</b></big></td>
                        <td><big><b><i class='icon-barcode icon-white'></i>Email</b></big></td>
                        <td><big><b><i class='icon-barcode icon-white'></i>NIM Mahasiswa</b></big></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_array($hasil)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><a class="btn btn-success btn-xs" data-toggle="modal" data-target="#<?php echo $data['nim']; ?>"><?php echo $data['nim']; ?></a></td>
                            <div class="modal fade" id="<?php echo $data['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Identitas Mahasiswa <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>
                                                <div class="panel-body">
                                                    Nama : <?php echo $data['nama_mhs']; ?><br/>
                                                    Jurusan : <?php echo $data['prodi'] . "/" . $data['jurusan']; ?><br/>
                                                    Angkatan : <?php echo $data['angkatan']; ?>
                                                </div>
                                            </div>


                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <td>
                                <a href="#?id=<?php echo $data['username']; ?>" onclick="return confirm('Anda yakin menghapus file dengan Nama <?php echo $data['nama_asdos']; ?> ?');">
                                    <i class='fa fa-trash-o fa-2x'></i>
                                </a>
                            </td>
                            <td>
                                <a href="#?id=<?php echo $data['username']; ?>">
                                    <i class='fa fa-refresh fa-2x'></i>
                                </a>
                            </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>Mohon Maaf!</h4>
                        <p>Data yang Anda Cari Tidak Ada.</p>
                        <p>
                            <a type="button" class="btn btn-danger" href="?admin=pengaturan_admin"><i class="fa fa-backward"></i> Kembali Ke Menu Lihat Laporan</a>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CariLagi"><i class="fa fa-search-plus"></i> Ulangi Pencarian</button>
                        </p>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>Mohon Maaf!</h4>
                    <p>Anda Belum Menginputkan Data Pencarian.</p>
                    <p>
                        <a type="button" class="btn btn-warning" href="?admin=pengaturan_admin"><i class="fa fa-backward"></i> Kembali Ke Menu Lihat Laporan</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CariLagi"><i class="fa fa-search-plus"></i> Ulangi Pencarian</button>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="CariLagi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                Isi Data Pencarian : <form class="navbar-form" method="POST" action="?admin=cari_akun">
                    <img src="../style/img/search-ico.png" alt="search-ico" width="45px" height="45px"> 
                    <input type="text" class="tultip form-control" name="cari" placeholder="Cari Mahasiswa..." required="" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Cari Berdasarkan NIM">
                </form>
            </div>
            <div class="modal-footer text-left">
                <i>Cari Data Berdasarkan Nim Mahasiswa Atau Nama Mahasiswa. . .</i>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->