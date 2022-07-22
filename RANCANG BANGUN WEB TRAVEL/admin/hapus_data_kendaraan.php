<?php
include "../koneksi.php";
require "session.php";
// =================== hapus data kantor ================
$idkendaraan = $_GET["idkendaraan"];
// echo $idkantor;die;
$cek_data_relasi_jadwal = "SELECT*FROM jadwal WHERE id_kendaraan = $idkendaraan";
$hasil_cek_jadwal = mysqli_query($koneksi,$cek_data_relasi_jadwal);
// var_dump($hasil_cek_jadwal);die;
if(mysqli_num_rows($hasil_cek_jadwal)>0){
    echo "<script>alert('hapus data yang berelasi dahulu, di data jadwal');document.location.href='jadwal_keberangkatan.php'</script>";
}else{
    $hapus_data_kendaraan = "DELETE FROM kendaraan WHERE id_kendaraan = $idkendaraan";
    $hasil_kendaraan = mysqli_query($koneksi,$hapus_data_kendaraan);
    echo "<script>alert('data berhasil dihapus');document.location.href='data_kendaraan.php'</script>";
    
}
