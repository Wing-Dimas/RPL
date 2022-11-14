<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in -  Admin Dashboard</title>
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
                                <div class="col" style="width:100px ;" >
                                    <a href="index.php"><i  data-feather="arrow-left"></i></a>
                                </div>
                            </div>
                            <div class="text-center mb-5">
                                <h3>Sign Up</h3>
                                <p>Silahkan daftar sebagai admin</p>
                            </div>

                        <form action="index.html">
                            
                            <div class="form-group position-relative has-icon-left">
                                <label for="Nama">Nama</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="Nama" required>
                                    <div class="form-control-icon">
                                        <i data-feather="file-text"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left">
                                <label for="username">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="username" required>
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
                                    <input type="password" class="form-control" id="password" required>
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
                            <div class="clearfix">
                                <button class="btn btn-primary float-end">Submit</button>
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
