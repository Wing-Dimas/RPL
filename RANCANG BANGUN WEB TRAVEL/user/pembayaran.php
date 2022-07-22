<?php
session_start();
require "session.php";
require "koneksi.php";
$idbooking = $_GET['id_booking'];
$ambil = mysqli_query($koneksi, "SELECT * FROM jadwal INNER JOIN kendaraan USING (id_kendaraan) INNER JOIN booking ON jadwal.id_jadwal = booking.id_jadwal WHERE booking.id_booking = '$idbooking'");
$data = mysqli_fetch_assoc($ambil);
$totalharga = $data['harga'] * $data['jml_booking'];
$getidjadwal = $data['id_jadwal'];
$tglbayar = date('Y-m-d H:i:s');
$alert1 = "";
$alert2 = "";
$alertcolor = "primary";
$type = "";



if (isset($_POST['submit'])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["bukti"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $type = "d-none";

    // Check if image file is a actual image or fake image
    if (isset($_POST["bukti"])) {
        $check = getimagesize($_FILES["bukti"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $expld = explode('.', $_FILES["bukti"]["name"]);
        $ext = $expld[1];
        $filn = $expld[0];
        $target_file = "gambar/" . $filn . rand() . '.' . $ext;
        // if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        //     echo "The file " . htmlspecialchars(basename($_FILES["bukti"]["name"])) . " has been uploaded.";
        // } else {
        //     echo "Sorry, there was an error uploading your file.";
        // }
    }

    // Check file size
    // if ($_FILES["bukti"]["size"] > 500000) {
    //     $alert2 =  "Sorry, your file is too large.";
    //     $uploadOk = 0;
    //     $alertcolor  = "danger";
    // }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $alert2 =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $alertcolor  = "danger";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $alert2 =  $alert2 . "Sorry, your file was not uploaded.";
        $alertcolor  = "danger";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
            $alert2 =  "The file " . htmlspecialchars(basename($_FILES["bukti"]["name"])) . " has been uploaded.";
            $tambah = "INSERT INTO pembayaran VALUES ('','$idbooking','$tglbayar','$totalharga','$target_file','')";
            $query = mysqli_query($koneksi, $tambah);
            if ($query) {
                $alert1 = "Bukti pembayaran telah dikirim, menunggu konfirmasi admin. Silakan kembali ke halaman tiket untuk mengecek status pembayaran";
            } else {
                $alert1 = "Bukti pembayaran gagal dikirim ! ";
                $alertcolor  = "danger";
            }
        } else {
            $alert2 = "Sorry, there was an error uploading your file.";
            $alertcolor  = "danger";
        }
    }
    // var_dump($target_file);
}

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
</head>

<body>


    <div class="container-sm p-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pembayaran</h4>
                </div>
                <div class="card-body">
                    <?php
                    $ambilbooking = $data['id_booking'];
                    $ambilidjadwal = $data['id_jadwal'];
                    $set_waktu_autobatal = 1800;
                    $cekbayar = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_booking='$ambilbooking'");
                    $cekstatusbayar = mysqli_fetch_assoc($cekbayar);
                    if (date(time()) - strtotime($data['tanggal_booking']) > $set_waktu_autobatal and mysqli_num_rows($cekbayar) == 0) {
                        $type = "d-none"; ?>
                        <div class="alert alert-danger ">
                            <p><strong>Pesanan Dibatalkan Karena Melewati Batas Waktu Pembayaran</p>
                            <p><?= $alert2 ?></p>
                        </div>
                        <a href="app.php?page=tiket" class="btn btn-light rounded">Kembali ke halaman tiket</a>
                    <?php } ?>
                    <div class="row <?= $type ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disabledInput">Rute</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['rute_keberangkatan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Tanggal Berangkat</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['tgl_estimasi_berangkat'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Tanggal Tiba</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['tgl_estimasi_tiba'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="disabledInput">Kendaraan</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $data['nama_kendaraan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Jumlah Kursi</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" placeholder="Jumlah Kursi" name="jml_booking" value="<?= $data['jml_booking'] ?>">
                            </div>
                        </div>
                        <div class=col-md-6>
                            <div class="form-group">
                                <label for="disabledInput">Total Harga</label>
                                <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="<?= $totalharga ?>">
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type=hidden name="id_booking" value="<?= $id_booking ?>">

                                <h4 class="card-title">Upload Bukti Pembayaran</h4>
                                <div class="card-body">

                                    <p>Pembayaran Melalui :</p>
                                    <ul>
                                        <li>Rekening BNI : <b> 1109137892347 </b> A/N Fikri</li>
                                        <li>Rekening BCA :<b> 0999137892789 </b>/N Fikri </li>
                                        <li>DANA : <b>087391237</b></li>
                                    </ul>
                                </div>

                                <div class="form-file">
                                    <input name="bukti" type="file" class="form-file-input" id="customFile" required>
                                    <label class="form-file-label" for="customFile">
                                        <span class="form-file-button">Browse</span>
                                    </label>
                                </div>
                                <br>

                                <div class="d-flex justify-content-between">
                                    <button type=submit name="submit" class="btn btn-info rounded">Bayar</button>
                                    <a href="app.php?page=tiket" class="btn btn-light rounded">Kembali ke halaman tiket</a>
                                </div>
                            </form>

                        </div>

                    </div>


                    <?php if (isset($_POST['submit'])) {
                    ?>
                        <div class="card-body ">
                            <div class="alert alert-<?= $alertcolor ?> ">
                                <p><strong><?= $alert1 ?></strong></p>
                                <p><?= $alert2 ?></p>
                            </div>
                            <a href="app.php?page=tiket" class="btn btn-light rounded">Kembali ke halaman tiket</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>