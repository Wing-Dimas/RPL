<?php
session_start();
if (empty($_SESSION['login'])) {
    header('location:../login.php');
}
require "koneksi.php"; ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/bootstrap.css">

    <link rel="shortcut icon" href="../templates/voler-main/dist/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../templates/voler-main/dist/assets/css/app.css">
</head>

<body>
    <div id="error">

        <div class="container text-center pt-32">
            <h1 class='error-title'>:(</h1>
            <p>Anda Tidak Diizinkan Mengakses Halaman Ini, Silakan Kembali ke Halaman Login.</p>
            <a href="../login.php" class='btn btn-primary'>Halaman Login</a>
        </div>
        <?php session_destroy();  ?>

        <div class="footer pt-32">
            <p class="text-center">Copyright &copy; Voler 2020</p>
            <p class="text-center">Developed &copy; RPL Team 2022</p>
        </div>
    </div>
</body>

</html>