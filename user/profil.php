<?php
require "koneksi.php";
require "session.php";
require "noget.php";

$id = $_SESSION['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
$data = mysqli_fetch_assoc($ambil); ?>

<div<div class="col-md-12">
    <div class="col-5">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a>
                            <table>
                                <tr>
                                    <th>Id </th>
                                    <td>: <?= $data['id_user'] ?> </td>
                                </tr>
                                <tr>
                                    <th>NIK </th>
                                    <td>: <?= $data['NIK'] ?> </td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>: <?= $data['nama_user'] ?> </td>
                                </tr>
                                <tr>
                                    <th>username</th>
                                    <td>: <?= $data['username']; ?> </td>
                                </tr>

                            </table>
                        </a>
                    </div>

                </div>
            </div>
            <?php
            ?>
            <a href="app.php?page=gantiprofil" class="btn btn-Secondary ">Ganti Profil</a>
        </div>
    </div>
    </div>