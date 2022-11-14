<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Admin Dashboard</title>
    <link rel="stylesheet" href="templates/voler-main/dist/assets/css/bootstrap.css">

    <!-- <link rel="shortcut icon" href="templates/voler-main/dist/assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="templates/voler-main/dist/assets/css/app.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    require "user/koneksi.php";
    if (isset($_POST["submit"])) {
        $nik = $_POST["nik"];
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        if(strlen($nik)==16){
        $cek_username = "SELECT*FROM user WHERE username = '$username' || nik = '$nik'";
        $hasil_cek = mysqli_query($koneksi, $cek_username);
        if (mysqli_num_rows($hasil_cek) > 0) {
            echo "<script>Swal.fire('ERROR','Username/NIK sudah digunakan','error')</script>";
        } else {
            $tambah_data = "INSERT INTO user VALUES(
                NULL,
                '$nik',
                '$nama',
                '$username',
                '$password'
            )";
            // var_dump($tambah_data);die;
            $hasil = mysqli_query($koneksi, $tambah_data);
            if ($hasil) { ?>
                <!-- // echo '<script type="text/javascript">';
                // echo "setTimeout(function () { swal.fire('BERHASIL', 'Akun sudah dibuat', 'success');";
                // echo '}, 1000);';
                // // echo 'window.location.href = "login.php";';
                // echo '</script>'; -->
                <script>
                    Swal.fire({
                        title: 'BERHASIL',
                        text: "Akun sudah dibuat",
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "login.php";
                        }
                    })
                </script>
                <?php  }
        }}else{
            echo "<script>Swal.fire('ERROR','Panjang NIK harus 16','error')</script>";
        }
    } ?>

    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col" style="width:100px ;">
                                    <a href="index.php"><i data-feather="arrow-left"></i></a>
                                </div>
                            </div>
                            <div class="text-center mb-5">
                                <h3>Sign In</h3>
                                <p>Silahkan daftar dahulu</p>
                            </div>

                            <form action="" method="POST">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="NIK">NIK</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="NIK" name="nik" max="16" min="16" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <label for="Nama">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="Nama" name="nama" required>
                                        <div class="form-control-icon">
                                            <i data-feather="file-text"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        <a href="auth-forgot-password.html" class='float-end'>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="float-end">
                                        <a href="login.php">Sudah Punya Akun?</a>
                                    </div>
                                </div>
                                <div class="card-body ">

                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary  float-end" name="submit">Submit</button>
                                    <a href="login.php" class="btn btn-light float-end">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="templates/voler-main/dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="templates/voler-main/dist/assets/js/app.js"></script>

    <script src="templates/voler-main/dist/assets/js/main.js"></script>
</body>

</html>