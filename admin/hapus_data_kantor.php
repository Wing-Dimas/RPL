<?php
include "../koneksi.php";
require "session.php";

// =================== hapus data kantor ================
$idkantor = $_GET["idkantor"];
// echo $idkantor;die;
$cek_data_relasi_kantor = "SELECT*FROM pegawai WHERE id_kantor = $idkantor";
$hasil_cek_kantor = mysqli_query($koneksi,$cek_data_relasi_kantor);
// var_dump($hasil_cek_kantor);die;
if(mysqli_num_rows($hasil_cek_kantor)>0){
    echo "<script>alert('hapus data yang berelasi dahulu, di data pegawai');document.location.href='data_pegawai.php'</script>";
}else{
    $hapus_data_kantor = "DELETE FROM kantor WHERE id_kantor = $idkantor";
    $hasil_kantor = mysqli_query($koneksi,$hapus_data_kantor);
    echo "<script>alert('data berhasil dihapus')</>";
    header("location:dashboard.php");
    
}
