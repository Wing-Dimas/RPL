<?php
session_start();
require "koneksi.php";
require "session.php";
$booking = $_GET['id_booking'];
$id = $_SESSION['id'];
$ambildatauser =  mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
$ambil = mysqli_query($koneksi, "SELECT * FROM jadwal INNER JOIN kendaraan USING (id_kendaraan) INNER JOIN booking ON jadwal.id_jadwal = booking.id_jadwal WHERE booking.id_booking = '$booking'");
$datauser = mysqli_fetch_assoc($ambildatauser);
$data = mysqli_fetch_assoc($ambil)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/app.css">
    <link rel="stylesheet" href="../templates/style.css">
</head>

<body>
    <div class="row d-flex justify-content-center m-5">
        <div id="div1">

            <?php for ($i = 1; $i <= $data['jml_booking']; $i++) {
                $tanggal1 = $data['tgl_estimasi_berangkat'];
                $pecah_brkt = explode(" ", $tanggal1);
                $wkt_brkt = $pecah_brkt[1];
                $tgl_brkt = date('d M Y', strtotime($tanggal1));


                $tanggal2 = $data['tgl_estimasi_tiba'];
                $pecah_tb = explode(" ", $tanggal2);
                $tgl_tb = date('d M Y', strtotime($tanggal2));
                $wkt_tb = $pecah_tb[1]; ?>


                <div class="row">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a>
                                        <table>
                                            <tr>
                                                <th>No Tiket </th>
                                                <td>: <?= $booking . "_" . $i ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pemesan </th>
                                                <td>: <?= $datauser['nama_user'] ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Rute </th>
                                                <td>: <?= $data['rute_keberangkatan']; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Berangkat </th>
                                                <td>: <?= $tgl_brkt . " " . $wkt_brkt; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Tiba </th>
                                                <td>: <?= $tgl_tb . " " . $wkt_tb; ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Harga per Kursi </th>
                                                <td>: <?= $data['harga'] ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Kendaraan </th>
                                                <td>: <?= $data['nama_kendaraan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Plat Nomor </th>
                                                <td>: <?= $data['plat_nomer']; ?></td>
                                            </tr>


                                        </table>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            <?php
            } ?>
        </div>
        <button onclick="printContent('div1')">Print Content</button>
    </div>

    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
</body>

</html>