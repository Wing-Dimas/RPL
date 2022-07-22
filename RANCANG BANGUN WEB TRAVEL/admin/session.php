<?php
session_start();
if (empty($_SESSION['login_admin'])) {
    header('location:../login_admin.php');
}
