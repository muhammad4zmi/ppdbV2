<?php
$id=$_GET['ID'];
//include "config/koneksi.php";
$query="delete from inbox where ID='$id'";
$hasil=mysqli_query($link,$query);
if($query){
		$alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-check\"></i>
                    <strong>Info!</strong> Data Berhasil Di Hapus.
                  </div>";
    $_SESSION['alert'] = $alert;
} else {
    $alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data Gagal dihapus..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
}
?>
    <script type="text/javascript">document.location = "index.php?admin=inbox";</script>
    <?php