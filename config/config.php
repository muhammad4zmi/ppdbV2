<?php

// These four parameters must be changed dependent on your MySQL settings
$hostdb = 'localhost'; // MySQl host
$userdb = 'root';  // MySQL username
$passdb = '';  // MySQL password
$namedb = 'db_ppdb'; // MySQL database name
// Please uncomment the appropriate statement
$link = mysqli_connect($hostdb, $userdb, $passdb, $namedb);

if (!$link) {
	die('Could not connect: ' . mysqli_error());
}

function antiinjection($data) {
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter_sql;
}

function mail_server() {
    return "info@mamualliminnwanjani.hol.es";
}

function webmail() {
    return "http://webmail1.idhostinger.com/roundcube/";
}

function server() {
    return "http://mamualliminnwanjani.hol.es/";
}


include "cipher.php"; // panggil file nya
$cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
$kunci = "bismillaah"; // kunci
?>