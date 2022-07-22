<?php
require "../koneksi.php";
require "session.php";
$tampil_data = "SELECT*FROM pembayaran";
$hasil = mysqli_query($koneksi, $tampil_data);

if (isset($_GET["idterima"])) {
    $id_terima = $_GET["idterima"];
    $data_terima = "UPDATE pembayaran SET status_pembayaran = 'diterima' 
    WHERE id_pembayaran = '$id_terima'";
    $hasil_update_terima = mysqli_query($koneksi, $data_terima);
}

if (isset($_GET["idtolak"])) {
    $id_tolak = $_GET["idtolak"];
    $data_tolak = "UPDATE pembayaran SET status_pembayaran = 'ditolak' 
    WHERE id_pembayaran = '$id_tolak'";
    $hasil_update_tolak = mysqli_query($koneksi, $data_tolak);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Dashboard</title>

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/app.css">
    <!-- <link rel="shortcut icon" href="../templates/voler-main/dist/assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <h1>Admin</h1>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class="sidebar-title">Main Menu</li>



                        <li class="sidebar-item active ">

                            <a href="dashboard.php" class="sidebar-link">
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>


                        </li>



                        <li class="sidebar-item  has-sub">

                            <a href="#" class="sidebar-link">
                                <i data-feather="triangle" width="20"></i>
                                <span>Data</span>
                            </a>


                            <ul class="submenu ">

                                <li>
                                    <a href="data_user.php">DATA USER</a>
                                </li>

                                <li>
                                    <a href="data_pesanan.php">DATA PESANAN</a>
                                </li>

                                <li>
                                    <a href="jadwal_keberangkatan.php">JADWAL KEBERANGKATAN</a>
                                </li>

                                <li>
                                    <a href="data_kendaraan.php">DATA KENDARAAN</a>
                                </li>

                                <li>
                                    <a href="data_pembayaran.php">DATA PEMBAYARAN</a>
                                </li>
                                <!-- <li>
                                    <a href="data_pegawai.php">DATA PEGAWAI</a>
                                </li>
                                <li>
                                    <a href="data_kantor.php">DATA KANTOR</a>
                                </li> -->
                            </ul>

                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="../templates/voler-main/dist/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block"><?= $_SESSION['nama_pegawai']?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">

                <!-- table data -->
                <div class="row mb-0 ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <erh4 class="card-title">Data Pembayaran</erh4>
                            </div>


                            <div class="card-body px-0 pb-0">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="table1" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>id_pembayaran</th>
                                                <th>id_booking</th>
                                                <th>tanggal bayar</th>
                                                <th>total harga</th>
                                                <th>bukti</th>
                                                <th>status</th>
                                                <th colspan="2">aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($rows = mysqli_fetch_assoc($hasil)) {

                                            ?>
                                                <tr>
                                                    <td><?= $rows["id_pembayaran"] ?></td>
                                                    <td><?= $rows["id_booking"] ?></td>
                                                    <td><?= $rows["tanggal_pembayaran"] ?></td>
                                                    <td><?= $rows["total_harga"] ?></td>
                                                    <td><a href="tampil_bukti_pembayaran.php?idbukti=<?= $rows['bukti_pembayaran'] ?>">Tampilkan Bukti</a></td>
                                                    <td>

                                                        <?php if ($rows["status_pembayaran"] == '') { ?>
                                                            <span style='color:gold;font-weight:bold'>Menunggu</span>
                                                        <?php } elseif($rows["status_pembayaran"] == 'diterima'){?>
                                                            <span style='color:green;font-weight:bold;'><?= $rows['status_pembayaran'] ?></span>
                                                        <?php }else { ?>
                                                            <span style='color:red;font-weight:bold;'><?= $rows['status_pembayaran'] ?></span>

                                                        <?php } ?>
                                                    </td>
                                                    <form action="" method="POST">
                                                        <td>
                                                            <a href="data_pembayaran.php?idterima=<?= $rows['id_pembayaran'] ?>" class="btn btn-success btn-sm" style="border-radius: 15px;">Terima</a>
                                                        </td>
                                                        <td style="padding-left:0px;">
                                                            <a href="data_pembayaran.php?idtolak=<?= $rows['id_pembayaran'] ?>" class="btn btn-danger btn-sm" t style="border-radius: 15px;">Tolak</a>
                                                        </td>
                                                    </form>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
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