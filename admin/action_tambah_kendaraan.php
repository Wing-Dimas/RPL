<?php
    include "../koneksi.php";
    require "session.php";
    
        $nama_kendaraan = $_POST["nama_kendaraan"];
        $plat_nomer = $_POST["plat_nomer"];
        $jumlah_kursi = $_POST["jumlah_kursi"];

        $tambah_data = "INSERT INTO kendaraan VALUES(
            NULL,
            $nama_kendaraan,
            $plat_nomer,
            $jumlah_kursi
        )";
        // var_dump($tambah_data);
        $hasil = mysqli_query($koneksi,$tambah_data);
        header("location:data_kendaraan");
