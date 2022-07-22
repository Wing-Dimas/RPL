<?php
session_start();
require "session.php";
require "koneksi.php";
$getidjadwal = $_GET['id_jadwal'];
$ambil = mysqli_query($koneksi, "SELECT * FROM jadwal INNER JOIN kendaraan USING (id_kendaraan) WHERE id_jadwal = '$getidjadwal'");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/app.css">
    <link rel="stylesheet" href="../templates/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    $data = mysqli_fetch_assoc($ambil);
    $kursi_tersedia = $data['jumlah_kursi'] - $data['jml_kursi_terisi'];
    $tanggal1 = $data['tgl_estimasi_berangkat'];
    $pecah_brkt = explode(" ", $tanggal1);
    $wkt_brkt = $pecah_brkt[1];
    $tgl_brkt = date('d M Y', strtotime($tanggal1));
    $alert_kelebihan_kursi = "";

    $tanggal2 = $data['tgl_estimasi_tiba'];
    $pecah_tb = explode(" ", $tanggal2);
    $tgl_tb = date('d M Y', strtotime($tanggal2));
    $wkt_tb = $pecah_tb[1];
    if (isset($_POST['submit'])) {
        $iduser = $_SESSION['id'];
        $tglbooking = date('Y-m-d H:i:s');
        $idjadwal = $_POST['id_jadwal'];
        $jml = htmlspecialchars($_POST['jml_booking']);
        $status = "belum lunas";
        if ($jml > $kursi_tersedia) {
            $alert_kelebihan_kursi = "Jumlah melebihi kapasistas kursi Tersedia!";
        } else {
            $tambah = "INSERT INTO booking VALUES ('','$iduser','$tglbooking','$idjadwal','$jml','$status')";
            $query = mysqli_query($koneksi, $tambah);
            $ambilbooking = mysqli_query($koneksi, "SELECT * FROM booking ORDER BY id_booking DESC LIMIT 1");
            $querybooking = mysqli_fetch_assoc($ambilbooking);
            if ($query) { ?>
                <script>
                    Swal.fire({
                        title: 'BERHASIL',
                        text: "Pemesanan Berhasil",
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "pembayaran.php?id_booking=<?= $querybooking['id_booking'] ?>";
                        }
                    })
                </script>
            <?php } else { ?>
                <script>
                    Swal.fire({
                        title: 'GAGAL',
                        text: "Pemesanan gagal",
                        icon: 'error',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "app.php?page=jadwal";
                        }
                    })
                </script>
    <?php }
        }
    } ?>
    <div class="container-sm p-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pemesanan</h4>
                </div>

                <div class="card-body">
                    <div class="col">
                        <div class="row-md-6">
                            <div class="form-group">
                                <label for="disabledInput">Rute</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['rute_keberangkatan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Tanggal Berangkat</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $tgl_brkt . " " . $wkt_brkt ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Tanggal Tiba</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $tgl_tb . " " . $wkt_tb ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Kendaraan</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['nama_kendaraan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Harga</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['harga'] ?>">
                            </div>
                            <form action="" method="POST">
                                <input type=hidden name="id_jadwal" value="<?= $getidjadwal ?>">
                                <div class="form-group">
                                    <label for="basicInput">Jumlah Kursi</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="Jumlah Kursi" name="jml_booking" required>
                                    <a class="text-danger"><?= $alert_kelebihan_kursi ?></a>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type=submit name="submit" class="btn btn-info rounded">Pesan</button>
                                    <a href="app.php?page=jadwal" class="btn btn-primary rounded">Kembali</a>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../templates/voler-main/dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="../templates/voler-main/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../templates/voler-main/dist/assets/js/app.js"></script>

    <script src="../templates/voler-main/dist/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../templates/voler-main/dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../templates/voler-main/dist/assets/js/pages/dashboard.js"></script>

    <script src="../templates/voler-main/dist/assets/js/main.js"></script>

</body>


</html>