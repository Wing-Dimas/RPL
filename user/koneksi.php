<?php
date_default_timezone_set("Asia/Jakarta");
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_travel2";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) {
    die("Koneksi Gagal:" . mysqli_connect_error());
}
