<?php
session_start();
session_destroy();
header("location:http://localhost/ppdbApp/login.php");
?>