<?php

if (isset($_POST['ubah_email']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_lama = antiinjection($_POST['email_lama']);
    $email_baru = antiinjection($_POST['email_baru']);

    $qmail = mysqli_query($link, "SELECT email from admin where email='" . $email_lama . "' and username='" . $_SESSION['admin-username'] . "'");
    $ada = mysqli_fetch_assoc($qmail);
    if ($ada['email'] === $email_lama) {
        $r_akun = mysqli_query($link, "update admin set email='" . $email_baru . "' where username='" . $_SESSION['admin-username'] . "'");
        $info = "<div class='alert alert-dismissable alert-success' id='pesan'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <big><strong>Berhasil!</strong></big> Email Anda Berhasil Di Ubah Menjadi <strong>$email_baru</strong>.
             </div>";
        $_SESSION['alert'] = $info;
    } else {
        $info = "<div class='alert alert-dismissable alert-warning' id='pesan'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <big><strong>Gagal!</strong></big> Email Gagal Di ubah. Ulangi Kembali.
             </div>";
        $_SESSION['alert'] = $info;
    }
    ?>
    <script>window.location = 'index.php?admin=pengaturan_admin';</script>
    <?php

}