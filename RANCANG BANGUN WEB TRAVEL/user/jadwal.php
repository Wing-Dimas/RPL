<?php
require "koneksi.php";
require "session.php";
require "noget.php";
$ambil = mysqli_query($koneksi, "SELECT * FROM jadwal INNER JOIN kendaraan USING (id_kendaraan)");
?>
<div class="row row d-flex justify-content-center">
    <?php while ($data = mysqli_fetch_assoc($ambil)) {
        $kursi_tersedia = $data['jumlah_kursi'] - $data['jml_kursi_terisi'];
        $tanggal1 = $data['tgl_estimasi_berangkat'];
        $pecah_brkt = explode(" ", $tanggal1);
        $wkt_brkt = $pecah_brkt[1];
        $tgl_brkt = date('d M Y', strtotime($tanggal1));


        $tanggal2 = $data['tgl_estimasi_tiba'];
        $pecah_tb = explode(" ", $tanggal2);
        $tgl_tb = date('d M Y', strtotime($tanggal2));
        $wkt_tb = $pecah_tb[1];

        if (time() < strtotime($tanggal1)) {

    ?>


            <div class="col-5 main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="../templates/voler-main/dist/assets/images/samples/aerial-panoramic-image-of-sansonvale-lake-X6TCENW.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <p class="d-flex justify-content-between">
                                <a><strong><?= $data['rute_keberangkatan']; ?></strong></a>
                                <a><?= $kursi_tersedia . " " ?> Kursi Tersedia</a>
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
                            <p class="card-text"><strong>Rp.<?= $data['harga']; ?>.-</strong></p>
                            <?php if ($kursi_tersedia <= 0) {
                                echo "<a href='' class='btn btn-light text-white block'>Tiket Habis</a>";
                            } else { ?>
                                <a href="pesan.php?id_jadwal=<?= $data['id_jadwal'] ?>" class="btn btn-primary block">Pesan Tiket</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

    <?php }
    } ?>
</div>