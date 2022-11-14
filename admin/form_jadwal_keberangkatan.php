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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include "../koneksi.php";
    require "session.php";
    if (isset($_POST["submit"])) {

        $id_kendaraan = $_POST["id_kendaraan"];
        $harga = $_POST["harga"];
        $tanggal_berangkat = $_POST["tanggal_berangkat"];
        $tanggal_tiba = $_POST["tanggal_tiba"];
        $rute = $_POST["rute"];

        $cek_jadwal = "SELECT*FROM jadwal WHERE  id_kendaraan = '$id_kendaraan' AND 
                                                        harga = '$harga' AND 
                                                        tgl_estimasi_berangkat = '$tanggal_berangkat' AND
                                                        tgl_estimasi_tiba	= '$tanggal_tiba' AND
                                                        rute_keberangkatan = '$rute' ;                                                        ";
        $hasil_cek = mysqli_query($koneksi, $cek_jadwal);
        if (mysqli_num_rows($hasil_cek) == 0) {
            $tambah_data = "INSERT INTO jadwal VALUES(
                NULL,
                '$id_kendaraan',
                '$harga',
                '$tanggal_berangkat',
                '$tanggal_tiba',
                '$rute',
                0
            )";
            // var_dump($tambah_data);die;
            $hasil = mysqli_query($koneksi, $tambah_data);
            echo "<script>Swal.fire('Berhasil','Data ditambahkan','success')</script>";
        } else {
            echo "<script>Swal.fire('ERROR','data sudah ada','error')</script>";
        }
    }
    ?>
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
                                <erh4 class="card-title">Tambah Jadwal Keberangkatan</erh4>
                            </div>


                            <div class="card-body px-0 pb-0">
                                <form action="" method="POST">
                                    <div class="m-3">
                                        <div class="mb-3">
                                            <label for="id_kendaraan" class="form-label">Nama kendaraan</label>
                                            <select id="id_kendaraan" class="form-select" name="id_kendaraan" required>
                                                <option value="" disabled selected required>--Pilih Nama Kendaraan--</option>
                                                <?php
                                                $data = mysqli_query($koneksi, "SELECT*FROM kendaraan");
                                                while ($rows = mysqli_fetch_assoc($data)) {
                                                    echo "<option value=$rows[id_kendaraan] >$rows[nama_kendaraan]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_berangkat" class="form-label">Tanggal Keberangkatan</label>
                                            <input type="datetime-local" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_tiba" class="form-label">Tanggal Tiba</label>
                                            <input type="datetime-local" class="form-control" id="tanggal_tiba" name="tanggal_tiba" required>
                                        </div>
                                        <!-- <div class="mb-3">
                                                <label for="kapasitas" class="form-label">Kapasitas</label>
                                                <input type="text" class="form-control" id="kapasitas" name="kapasitas" required>
                                            </div> -->
                                        <div class="mb-3">
                                            <label for="rute" class="form-label">Rute</label>
                                            <input type="text" class="form-control" id="rute" name="rute" required>
                                        </div>

                                        <button type="submit" class="btn  btn-primary" name="submit">+ Tambah</button>
                                    </div>
                                </form>
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