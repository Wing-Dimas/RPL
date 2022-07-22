<?php
include "../koneksi.php";
require "session.php";
$tampil_pesanan  = "SELECT*FROM booking";
$hasil = mysqli_query($koneksi, $tampil_pesanan);

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
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <!-- <p class="text-subtitle text-muted">A good dashboard to display your statistics</p> -->
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <a href="data_user.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-3 d-flex justify-content-between">
                                                <h3 class="card-title">Data User</h3>
                                                <!-- <div class="card-right d-flex align-items-center">
                                                    <p>$50 </p>
                                                </div> -->
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas1" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-12 col-md-3">
                            <a href="data_pesanan.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-3 d-flex justify-content-between">
                                                <h3 class="card-title">Data Pesanan</h3>
                                                <!-- <div class="card-right d-flex align-items-center">
                                                <p>$532,2 </p>
                                            </div> -->
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas2" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-12 col-md-3">
                            <a href="jadwal_keberangkatan.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-1 d-flex justify-content-between">
                                                <h3 class="card-title">JADWAL <br> KEBERANGKATAN</h3>
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas3" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-3">
                            <a href="data_kendaraan.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-3 d-flex justify-content-between">
                                                <h3 class="card-title">DATA KENDARAAN</h3>
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas3" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-3">
                            <a href="data_pembayaran.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-3 d-flex justify-content-between">
                                                <h3 class="card-title">DATA PEMBAYARAN</h3>
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas3" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- <div class="col-12 col-md-3">
                            <a href="data_pegawai.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-3 d-flex justify-content-between">
                                                <h3 class="card-title">DATA PEGAWAI</h3>
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas3" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-md-3">
                            <a href="data_kantor.php">
                                <div class="card card-statistic">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <div class="px-3 py-3 d-flex justify-content-between">
                                                <h3 class="card-title">DATA KANTOR</h3>
                                            </div>
                                            <div class="chart-wrapper">
                                                <canvas id="canvas3" style="height:100px !important"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                    </div>

                    <!-- table data -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <erh4 class="card-title">Data Pesanan</erh4>
                                </div>


                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0" id="table1" style="text-align:center ;">
                                            <thead>
                                                <tr>
                                                    <th>id_booking</th>
                                                    <th>id_user</th>
                                                    <th>Tanggal_booking</th>
                                                    <th>id_jadwal</th>
                                                    <th>jumlah</th>
                                                    <th>status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($rows = mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $rows["id_booking"] ?></td>
                                                        <td><?= $rows["id_user"] ?></td>
                                                        <td><?= $rows["tanggal_booking"] ?></td>
                                                        <td><?= $rows["id_jadwal"] ?></td>
                                                        <td><?= $rows["jml_booking"] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($rows["status"] == 'dibatalkan') {
                                                                echo  "<span style='background-color:#B22222; color:white; border-radius:5px; padding:5px'>$rows[status]</span>";
                                                            } elseif ($rows["status"] == 'belum lunas') {
                                                                echo  "<span style='background-color:gold; color:white; border-radius:5px; padding:5px'>$rows[status]</span>";
                                                            } else {
                                                                echo  "<span style='background-color:green; color:white; border-radius:5px; padding:5px'>$rows[status]</span>";
                                                            }
                                                            ?>
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