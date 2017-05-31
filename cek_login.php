<?php
//session_start();
// mengecek ada tidaknya session untuk username
if (!isset($_SESSION['admin-username']))
{
    header("location:login.php");
exit;
}
?>