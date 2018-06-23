<?php
mysql_connect('localhost','root','');
mysql_select_db('db_ppdb');
//include "config/config.php";
    function ubahformatTgl($tanggal) {
        $pisah = explode('/',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
    }
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $ubahtgl = ubahformatTgl($start);
    $ubahtgl1 = ubahformatTgl($end);
    $s = mysql_query("INSERT Into events values('', '$title', '$ubahtgl','$ubahtgl1')");
    if ($s) {

        //Jika Sukses
        ?>
            <script language="JavaScript">
                alert('Event Berhasil di buat');
                document.location='http://localhost/ppdbAppV2/index.php';
            </script>
        <?php
    }
        ?>