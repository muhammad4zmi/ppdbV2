<?php

include "cek_login.php";
if (isset($_GET['no_daftar'])) {
    $no_daftar = antiinjection($_GET['no_daftar']);
    $s = mysqli_query($link, "DELETE FROM tbl_siswa where no_daftar='" . $no_daftar . "'");
    // $j = mysqli_query($link, "DELETE FROM tbl_syarat where no_daftar='".$no_daftar."'")
    if ($s) {
        $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Berhasil!</strong> Data Siswa Berhasil Di Hapus.
                  </div>";
        $_SESSION['alert'] = $alert;
    } else {
        $alert = "<div class=\"alert alert-danger alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <strong>Gagal!</strong><br/> Data Siswa Gagal Di Hapus.
                  </div>";
        $_SESSION['alert'] = $alert;
    }
    ?>
    <script type="text/javascript">document.location = "index.php?admin=dt_siswa";</script>
    <?php

}