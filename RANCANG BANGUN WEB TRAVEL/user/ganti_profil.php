<?php
require "koneksi.php";
require "session.php";
require "noget.php";

$id = $_SESSION['id'];
$confirm = "none";
$ambil = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
$data = mysqli_fetch_assoc($ambil);
$alert = ""; ?>
<?php
if (isset($_POST['submit'])) {
    if ((md5($_POST['passlama'])) == $data['password']) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $passbaru = md5($_POST['passbaru']);

        $update = mysqli_query($koneksi, "UPDATE user SET NIK = '$nik', nama_user = '$nama', username = '$username', password = '$passbaru'");
        if ($update) { ?>
            <script>
                Swal.fire({
                    title: 'BERHASIL',
                    text: "Ganti Password Berhasil !! Silakan Login Ulang",
                    icon: 'success',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "logout.php";
                    }
                })
            </script>
        <?php } else { ?>
            <script>
                Swal.fire({
                    title: 'GAGAL',
                    text: "Ganti Password Gagal",
                    icon: 'error',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "app.php?page=gantiprofil";
                    }
                })
            </script>
<?php
        }
    } else {
        $alert = " Password Salah !!";
    }
}

?>



<div class="col-md-12">
    <div class="navbar bg-warning navbar-danger navbar-expand position-fixed margin d-<?= $confirm ?>" style="z-index:99;">
        <form action="" method="POST">
            <div class="form-group">
                <a class="d-flex justify-content-between"><label>Apakah Data Sudah Benar ?</label></a>
                <a class="d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" name="confirm" value="ya">Ya</button>
                    <button class="btn btn-danger" type="submit" name="confirm" value="tidak">Tidak</button>
                </a>
            </div>
        </form>
    </div>
    <div class=" card">
        <div class="card-header">
            <h4 class="card-title">Ganti Profil</h4>
        </div>

        <div class="card-body">
            <div class="col">
                <div class="row-md-6">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="nik" class="form-control" value="<?= $data['NIK'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data['nama_user'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="password" name="passlama" class="form-control">
                            <a class="text-danger"><?= $alert ?></a>
                        </div>
                        <div class="form-group">
                            <label for="">Password baru</label>
                            <input type="password" name="passbaru" class="form-control" id="myInput">
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </div>

                </div>
                <div class="d-flex justify-content-between">
                    <button type=submit name="submit" class="btn btn-info rounded">Ganti</button>
                    <a href="app.php?page=profil" class="btn btn-primary rounded">Kembali</a>
                </div>
                </form>

            </div>

        </div>
    </div>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>