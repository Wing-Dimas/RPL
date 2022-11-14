<?php
include "../koneksi.php";
require "session.php";
$tampil_data = "SELECT * FROM jadwal";
$hasil = mysqli_query($koneksi, $tampil_data);

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
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <erh4 class="card-title">Jadwal Keberangkatan</erh4>
                                <div class="d-flex">
                                    <a href="form_jadwal_keberangkatan.php"><button class="btn btn-primary btn-sm ">+ Tambah Data</button></a>
                                </div>
                            </div>


                            <div class="card-body px-0 pb-0">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="table1">
                                        <thead>
                                            <tr>
                                                <th>id_jadwal</th>
                                                <th>id_armada</th>
                                                <th>Harga</th>
                                                <th>Tanggal berangkat</th>
                                                <th>Tanggal tiba</th>
                                                <th>Rute</th>
                                                <th>Kapasitas</th>
                                                <th colspan="2">aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($rows = mysqli_fetch_assoc($hasil)) {
                                            ?>
                                                <tr>
                                                    <td><?= $rows["id_jadwal"] ?></td>
                                                    <td><?= $rows["id_kendaraan"] ?></td>
                                                    <td><?= $rows["harga"] ?></td>
                                                    <td><?= $rows["tgl_estimasi_berangkat"] ?></td>
                                                    <td><?= $rows["tgl_estimasi_tiba"] ?></td>
                                                    <td><?= $rows["rute_keberangkatan"] ?></td>
                                                    <td><?= $rows["jml_kursi_terisi"] ?></td>
                                                    <td> <?php if ($rows["jml_kursi_terisi"] <=0 ){
                                                     ?>
                                                        <a href="form_edit_jadwal_keberangkatan.php?id=<?= $rows["id_jadwal"] ?>"><i data-feather="edit" style="color: green;"></i></a>

                                                    <?php } else { ?>
                                                        <a></a>
                                                        <?php }?>
                                                        <a href="hapus_jadwal.php?id=<?= $rows["id_jadwal"] ?>"><i data-feather="trash-2" style="color: red;"></i></a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
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