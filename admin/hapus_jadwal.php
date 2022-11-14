<?php
include "../koneksi.php";
require "session.php";
$idjadwal = $_GET["id"];
$cek_id = "SELECT*FROM booking WHERE id_jadwal = $idjadwal";
$hasil_cek = mysqli_query($koneksi,$cek_id);
if(mysqli_num_rows($hasil_cek)==0){
$hapus_jadwal = "DELETE FROM jadwal WHERE id_jadwal = $idjadwal";
$hasil_jadwal = mysqli_query($koneksi,$hapus_jadwal);
echo "<script>alert('data berhasil dihapus');document.location.href='jadwal_keberangkatan.php'</script>";
}else{
    echo "<script>alert('jadwal tidak bisa dihapus, karena sudah ada yang pesan');document.location.href='jadwal_keberangkatan.php'</script>";
}