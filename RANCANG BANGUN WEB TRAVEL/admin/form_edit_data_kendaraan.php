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
    $id = $_GET["id"];
    // echo $id;die;
    $tampil = "SELECT*FROM kendaraan WHERE id_kendaraan = $id";
    // var_dump($tampil);die;
    $hasil_tampil = mysqli_query($koneksi, $tampil);

    if (isset($_POST["submit"])) {
        $id = $_POST["id_kendaraan"];
        $nama_kendaraan = $_POST["nama_kendaraan"];
        $plat_nomer = $_POST["plat_nomer"];
        $jumlah_kursi = $_POST["jumlah_kursi"];

        $edit_data = "UPDATE kendaraan SET
                nama_kendaraan = '$nama_kendaraan',
                plat_nomer = '$plat_nomer',
                jumlah_kursi = $jumlah_kursi WHERE id_kendaraan = $id";

        // var_dump($edit_data);die;
        $hasil = mysqli_query($koneksi, $edit_data);
        // var_dump($hasil);die;
        echo "<script>alert('data berhasil diupdate');document.location.href='data_kendaraan.php'</script>";
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
                                <erh4 class="card-title">Edit Data Kendaraan</erh4>
                            </div>


                            <div class="card-body px-0 pb-0">
                                <?php
                                while ($rows = mysqli_fetch_assoc($hasil_tampil)) {
                                ?>
                                    <form action="" method="POST">
                                        <div class="m-3">
                                            <input hidden type="text" class="form-control" id="id_kendaraan" name="id_kendaraan" required value="<?= $rows["id_kendaraan"] ?>" required>
                                            <div class="mb-3">
                                                <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
                                                <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" required value="<?= $rows["nama_kendaraan"] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                                <input type="text" class="form-control" id="plat_nomer" name="plat_nomer" required value="<?= $rows["plat_nomer"] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                                                <input type="number" class="form-control" id="jumlah_kursi" name="jumlah_kursi" required value="<?= $rows["jumlah_kursi"] ?>" required>
                                            </div>
                                            <button type="submit" class="btn btn-success" name="submit">Update</button>
                                        </div>
                                    </form>
                                <?php } ?>
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