<?php
include "../koneksi.php";
require "session.php";


// ============== hapus data pegawai =====================
$idpegawai = $_GET["idpegawai"];
$hapus_pegawai = "DELETE FROM pegawai WHERE id_pegawai = $idpegawai";
$hasil_hapus_pegawai = mysqli_query($koneksi,$hapus_pegawai);
echo "<script>alert('data berhasil dihapus');document.location.href = 'data_pegawai.php'</script>";
