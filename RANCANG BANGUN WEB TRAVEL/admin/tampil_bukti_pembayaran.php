<?php
    $bukti = $_GET['idbukti'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">	
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <center>
        <div class="card mt-5" style="width: 50rem;">
            <img src="../user/<?= $bukti?>" alt=""  >
            <div class="card-body">
                <h5 class="card-title">Bukti Pembayaran</h5>
                <a href="data_pembayaran.php" class="btn btn-primary">Back</a>
            </div>
        </div>
    </center>
    </div>


</body>
</html>