<?php
if (isset($_GET['id_user']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {

    $r_username = antiinjection($_GET['id_user']);
    $r_sql = mysqli_query($link, "SELECT * from akun where akun.username = '" . $r_username . "'");
    $r_dt = mysqli_fetch_assoc($r_sql);
    $r_j = mysqli_num_rows($r_sql);
    if ($r_j > 0) {
        ?>
        <h3 class="page-header"><i class="fa fa-list-ol fa-fw fa-2x"></i> Ubah Password Akun</h3>
        <div class="row-fluid placeholders">
            <div class="col-md-8 text-left">
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><i class="fa fa-users fa-fw fa-2x"></i> 
                        Data Akun Mahasiswa
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="?admin=proses_akun">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $r_dt['nim']; ?>" name="rnim" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">username</label>
                                <div class="col-sm-10">
                                    <input type="username" class="form-control" value="<?php echo $r_dt['nim']; ?>" name="rusername" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="rpass1" placeholder="Input Password Baru">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ulangi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="rpass2" placeholder="Ulangi Password Baru">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success" name="reset_akun">Ubah Password <i class="fa fa-refresh"></i></button>
                                    <a class="btn btn-danger" href="?admin=pengaturan_admin">Batal <i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Oh snap! You got an error!</h4>
        <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
        <p>
          <button type="button" class="btn btn-danger">Take this action</button>
          <button type="button" class="btn btn-default">Or do this</button>
        </p>
      </div>
        <?php
    }
}
