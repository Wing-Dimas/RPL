<?php
require "koneksi.php";
require "session.php";
require "noget.php";

$id = $_SESSION['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM booking INNER JOIN jadwal USING(id_jadwal) INNER JOIN kendaraan USING(id_kendaraan) WHERE id_user  = '$id' ORDER BY id_booking Desc") ?>

<div class="row d-flex justify-content-center">

    <?php while ($data = mysqli_fetch_assoc($ambil)) {
        $alertditolak = "";

        $tanggal1 = $data['tgl_estimasi_berangkat'];
        $pecah_brkt = explode(" ", $tanggal1);
        $wkt_brkt = $pecah_brkt[1];
        $tgl_brkt = date('d M Y', strtotime($tanggal1));
        $set_waktu_autobatal = 1800;

        $tanggal2 = $data['tgl_estimasi_tiba'];
        $pecah_tb = explode(" ", $tanggal2);
        $tgl_tb = date('d M Y', strtotime($tanggal2));
        $wkt_tb = $pecah_tb[1];
        $ambilbooking = $data['id_booking'];
        $ambilidjadwal = $data['id_jadwal'];
        $cekbayar = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_booking='$ambilbooking'");
        $cekstatusbayar = mysqli_fetch_assoc($cekbayar);
        if (date(time()) - strtotime($data['tanggal_booking']) > $set_waktu_autobatal and mysqli_num_rows($cekbayar) == 0) {
            mysqli_query($koneksi, "UPDATE booking SET status = 'dibatalkan' WHERE id_booking = '$ambilbooking'");
        }
        if (mysqli_num_rows($cekbayar) > 0 and $cekstatusbayar['status_pembayaran'] == "ditolak") {
            $alertditolak = "Pembayaran Ditolak";
        }
        if (time() < strtotime($tanggal2)) {
            $warnabutton = "";
            if ($data["status"] == "lunas") {
                $warnabutton = "success";
            } elseif ($data["status"] == "belum lunas") {
                $warnabutton = "warning";
            } else {
                $warnabutton = "danger";
            } ?>



            <div class="col-5">
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
                                <a class="btn btn-<?= $warnabutton ?> btn-sm round"><?= $data['status'] . "  " . $alertditolak; ?></a>
                            </p>
                            <?php $a = date(time()) - strtotime($data['tanggal_booking']);
                            $b = $set_waktu_autobatal - $a;
                            if ($b > 0) {
                                $a = round($b / 60);
                                echo ("Sisa Waktu : " . $a . "Menit");
                            } ?>

                        </div>
                    </div>
                    <?php
                    ?>
                   
                    <?php

                    if (mysqli_num_rows($cekbayar) > 0 and $cekstatusbayar['status_pembayaran'] == "") { ?>
                        <a class="btn btn-primary ">Menunggu Konfirmasi Pembayaran</a>
                    <?php } elseif ($data["status"] == "lunas") {
                        $warnabutton = "success" ?>
                        <a href="print_tiket.php?id_booking=<?= $data['id_booking'] ?>" class="btn btn-primary ">Download Tiket</a>
                    <?php } elseif ($data["status"] == "belum lunas") {
                        $warnabutton = "warning" ?>
                        <a href="pembayaran.php?id_booking=<?= $data['id_booking'] ?>" class="btn btn-primary ">Pembayaran</a>
                    <?php } else {
                        $warnabutton = "danger" ?>
                        <a class="btn btn-danger ">Dibatalkan</a>
                    <?php } ?>
                </div>


            </div>

    <?php }
    } ?>
</div>
<?php
// echo (date(time()) - strtotime("2022-06-16 23:00:00")) . "<br>";
// echo date(time()) . "<br>";
// $tanggal = "2015-10-20 00:00";
// $pecah_tgl = explode("-", $tanggal);
// $thn = $pecah_tgl[0];
// $bln = $pecah_tgl[1];
// $pecah_tgl_jam = explode(" ", $pecah_tgl[2]);
// $tgl = $pecah_tgl_jam[0];
// $wkt = $pecah_tgl_jam[1];

// echo $tgl . "-" . $bln . "-" . $thn . "-" . $wkt;
$tgl = date('Y-m-d H:i:s');
echo ($tgl)
?>