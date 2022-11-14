<?php
session_start();
require "koneksi.php";
require "session.php";
require "noget.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['page'] . " "; ?>| Pelanggan</title>

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../templates/voler-main/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/app.css">
    <link rel="shortcut icon" href="../templates/voler-main/dist/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../templates/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="templates/landing/assets/css/animated.css">
    <link rel="stylesheet" href="templates/landing/assets/css/owl.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .margin {
            margin-top: 15%;
            margin-left: 25%;
        }
    </style>
</head>

<body>
    <!-- ***** Preloader End ***** -->
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <h1 class="text-capitalize"><?php echo $_GET['page']; ?></h1>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="app.php?page=dashboard" class="sidebar-link">
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
                                    <a href="app.php?page=jadwal">JADWAL</a>
                                </li>

                                <li>
                                    <a href="app.php?page=tiket">TIKET</a>
                                </li>

                                <li>
                                    <a href="app.php?page=riwayat">RIWAYAT PESANAN</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="main-nav navbar navbar-header navbar-light navbar-expand bg-white" style="z-index:1;">
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
                                <div class="d-none d-md-block d-lg-inline-block"><?= $_SESSION['nama']; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="app.php?page=profil"><i data-feather="user"></i> Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">

                <section class="m-3">
                    <?php
                    include("config.php");
                    ?>
                </section>
            </div>
        </div>

        <footer>
            <div class=" footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2022 &copy; Voler</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
                    <p>Developed <span class="text-danger"><i data-feather="heart"></i></span> by <a href="https://saugi.me">Pikri</a></p>
                </div>
            </div>
        </footer>
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