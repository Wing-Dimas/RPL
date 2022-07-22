<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
  case 'dashboard': // $page == home (jika isi dari $page adalah home)
    include "dashboard.php"; // load file home.php yang ada di folder views
    break;

  case 'tiket': // $page == berita (jika isi dari $page adalah berita)
    include "tiket.php"; // load file berita.php yang ada di folder views
    break;

  case 'jadwal': // $page == tentang (jika isi dari $page adalah tentang)
    include "jadwal.php"; // load file tentang.php yang ada di folder views
    break;

  case 'riwayat': // $page == tentang (jika isi dari $page adalah tentang)
    include "riwayat.php"; // load file tentang.php yang ada di folder views
    break;
  case 'profil': // $page == tentang (jika isi dari $page adalah tentang)
    include "profil.php"; // load file tentang.php yang ada di folder views
    break;
  case 'gantiprofil': // $page == tentang (jika isi dari $page adalah tentang)
    include "ganti_profil.php"; // load file tentang.php yang ada di folder views
    break;
  default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
    include "dashboard.php";
}
