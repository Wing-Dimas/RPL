<link rel="stylesheet" href="templates/landing/assets/css/templatemo-chain-app-dev.css">

<?php
require "koneksi.php";
require "session.php";
require "noget.php"; ?>
<div class="main-content container-fluid ">
    <div class="page-title">
        <h3>Dashboard</h3>
        <!-- <p class="text-subtitle text-muted">A good dashboard to display your statistics</p> -->
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center m-3">
            <div class="col-lg-3">
                <a href="app.php?page=tiket">
                    <div class="service-item first-service">
                        <center>
                            <div style="width:50% ;margin-bottom: 20px; "><img src="templates/tiket.png" alt="supir"></div>
                            <h4>Tiket Menunggu</h4>
                            <p></p>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="app.php?page=tiket">
                    <div class="service-item second-service">
                        <center>
                            <div style="width:50% ;margin-bottom: 20px; "><img src="templates/jadwal.png" alt="supir"></div>
                            <h4>Jadwal Keberangkatan Tersedia</h4>
                            <p></p>
                        </center>
                    </div>
                </a>
            </div>
            <!-- <div class="col-lg-3">
                <div class="service-item second-service">
                    <center>
                        <div style="width:50% ;margin-bottom: 20px; "><img src="templates/panduan.png" alt="supir"></div>
                        <h4>Cara Pesan</h4>
                        <p></p>
                    </center>
                </div>
            </div> -->
        </div>
    </div>
</div>