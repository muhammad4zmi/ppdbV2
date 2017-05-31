<?php
if (!isset($_SESSION['admin-username'])) {
    header("location:../../login-form.php");
}
include "lap_user.php";
?>
<h3 class="page-header"><i class="fa fa-list-ol fa-fw fa-2x"></i> Halaman Pengaturan Akun
    <form class="navbar-form navbar-right" method="POST" action="?admin=cari_akun">
        <img src="../style/img/search-ico.png" alt="search-ico" width="45px" height="45px"> 
        <input type="text" class="tultip form-control" name="cari" placeholder="Cari Mahasiswa..." required="" data-placement="bottom" title="" data-toggle="tooltip" data-original-title="Cari Berdasarkan NIM">
    </form></h3>
<div class="row-fluid">
    <div class="col-md-offset-2 col-md-7">
        <?php
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
        } unset($_SESSION['alert']);
        ?>
    </div>
</div>
<div class="row-fluid placeholders">
    <div class="col-md-8 text-left">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading"><i class="fa fa-users fa-fw fa-2x"></i> 
                Data Akun Mahasiswa
            </div>
            <div class="panel-body">
                <ul id="myTab" class="nav nav-tabs">
                    <?php
                    $cek_angk = mysqli_query($link, "select mahasiswa.angkatan from mahasiswa group by angkatan");
                    while ($a_angk = mysqli_fetch_assoc($cek_angk)) {
                        ?>
                        <li class=""><a href="#<?php echo $a_angk['angkatan']; ?>" data-toggle="tab"><?php echo $a_angk['angkatan']; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <!--bagian isi-->
                <div id="myTabContent" class="tab-content">
                    <?php
                    $cek_angk2 = mysqli_query($link, "select mahasiswa.angkatan from mahasiswa group by angkatan");
                    while ($a_angk2 = mysqli_fetch_assoc($cek_angk2)) {
                        ?>
                        <div class="tab-pane fade" id="<?php echo $a_angk2['angkatan']; ?>">
                            <?php
                            view_angkatan($a_angk2['angkatan'], $link);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-left">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-cogs fa-2x"></i> Manajemen Akun Administrator</div>
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed btn">
                                    <i class="fa fa-refresh fa-lg"></i> Ubah Email
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                            <?php
                            $q_akun = mysqli_query($link, "SELECT email from admin where username = '" . $_SESSION['admin-username'] . "'");
                            $dt = mysqli_fetch_assoc($q_akun);
                            ?>
                            <div class="panel-body">
                                <form role="form" action="?admin=ubah_admin_email" method="POST">
                                    <div class="form-group">
                                        <label>Email Lama</label>
                                        <input type="email" class="form-control" value="<?php echo $dt['email']; ?>" name="email_lama" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Perubahan</label>
                                        <input type="email" class="form-control" placeholder="Email Baru" name="email_baru" required="">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="ubah_email"><i class="fa fa-check-square-o"></i> Ubah Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed btn">
                                    <i class="fa fa-unlock-alt fa-lg"></i> Ubah Password
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalEmail">
                                    Ganti Password Akun <?php ?> <i class="fa fa-edit fa-lg"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i> Ubah Password</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="POST" action="?admin=ubah_pass">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="inputNim" class="col-lg-4 control-label">Password Lama</label>
                                                            <div class="col-lg-7">
                                                                <input class="form-control" id="inputNim" type="password" name="pass_lama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputNim" class="col-lg-4 control-label">Password Baru</label>
                                                            <div class="col-lg-7">
                                                                <input class="form-control" id="inputNim" type="password" name="pass_baru">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputNim" class="col-lg-4 control-label">Ulangi Password Baru</label>
                                                            <div class="col-lg-7">
                                                                <input class="form-control" id="inputNim" type="password" name="ulangi_pass">
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar <i class="fa fa-times fa-fw fa-lg"></i></button>
                                                            <button type="submit" class="btn btn-success" name="ubah_p">Ubah Password <i class="fa fa-refresh fa-fw fa-lg"></i></button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>