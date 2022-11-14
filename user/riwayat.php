<?php
require "koneksi.php";
require "session.php";
require "noget.php";
$id = $_SESSION['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM booking INNER JOIN jadwal USING(id_jadwal) INNER JOIN kendaraan USING(id_kendaraan) WHERE id_user  = '$id'") ?>
<div class="row d-flex justify-content-center">

    <?php while ($data = mysqli_fetch_assoc($ambil)) {
        $tanggal1 = $data['tgl_estimasi_berangkat'];
        $pecah_brkt = explode(" ", $tanggal1);
        $wkt_brkt = $pecah_brkt[1];
        $tgl_brkt = date('d M Y', strtotime($tanggal1));


        $tanggal2 = $data['tgl_estimasi_tiba'];
        $pecah_tb = explode(" ", $tanggal2);
        $tgl_tb = date('d M Y', strtotime($tanggal2));
        $wkt_tb = $pecah_tb[1];
        if (time() > strtotime($tanggal1) and $data['status'] == 'lunas') { ?>


            <div class="row">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <p class="d-flex justify-content-between">
                                <a><strong><?= $data['rute_keberangkatan']; ?></strong></a>
                                <a><?= $data['jml_booking'] . " "; ?> Kursi Dipesan</a>

                            </p>
                            <p class="d-flex justify-content-between">
                                <a><?= $wkt_brkt; ?></a>
                                <a><?= $wkt_tb; ?></a>
                            </p>
                            <p class="card-text text-center"><strong>></strong></p>
                            <p class="d-flex justify-content-between">
                                <a><?= $tgl_brkt; ?></a>
                                <a><?= $tgl_tb; ?></a>
                            </p>
                            <p><?= $data['nama_kendaraan']; ?></p>
                            <p class="d-flex justify-content-between">
                                <a><strong>Rp.<?= $data['harga']; ?>.-</strong></a>
                            </p>

                        </div>
                    </div>
                    <a href="" class="btn btn-Secondary ">Detail</a>
                </div>

            </div>

    <?php }
    } ?>
</div>