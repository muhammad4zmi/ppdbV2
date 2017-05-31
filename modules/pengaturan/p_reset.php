<?php
if (isset($_POST['reset_akun']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $rnim = antiinjection($_POST['rnim']);
    $rusername = antiinjection($_POST['rusername']);
    $rpass1 = antiinjection($_POST['rpass1']);
    $rpass2 = antiinjection($_POST['rpass2']);

    $passwd1 = $cipher->encrypt($rpass1, $kunci);
    $passwd2 = $cipher->encrypt($rpass2, $kunci);

    $r_akun = mysqli_query($link, "update akun set nim='" . $rnim . "',password='" . md5($passwd1) . "',
                            password2='" . $passwd2 . "' where nim='" . $rnim . "'");
    if ($r_akun) {
        $m_sql = mysqli_query($link, "SELECT email from akun where username ='" . $rusername . "'");
        $mail_to = mysqli_fetch_assoc($m_sql);
        ?>
        <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-check"></i> Sukses !</h4>
            <p>Password Akun Dengan Nim <b><?php echo $rnim; ?></b> dan Username <b><?php echo $rusername; ?></b> Berhasil Dirubah</p>
        </div>
        <?php
        $mail_from = mail_server();
        $subject = "Reset Password";
        $pesan = "<div style='margin: 20px 0; padding: 20px; border-left: 3px solid #eee;background-color: #f4f8fa; border-color: #bce8f1;'>
                    <h4><strong>Hi $rusername</strong>, Permintaan Perubahan Password Anda Berhasil Di Proses</h4>
                    <p>Gunakan Username dan Password dibawah ini. . .</p>
                    <p>Username : $rusername</p>
                    <p>Password : $rpass1</p>
                  </div>";
        $message = $pesan;
        $headers = "From: $mail_from\r\n";
        $headers .= "Reply-To: $mail_from\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        if (@mail($mail_to['email'], $subject, $message, $headers)) {
            ?>
            <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="fa fa-check-square-o"></i> Informasi !</h4>
                <p><i class="fa fa-envelope fa-lg fa-lg"></i> Perubahan Password Akun Berhasil Terkirim ke Email :<br/>
                   <i class="fa fa-envelope fa-lg"></i> <?php echo $mail_to['email']; ?>
                </p>
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="fa fa-exclamation-triangle"></i> Informasi !</h4>
                <p>Perubahan Password Akun Gagal Terkirim ke Email :<br/>
                   <i class="fa fa-envelope fa-lg"></i> <?php echo $mail_to['email']; ?></p>
                <p><i class="label label-danger">Terjadi Kesalahan Pengiriman Email. Cek Email Atau Koneksi Internet Anda.</i></p>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-times"></i> Terjadi Kesalahan!</h4>
            <p>Password Akun Gagal Dirubah</p>
        </div>
        <?php
    }
    ?>
    <p>
        <a href="?admin=pengaturan_admin" class="btn btn-danger"><i class="fa fa-chevron-left fa-lg"></i> Kembali Ke Pengaturan</a>
    </p>
    <?php
}
