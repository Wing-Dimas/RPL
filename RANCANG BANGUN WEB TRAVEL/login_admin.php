<?php
include "user/koneksi.php";
$valid = "valid";

if (isset($_POST['submit'])) {
    $valid = "valid";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password'");
    $row = mysqli_num_rows($login);
    // echo ($username);
    // echo ($password);

    session_start();
    if ($row > 0) {
        $data = mysqli_fetch_assoc($login);

        $_SESSION['login_admin'] = true;
        $_SESSION['id_pegawai'] = $data['id_pegawai'];
        $_SESSION['nama_pegawai'] = $data['nama_pegawai'];
        $_SESSION['username_pegawai'] = $username;
        header("location:admin/dashboard.php");
    } else {
        $valid = "invalid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Admin Dashboard</title>
    <link rel="stylesheet" href="templates/voler-main/dist/assets/css/bootstrap.css">

    <!-- <link rel="shortcut icon" href="templates/voler-main/dist/assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="templates/voler-main/dist/assets/css/app.css">
</head>

<body>

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
                                <p>Silahkan masuk sebagai admin</p>
                            </div>

                            <form action="" method="POST">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username">
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
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                    <?php if ($valid != "valid") { ?>
                                        <div>
                                            <i class="bx bx-radio-circle"></i>
                                            <a class="text-danger">Invalid Username Atau Password </a>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="checkbox float-start m-0">
                                        <a href="login.php">Login Sebagai User</a>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
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