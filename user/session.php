<?php
if (empty($_SESSION['login'])) {
    header('location:../login.php');
}
